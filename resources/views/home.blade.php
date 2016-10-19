@extends('layouts.app')

@section('content')
<div class="container-home">

    <div>
        <div class="container-recent-skater">
            <div class="table">
               <div class="th">recent activity</div>

               @foreach($recent_skater as $skater)
               <div class="tr">
                   <div><i class="fa fa-{{ $skater->add_drop }}-circle franchise-{{ $skater->franchise_id }}"></i></div>
                   <div>
                        <span>{{ $skater->player_name }}</span>
                        <span>{{ $skater->player_pos}}</span>
                        <span>{{ $skater->transaction_type }}</span>
                        <span class="icon-{{ $skater->injury_status }}"></span>
                    </div>
                   <div><i class="icon-{{ $skater->franchise_id }} franchise-{{ $skater->franchise_id }}"></i></div>
                   <div>{{ date("j M", strtotime($skater->added_on)) }}</div>
               </div>
               @endforeach
           </div>
        </div>

        <div>
            <div>
                <div class="container-recent-goalie">
                    <div class="table">
                       <div class="th">recent activity</div>

                       @foreach($recent_goalie as $goalie)
                       <div class="tr">
                           <div><i class="fa fa-{{ $goalie->add_drop }}-circle franchise-{{ $goalie->franchise_id }}"></i></div>
                           <div>
                                <span>{{ $goalie->player_name }}</span>
                                <span>{{ $goalie->player_pos }}</span>
                                <span>{{ $goalie->transaction_type }}</span>
                                <span class="icon-{{ $goalie->injury_status }}"></span>
                            </div>
                           <div><i class="icon-{{ $goalie->franchise_id }} franchise-{{ $goalie->franchise_id }}"></i></div>
                           <div>{{ date("j M", strtotime($goalie->added_on)) }}</div>
                       </div>
                       @endforeach
                   </div>
                </div>
                <div class="continer-message"></div>
            </div>
            <div class="container-transactions">
                <div class="table">
                   <div class="th">
                       <ul>
                           <li>season information</li>
                           <li>season info</li>
                           <li>huddy</li>
                           <li>gretzky</li>
                           <li>traded</li>
                           <li>sign</li>
                           <li>release</li>
                           <li>waiver</li>
                           <li>t</li>
                           <li>s</li>
                           <li>r</li>
                           <li>w</li>
                       </ul>
                   </div>

                   @foreach($information as $info)
                   <div class="tr">
                       <div>{{ $info->franchise_name }}</div>
                       <div>{{ $info->huddy_year }}</div>
                       <div>{{ $info->gretzky_year }}</div>
                       <div>{{ $info->trade_year }}</div>
                       <div>{{ $info->sign_year }}</div>
                       <div>{{ $info->release_year }}</div>
                       <div>{{ $info->waiver_order }}</div>
                   </div>
                   @endforeach
               </div>
            </div>
        </div>
    </div>

    <div>
        <div>
            <div class="container-trade">
            </div>
            <div>
                <div class="container-huddy">
                </div>
                <div class="container-gretzky">
                </div>
            </div>
        </div>
        <div class="container-standings">
        </div>
    </div>


</div>
@endsection
