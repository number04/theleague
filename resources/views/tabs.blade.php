<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" />
        <style>


@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300);
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
html,
body {
  height: 100%;
  width: 100%;
}
body {
  background: #d2d2d2;
  font-family: 'Roboto', sans-serif;
}
.wrap {
  width: 80%;
  margin: auto;
  height: 300px;
  position: relative;
  transform: translateY(-50%);
  top: 50%;
}
.card {
  position: relative;
  background: #fff;
  height: 420px;
  width: 300px;
  border-radius: 2px;
  margin: auto;
  text-align: center;
  padding: 20px 10px;
  overflow: hidden;
}
.card .content-card h1 {
  margin: 40px auto 60px auto;
  text-transform: uppercase;
  width: 80%;
  font-size: 36px;
  color: #999;
}
.card .content-card p {
  font-size: 18px;
  margin: 10px 0;
  color: #999;
}
.card .action {
  background: #F12121;
  height: 48px;
  width: 48px;
  line-height: 48px;
  cursor: pointer;
  border-radius: 50%;
  position: absolute;
  bottom: 20px;
  right: 20px;
  transition: 0.2s all ease-out 0.1s;
  z-index: 1;

}

/* need to change away from absolute positioning to ensure button is in the backgraound */

.card .action.three {
    right: 80px;
    background: blue;
}

.card .action span {
  color: #fff;
  font-size: 32px;
  transition: 0.1s all ease-in-out 0.4s;
  z-index: 1;
}
.card .close {
  background: #fff;
  height: 48px;
  width: 48px;
  line-height: 48px;
  cursor: pointer;
  border-radius: 50%;
  position: absolute;
  top: 20px;
  right: 20px;
  transition: 0.3s all ease-out;
  transform: scale(0);
}
.card .close span {
  color: #F12121;
  font-size: 32px;
  transition: 0.2s all ease-out;
  transform: rotate(45deg);
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  position: absolute;


}

.card .action.active {

  pointer-events: none;

  animation-name: pulse;
  animation-duration: .6s;
  animation-timing-function: ease-in-out;
  transform: scale(24);
}
.card .action.active span {
  transition: 0.001s all ease-out;
  opacity: 0;
}


@keyframes pulse {
  0% {
    transform: scale(1);
  }

  50% {
    transform: scale(0.5);
  }

  100% {
    transform: scale(24);
  }
}


.content-one {
  opacity: 1;
  transition: 0.2s all ease-out 0.1s;
}
.content-one.inactive {
  opacity: 0;
  transition: 0.3s all ease-out;
}
.content-two, .content-three {
  z-index: 2;
  display: none;
  position: absolute;
  left: 0;
  right: 0;
  top: 40px;
  margin: auto;
  opacity: 0;
  transition: 0.3s all ease-out;
}
.content-two h1, .content-three h1 {
  color: #fff !important;
}
.content-two p, .content-three p {
  color: #fff !important;
}
.content-two.active, .content-three.active {
  opacity: 1;
  transition: 0.5s all ease-out 0.2s;
}
.card .close.active {
  transform: scale(1);
  transition: 0.1s all ease-out 0.5s;
  z-index: 2;
}
.action {
  z-index: 1;
}



        </style>
    </head>
    <body>
        <div class="wrap">
            <div class="card">
                <div class="content-card content-one">
                    <h1>Thomas Podgro</h1>

                    <div class="text">
                        <p>06.12.23.34.72</p>
                        <p>mymail@mail.com</p>
                    </div>
                </div>

                <div class="content-card content-two">
                    <h1>Special offers</h1>

                    <div class="text">
                        <p>BRAND NEW COFFEE</p>
                        <p>EXCELLENT FRUIT CAKE</p>
                    </div>
                </div>

                <div class="content-card content-three">
                    <h1>Specials</h1>

                    <div class="text">
                        <p>ROSE IS STINKY</p>
                        <p>ROSE IS ANIMAL</p>
                    </div>
                </div>

                <div class="close"><span>+</span></div>
                <div class="action two"><span>+</span></div>
                <div class="action three"><span>+</span></div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
        <script>

            $(".action.two").click(function(){
                $(this).addClass("active");

                var card = $(this).parent();

                card.children(".content-one").addClass("inactive");
                card.children(".content-two").fadeIn(0).addClass("active");
                card.children(".close").addClass("active");
            });

            $(".action.three").click(function(){
                $(this).addClass("active");

                var card = $(this).parent();

                card.children(".content-one").addClass("inactive");
                card.children(".content-three").fadeIn(0).addClass("active");
                card.children(".close").addClass("active");
            });

            $(".close").click(function(){
                $(this).removeClass("active");

                var card = $(this).parent();

                card.children(".content-two").removeClass("active");
                card.children(".content-three").removeClass("active");
                card.children(".action").removeClass("active");
                card.children(".content-one").fadeIn(0).removeClass("inactive");
            });
        </script>
    </body>
</html>
