@extends('layouts.app')

@section('content')
<div class="container-standing">

    <div style="order: {{ $rank_1 }}">
        <div class="top">
            <a href="#tab1" class="active"><i class="fa fa-bar-chart"></i></a>
            <span class="franchise-{{ $franchise_1 }}"><p><i class="icon-{{ $franchise_1 }}"></i></p></span>
            <a href="#tab2"><i class="fa fa-calendar"></i></a>
        </div>

        @include('layouts._standing', [
            'tab_one' => 'tab1',
            'tab_two' => 'tab2',
            'franchise' => 'franchise_1',
            'rank' => 'rank_1',
            'points_back' => 'points_back_1',
            'total' => 'total_1',
            'skater' => 'skater_1',
            'goalie' => 'goalie_1',
            'team' => 'team_1',
            'best' => 'best_1',
            'worst' => 'worst_1',
            'average' => 'average_1',
            'w01' => 'w01_1',
            'w02' => 'w02_1',
            'w03' => 'w03_1',
            'w04' => 'w04_1',
            'w05' => 'w05_1',
            'w06' => 'w06_1',
            'w07' => 'w07_1',
            'w08' => 'w08_1',
            'w09' => 'w09_1',
            'w10' => 'w10_1',
            'w11' => 'w11_1',
            'w12' => 'w12_1',
            'w13' => 'w13_1',
            'w14' => 'w14_1',
            'w15' => 'w15_1',
            'w16' => 'w16_1',
            'w17' => 'w17_1',
            'w18' => 'w18_1',
            'w19' => 'w19_1',
            'w20' => 'w20_1',
            'w21' => 'w21_1',
            'w22' => 'w22_1',
        ])
    </div>

    <div style="order: {{ $rank_2 }}">
        <div class="top">
            <a href="#tab3" class="active"><i class="fa fa-bar-chart"></i></a>
            <span class="franchise-{{ $franchise_2 }}"><p><i class="icon-{{ $franchise_2 }}"></i></p></span>
            <a href="#tab4"><i class="fa fa-calendar"></i></a>
        </div>

        @include('layouts._standing', [
            'tab_one' => 'tab3',
            'tab_two' => 'tab4',
            'franchise' => 'franchise_2',
            'rank' => 'rank_2',
            'points_back' => 'points_back_2',
            'total' => 'total_2',
            'skater' => 'skater_2',
            'goalie' => 'goalie_2',
            'team' => 'team_2',
            'best' => 'best_2',
            'worst' => 'worst_2',
            'average' => 'average_2',
            'w01' => 'w01_2',
            'w02' => 'w02_2',
            'w03' => 'w03_2',
            'w04' => 'w04_2',
            'w05' => 'w05_2',
            'w06' => 'w06_2',
            'w07' => 'w07_2',
            'w08' => 'w08_2',
            'w09' => 'w09_2',
            'w10' => 'w10_2',
            'w11' => 'w11_2',
            'w12' => 'w12_2',
            'w13' => 'w13_2',
            'w14' => 'w14_2',
            'w15' => 'w15_2',
            'w16' => 'w16_2',
            'w17' => 'w17_2',
            'w18' => 'w18_2',
            'w19' => 'w19_2',
            'w20' => 'w20_2',
            'w21' => 'w21_2',
            'w22' => 'w22_2',
        ])
    </div>

    <div style="order: {{ $rank_3 }}">
        <div class="top">
            <a href="#tab5" class="active"><i class="fa fa-bar-chart"></i></a>
            <span class="franchise-{{ $franchise_3 }}"><p><i class="icon-{{ $franchise_3 }}"></i></p></span>
            <a href="#tab6"><i class="fa fa-calendar"></i></a>
        </div>

        @include('layouts._standing', [
            'tab_one' => 'tab5',
            'tab_two' => 'tab6',
            'franchise' => 'franchise_3',
            'rank' => 'rank_3',
            'points_back' => 'points_back_3',
            'total' => 'total_3',
            'skater' => 'skater_3',
            'goalie' => 'goalie_3',
            'team' => 'team_3',
            'best' => 'best_3',
            'worst' => 'worst_3',
            'average' => 'average_3',
            'w01' => 'w01_3',
            'w02' => 'w02_3',
            'w03' => 'w03_3',
            'w04' => 'w04_3',
            'w05' => 'w05_3',
            'w06' => 'w06_3',
            'w07' => 'w07_3',
            'w08' => 'w08_3',
            'w09' => 'w09_3',
            'w10' => 'w10_3',
            'w11' => 'w11_3',
            'w12' => 'w12_3',
            'w13' => 'w13_3',
            'w14' => 'w14_3',
            'w15' => 'w15_3',
            'w16' => 'w16_3',
            'w17' => 'w17_3',
            'w18' => 'w18_3',
            'w19' => 'w19_3',
            'w20' => 'w20_3',
            'w21' => 'w21_3',
            'w22' => 'w22_3',
        ])
    </div>

    <div style="order: {{ $rank_4 }}">
        <div class="top">
            <a href="#tab7" class="active"><i class="fa fa-bar-chart"></i></a>
            <span class="franchise-{{ $franchise_4 }}"><p><i class="icon-{{ $franchise_4 }}"></i></p></span>
            <a href="#tab8"><i class="fa fa-calendar"></i></a>
        </div>

        @include('layouts._standing', [
            'tab_one' => 'tab7',
            'tab_two' => 'tab8',
            'franchise' => 'franchise_4',
            'rank' => 'rank_4',
            'points_back' => 'points_back_4',
            'total' => 'total_4',
            'skater' => 'skater_4',
            'goalie' => 'goalie_4',
            'team' => 'team_4',
            'best' => 'best_4',
            'worst' => 'worst_4',
            'average' => 'average_4',
            'w01' => 'w01_4',
            'w02' => 'w02_4',
            'w03' => 'w03_4',
            'w04' => 'w04_4',
            'w05' => 'w05_4',
            'w06' => 'w06_4',
            'w07' => 'w07_4',
            'w08' => 'w08_4',
            'w09' => 'w09_4',
            'w10' => 'w10_4',
            'w11' => 'w11_4',
            'w12' => 'w12_4',
            'w13' => 'w13_4',
            'w14' => 'w14_4',
            'w15' => 'w15_4',
            'w16' => 'w16_4',
            'w17' => 'w17_4',
            'w18' => 'w18_4',
            'w19' => 'w19_4',
            'w20' => 'w20_4',
            'w21' => 'w21_4',
            'w22' => 'w22_4',
        ])
    </div>

    <div style="order: {{ $rank_5 }}">
        <div class="top">
            <a href="#tab9" class="active"><i class="fa fa-bar-chart"></i></a>
            <span class="franchise-{{ $franchise_5 }}"><p><i class="icon-{{ $franchise_5 }}"></i></p></span>
            <a href="#tab10"><i class="fa fa-calendar"></i></a>
        </div>

        @include('layouts._standing', [
            'tab_one' => 'tab9',
            'tab_two' => 'tab10',
            'franchise' => 'franchise_5',
            'rank' => 'rank_5',
            'points_back' => 'points_back_5',
            'total' => 'total_5',
            'skater' => 'skater_5',
            'goalie' => 'goalie_5',
            'team' => 'team_5',
            'best' => 'best_5',
            'worst' => 'worst_5',
            'average' => 'average_5',
            'w01' => 'w01_5',
            'w02' => 'w02_5',
            'w03' => 'w03_5',
            'w04' => 'w04_5',
            'w05' => 'w05_5',
            'w06' => 'w06_5',
            'w07' => 'w07_5',
            'w08' => 'w08_5',
            'w09' => 'w09_5',
            'w10' => 'w10_5',
            'w11' => 'w11_5',
            'w12' => 'w12_5',
            'w13' => 'w13_5',
            'w14' => 'w14_5',
            'w15' => 'w15_5',
            'w16' => 'w16_5',
            'w17' => 'w17_5',
            'w18' => 'w18_5',
            'w19' => 'w19_5',
            'w20' => 'w20_5',
            'w21' => 'w21_5',
            'w22' => 'w22_5',
        ])
    </div>

    <div style="order: {{ $rank_6 }}">
        <div class="top">
            <a href="#tab11" class="active"><i class="fa fa-bar-chart"></i></a>
            <span class="franchise-{{ $franchise_6 }}"><p><i class="icon-{{ $franchise_6 }}"></i></p></span>
            <a href="#tab12"><i class="fa fa-calendar"></i></a>
        </div>

        @include('layouts._standing', [
            'tab_one' => 'tab11',
            'tab_two' => 'tab12',
            'franchise' => 'franchise_6',
            'rank' => 'rank_6',
            'points_back' => 'points_back_6',
            'total' => 'total_6',
            'skater' => 'skater_6',
            'goalie' => 'goalie_6',
            'team' => 'team_6',
            'best' => 'best_6',
            'worst' => 'worst_6',
            'average' => 'average_6',
            'w01' => 'w01_6',
            'w02' => 'w02_6',
            'w03' => 'w03_6',
            'w04' => 'w04_6',
            'w05' => 'w05_6',
            'w06' => 'w06_6',
            'w07' => 'w07_6',
            'w08' => 'w08_6',
            'w09' => 'w09_6',
            'w10' => 'w10_6',
            'w11' => 'w11_6',
            'w12' => 'w12_6',
            'w13' => 'w13_6',
            'w14' => 'w14_6',
            'w15' => 'w15_6',
            'w16' => 'w16_6',
            'w17' => 'w17_6',
            'w18' => 'w18_6',
            'w19' => 'w19_6',
            'w20' => 'w20_6',
            'w21' => 'w21_6',
            'w22' => 'w22_6',
        ])
    </div>

    <div style="order: {{ $rank_7 }}">
        <div class="top">
            <a href="#tab13" class="active"><i class="fa fa-bar-chart"></i></a>
            <span class="franchise-{{ $franchise_7 }}"><p><i class="icon-{{ $franchise_7 }}"></i></p></span>
            <a href="#tab14"><i class="fa fa-calendar"></i></a>
        </div>

        @include('layouts._standing', [
            'tab_one' => 'tab13',
            'tab_two' => 'tab14',
            'franchise' => 'franchise_7',
            'rank' => 'rank_7',
            'points_back' => 'points_back_7',
            'total' => 'total_7',
            'skater' => 'skater_7',
            'goalie' => 'goalie_7',
            'team' => 'team_7',
            'best' => 'best_7',
            'worst' => 'worst_7',
            'average' => 'average_7',
            'w01' => 'w01_7',
            'w02' => 'w02_7',
            'w03' => 'w03_7',
            'w04' => 'w04_7',
            'w05' => 'w05_7',
            'w06' => 'w06_7',
            'w07' => 'w07_7',
            'w08' => 'w08_7',
            'w09' => 'w09_7',
            'w10' => 'w10_7',
            'w11' => 'w11_7',
            'w12' => 'w12_7',
            'w13' => 'w13_7',
            'w14' => 'w14_7',
            'w15' => 'w15_7',
            'w16' => 'w16_7',
            'w17' => 'w17_7',
            'w18' => 'w18_7',
            'w19' => 'w19_7',
            'w20' => 'w20_7',
            'w21' => 'w21_7',
            'w22' => 'w22_7',
        ])
    </div>

    <div style="order: {{ $rank_8 }}">
        <div class="top">
            <a href="#tab15" class="active"><i class="fa fa-bar-chart"></i></a>
            <span class="franchise-{{ $franchise_8 }}"><p><i class="icon-{{ $franchise_8 }}"></i></p></span>
            <a href="#tab16"><i class="fa fa-calendar"></i></a>
        </div>

        @include('layouts._standing', [
            'tab_one' => 'tab15',
            'tab_two' => 'tab16',
            'franchise' => 'franchise_8',
            'rank' => 'rank_8',
            'points_back' => 'points_back_8',
            'total' => 'total_8',
            'skater' => 'skater_8',
            'goalie' => 'goalie_8',
            'team' => 'team_8',
            'best' => 'best_8',
            'worst' => 'worst_8',
            'average' => 'average_8',
            'w01' => 'w01_8',
            'w02' => 'w02_8',
            'w03' => 'w03_8',
            'w04' => 'w04_8',
            'w05' => 'w05_8',
            'w06' => 'w06_8',
            'w07' => 'w07_8',
            'w08' => 'w08_8',
            'w09' => 'w09_8',
            'w10' => 'w10_8',
            'w11' => 'w11_8',
            'w12' => 'w12_8',
            'w13' => 'w13_8',
            'w14' => 'w14_8',
            'w15' => 'w15_8',
            'w16' => 'w16_8',
            'w17' => 'w17_8',
            'w18' => 'w18_8',
            'w19' => 'w19_8',
            'w20' => 'w20_8',
            'w21' => 'w21_8',
            'w22' => 'w22_8',
        ])
    </div>

</div>
@endsection

@section('scripts')
<script>

    // tabs

    $(document).ready(function() {

        $(".container-standing > div > div > a").click(function(e) {
            $(this).addClass("active");
            $(this).siblings().removeClass("active");

            var tab = $(this).attr("href");
            $(tab).siblings(".tab-content").not(tab).css("display", "none");
            $(tab).fadeIn();

            e.preventDefault();
        });
    });

    function setWidth(dataElement, element, cssProperty, percent) {
        var listData = [];

        $(dataElement).each(function() {
            listData.push($(this).html());
        });

        var listMax = Math.max.apply(Math, listData);

        $(element).each(function(index) {
            $(this).css(cssProperty, (listData[index] / listMax) * percent + "%");
        });
    }

    setWidth(".total span", ".total h6", "width", 100);
    setWidth(".skater span", ".skater h6", "width", 100);
    setWidth(".goalie span", ".goalie h6", "width", 100);
    setWidth(".team span", ".team h6", "width", 100);
</script>
@endsection
