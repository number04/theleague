(function($) {
	"use strict";

	// Define variables and methods that all plugin instances have in common
	var windowHeight = null,
		documentHeight = null,
		activeSimpleselects = [],
		isSsActivationForbidden = false,
		isNextDocumentClickEventDisabled = false,

		// Executed on the plugin's first call on a select
		init = function(options) {
			// Override default options
			options = $.extend({}, {
				fadingDuration: (options && options.fadeSpeed) || 500,
				containerMargin: 0,
				displayContainerInside: "window"
			}, options);

			// Loop through all selects
			this.each(function() {

				var t = $(this).addClass("simpleselected");

				// Create the SimpleSelect
				var simpleselect = $("<div class=\"simpleselect\"></div>"),
					ssPlaceholder = $("<div class=\"placeholder\"></div>").appendTo(simpleselect),
					ssOptionsContainer = $("<div class=\"options\"></div>").appendTo(simpleselect);

				// Give an id to the SimpleSelect if the original select has one
				var selectIdAttribute = t.attr("id");
				if (selectIdAttribute) {
					simpleselect.attr("id", "simpleselect_"+ selectIdAttribute);
				}

				// Remove all change event listeners attached to the select before the plugin was called to avoid conflicts (see doc for more details)
				t.off("change");

				// Set the size attribute of the select to more than 1 (makes our lives easier)
				t.attr("size", 2);

				// SimpleSelect data
				var ssData = {
					select: t,
					selectOptions: null, // Set later, when the SimpleSelect is populated
					simpleselect: simpleselect,
					ssPlaceholder: ssPlaceholder,
					ssOptionsContainer: ssOptionsContainer,
					ssOptionsContainerHeight: null, // Set later, when the SimpleSelect is populated
					ssOptions: null, // Set later, when the SimpleSelect is populated
					canBeClosed: true,
					isActive: false,
					isScrollable: false,
					isDisabled: false,
					options: options
				};

				// SimpleSelect bindings
				simpleselect
					.data("simpleselect", ssData)
					.on({
						mousedown: function() {
							ssData.canBeClosed = false;
						},
						click: function(e) {
							var eventTarget = $(e.target);

							if (eventTarget.hasClass("placeholder")) {
								var activeSimpleselectsLength = activeSimpleselects.length;
								if (activeSimpleselectsLength) {
									var activeSimpleselectsCopy = activeSimpleselects.slice(0);
									for (var i = 0; i < activeSimpleselectsLength; i++) {
										activeSimpleselectsCopy[i].simpleselect("setInactive");
									}
								}
								publicMethods.setActive.call(ssData);

							// Handle clicks on options
							} else if (eventTarget.hasClass("option")) {
								isSsActivationForbidden = true; // Disable the eventual activation of the SimpleSelect if the select is focused, until a click event bubbles up to the document, at which point it's reset
								selectOption.call(ssData, eventTarget);
								publicMethods.setInactive.call(ssData);
							}
						},
						mouseup: function() {
							ssData.canBeClosed = false;
						},
						mouseover: function(e) {
							var eventTarget = $(e.target);
							// Handle mouseover on options
							if (eventTarget.hasClass("option")) {
								selectSsOption.call(ssData, eventTarget);
							}
						}
					});

				// Select bindings
				t
					.data("simpleselect", ssData)
					.on({
						keydown: function(e) {
							// On key enter
							if (e.keyCode == 13) {
								publicMethods.setInactive.call(ssData);
							}
						},
						focus: function() {
							// If a SimpleSelect option has just been clicked, don't activate the select
							if (!isSsActivationForbidden) {
								publicMethods.setActive.call(ssData);
							}
						},
						blur: function() {
							if (ssData.canBeClosed) {
								publicMethods.setInactive.call(ssData);
							}
						},
						change: function(e, shouldLetChangeEventThrough) {
							if (!shouldLetChangeEventThrough) e.stopImmediatePropagation();
							var optionToSelect = getSsOptionToSelect.call(ssData);
							selectSsOption.call(ssData, optionToSelect, true);
						},
						// We don't care about that event – it's only fired when the related label is clicked, and this action is already captured through the focus event on the select
						click: function() {

						}
					});

				// Add the SimpleSelect to the DOM
				t.after(simpleselect);

				// Hide the original select
				var hiddenSelectContainer = $("<div class=\"hidden_select_container\"></div>");
				t.after(hiddenSelectContainer).appendTo(hiddenSelectContainer);

				// Update the SimpleSelect with the select's contents and state
				populateSs.call(ssData);
				updateSsState.call(ssData);

			});
		},

		// Update the value we stored of the window's height
		updateWindowHeightValue = function() {
			windowHeight = $(window).height();
		},

		// Add a SimpleSelect to the array of active ones
		addToActiveSimpleselects = function(simpleselect) {
			activeSimpleselects.push(simpleselect);
		},

		// Remove a SimpleSelect from the array of active ones
		removeFromActiveSimpleselects = function(simpleselect) {
			activeSimpleselects = $.grep(activeSimpleselects, function(val) {
				return val !== simpleselect;
			});
		},

		// Populate the SimpleSelect with the select's options
		populateSs = function() {
			this.selectOptions = this.select.find("option");
			var ssOptionsAndOptgroups = "",
				addOption = function(selectOption) {
					ssOptionsAndOptgroups += "<div class=\"option\">"+ selectOption.text() +"</div>";
				},
				htmlEncode = function(html) {
					return html.replace(/&/g, "&amp;").replace(/"/g, "&quot;").replace(/'/g, "&#039;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
				},
				selectChildren = this.select.children("optgroup, option"),
				selectHasOptgroups = false;
			selectChildren.each(function() {
				var t = $(this);
				if (t.is("optgroup")) {
					addOptgroup(t);
					selectHasOptgroups = true;
				} else {
					addOption(t);
				}
			});

			this.ssOptions = this.ssOptionsContainer.html(ssOptionsAndOptgroups).find(".option");
			this.ssPlaceholder.html("<span class='display-name'>select player</span>");
		},

		// Enable/disable the SimpleSelect so as to replicate the select's state
		updateSsState = function() {
			this.isDisabled = this.select.prop("disabled");
			this.simpleselect[(this.isDisabled? "addClass" : "removeClass")]("disabled");
		},

		// Select a SimpleSelect option among the ones in the options container
		// If the new option can be out of sight, make sure it isn't by scrolling the options container when necessary
		selectSsOption = function(ssOption, canBeOutOfSight) {
			this.ssOptions.removeClass("active");
			ssOption.addClass("active");

			// If the option that has been selected can be out of sight
			// (Can happen when changing the selected option based on the select's change event)
			if (canBeOutOfSight) {
				// If the options container is scrollable, and if the
				// to-be-selected SimpleSelect option isn't visible,
				// scroll enough (up or downward) to make it entirely visible
				if (this.isScrollable) {
					var ssOptionPosition = ssOption.position(),
						ssOptionsContainerScrollTop = this.ssOptionsContainer.scrollTop(),
						topViewOffset = ssOptionPosition.top,
						bottomViewOffset = this.ssOptionsContainer.height() - (ssOptionPosition.top + ssOption.outerHeight()),
						toScrollTo;

					if (topViewOffset < 0) {
						toScrollTo = ssOptionsContainerScrollTop + topViewOffset;
					} else if(bottomViewOffset < 0) {
						toScrollTo = ssOptionsContainerScrollTop - bottomViewOffset;
					}

					this.ssOptionsContainer.scrollTop(toScrollTo);
				}
			}
		},

		// Get the SimpleSelect option that has to be selected, based on the index of the currently selected select option
		// Returns a jQuery object
		getSsOptionToSelect = function() {
			var selectedOption = getSelectedOption.call(this),
				selectedOptionIndex = selectedOption.length? this.selectOptions.index(selectedOption) : 0;
			return $(this.ssOptions[selectedOptionIndex]);
		},

		// Select an option in the select corresponding to the given SimpleSelect option
		selectOption = function(ssOption) {
			var optionToSelect = $(this.selectOptions[this.ssOptions.index(ssOption)]);
			this.select.val(optionToSelect.val());
		},

		// Get the currently selected select option
		getSelectedOption = function() {
			return this.selectOptions.filter(":selected").first();
		},

		// Force a layout repaint
		forceRepaint = function() {
			this.ssOptionsContainer.hide();
			this.ssOptionsContainer[0].offsetHeight;
			this.ssOptionsContainer.show();
		},

		publicMethods = {

			// populateSs equivalent
			// Meant to be exposed in the public API
			refreshContents: function() {
				populateSs.call(this);

				// Update variables dependent on presentation
				publicMethods.updatePresentationDependentVariables.call(this);
			},

			// updateSsState alias
			// Meant to be exposed in the public API
			refreshState: function() {
				updateSsState.call(this);
			},

			// Disable the select, and update the SimpleSelect's state accordingly
			disable: function() {
				this.select.prop("disabled", true);
				publicMethods.refreshState.call(this);
			},

			// Enable the select, and update the SimpleSelect's state accordingly
			enable: function() {
				this.select.prop("disabled", false);
				publicMethods.refreshState.call(this);
			},

			// Set the SimpleSelect in an active state, and show the options container
			setActive: function() {
				if (!this.isActive && !this.isDisabled && this.ssOptions.length) {
					this.lastValue = this.select.val();
					this.simpleselect.addClass("active");
					this.isActive = true;
					addToActiveSimpleselects.call(this, this.simpleselect);
					var optionToSelect = getSsOptionToSelect.call(this);
					selectSsOption.call(this, optionToSelect);
					documentHeight = $(document).height(); // Save the document height before it possibly changes due to the options list being made visible
					this.ssOptionsContainer
						.fadeTo(0, 0)
						.fadeTo(this.options.fadingDuration, 1);
					isNextDocumentClickEventDisabled = true;
				}
			},

			// Set the SimpleSelect in an inactive state, and hide the options container
			setInactive: function() {
				if (this.isActive) {
					this.simpleselect.removeClass("active");
					this.isActive = false;
					removeFromActiveSimpleselects.call(this, this.simpleselect);
					this.ssOptionsContainer.fadeOut(this.options.fadingDuration);
					if (this.select.is(":focus")) {
						this.select.blur();
					}
					var currentValue = this.select.val();
					if (this.lastValue != currentValue) {
						this.ssPlaceholder.html("<span class='display-name'>" + getSelectedOption.call(this).text() + "</span>");
						this.select.trigger("change", [true]);
					}
				}

				// close search box

				$(".search").removeClass('active');

				$(document).bind('click', function(e) {

					var $clicked = $(e.target);

					if (!$clicked.hasClass("placeholder")) $(".search").removeClass('active');
				});
			}
		};

	$.fn.simpleselect = function(method) {
		// Additional plugin call (method call)
		// The context inside of these methods is set to the SimpleSelect's data
		if (publicMethods[method]) {
			var args = Array.prototype.slice.call(arguments, 1);
			this.each(function() {
				publicMethods[method].apply($(this).data("simpleselect"), args);
			});
		// First plugin call
		// The context inside of this method is set to the select element
		} else {
			init.apply(this, arguments);
		}

		return this;
	};

	// Document and window bindings and initialization of related values
	$(document).ready(function() {

		$(document).on("click.simpleselect keyup.simpleselect", function(e) {
			// Detect click events once they've bubbled up to the document
			if (e.type == "click") {
				// Reset the flag
				// The following statement is appended to the end of the current call stack to ensure that, when the option of a SimpleSelect placed inside a label is clicked, events (or more precisely, statements handling isSsActivationForbidden and bound to those events) are triggered in the following order while in the bubbling phase:
				// Click on SimpleSelect option -> Click on SimpleSelect -> Click on label (thus focus on associated select) -> Click on document
				// (In IE, if not interfering with the call stack, the click event finishes bubbling up before the focus event is fired on the select.)
				setTimeout(function() {
					isSsActivationForbidden = false;
				}, 0);

				// If that flag is activated, don't let the rest of this function be executed (and reset the flag)
				if (isNextDocumentClickEventDisabled) {
					isNextDocumentClickEventDisabled = false;
					return;
				}
			}

			// Disable active selects when the "background" is clicked or when the escape key is pressed
			if (e.type == "click" || (e.type == "keyup" && e.keyCode == 27)) {
				var activeSimpleselectsLength = activeSimpleselects.length;
				if (activeSimpleselectsLength) {
					var activeSimpleselectsCopy = activeSimpleselects.slice(0);
					for (var i = 0; i < activeSimpleselectsLength; i++) {
						activeSimpleselectsCopy[i].simpleselect("setInactive");
					}
				}
			}
		});
	});

})(jQuery);
