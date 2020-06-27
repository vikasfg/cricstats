@extends('layouts.app')

@section('content')

<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<style type="text/css">
    <style>
    
    #wrapper {
      
        margin: 0 auto
    }
.ipl_aution_container {
    padding: 7px 10px;
    display: flex;
    flex-flow: column wrap;
}
.card_container {
    clear: both;
}
.card_container.team .card, .card_container h2~.card {
    box-shadow: 0 0 10px #eae8e8;
}
.player_details {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.playerName {
    display: flex;
    align-items: center;
}
.card_container .card figure {
    float: left;
    width: 80px;
    height: 80px;
    border-radius: 100%;
    overflow: hidden;
    box-shadow: 0 0 5px #0000001f;
    margin: 15px 25px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    background: #fff;
}
.card_container .card figure img {
    max-width: 100%;
}
.card_container.team .playerName h3 {
    color: #3f2e65;
}
.card_container.team .sold.playerlist {
    background: #19398a;
    color: #fff;
    text-transform: capitalize;
    font-size: 18px;
    pointer-events: all;
    line-height: 42px;
    height: auto;
    padding: 0 30px;
}
.sold {
    border: none;
    font-family: 'Bhaskar_Web_Head_Test_exp', 'Open Sans', sans-serif;
    text-transform: uppercase;
    pointer-events: none;
    background: #297b2b;
    padding: 0 13px;
    border-radius: 40px;
    line-height: 30px;
    height: 30px;
    color: #fff;
    font-size: 20px;
    margin-right: 9%;
    cursor: pointer;
}
.auction_details {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #eaf6ff;
    padding: 20px 10px 20px 35px;
}
.auction_details li {
    display: block;
    color: #474747;
    font-size: 18px;
    line-height: 28px;
    }
    .card_container .auction_details strong {
    display: block;
    color: #001b61;
}
</style>
<div class="container">
<div class="row justify-content-center">

<div class="col-md-2">
        <div class="card">
           @include('sidebar')
        </div>
    </div>

    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <b>FIXTURES</b>
               
            </div>
            <div class="card-body">
                <div class="row">
          <?php $i=1; foreach($fixtures as $fixture){ 
            $away_team = DB::table ( 'cricket_team_pictures' )->where('team_id',$fixture->away_team)->first();
            $home_team = DB::table ( 'cricket_team_pictures' )->where('team_id',$fixture->home_team)->first();
            ?>
                    <?php
                        if(isset($away_team->image) && !empty($away_team->image)){
                            $away_team_img = $away_team->image;
                        }else{
                            $away_team_img = 'dummy_team.jpeg';
                        }

                        if(isset($home_team->image) && !empty($home_team->image)){
                            $home_team_img = $home_team->image;
                        }else{
                            $home_team_img = 'dummy_team.jpeg';
                        }

             $match_msg = DB::table ( 'cricket_match_detail' )->where('id', $fixture->id)->first();



                      ?>
           <div class="col-sm-12">
            <div class="panel panel-default">
            <div class="panel-heading"><?php echo $fixture->comp_name; ?>
                <div style="float: right;"><?php echo $fixture->description; ?></div>
            </div>
    
           <div class="panel-body">
            
            <div class="col-sm-12">
              <div class="col-sm-6">
                <div class="col-sm-12">
                    <div class="col-sm-4">
                        <img src="{{ url('public/frontpages/images/teams/') }}/<?php echo $away_team_img; ?>" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail" style="width: 80px;">
                    </div>
                    <div class="col-sm-8">
                       <div style="margin-top: 16px;"> <b><?php echo $fixture->away_team_name; ?></b></div>
                    </div>
                </div>
              </div>

               <div class="col-sm-6">
                <div class="col-sm-12">
                    <div class="col-sm-4">
                        <img src="{{ url('public/frontpages/images/teams/') }}/<?php echo $home_team_img; ?>" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail" style="width: 80px;">
                    </div>
                    <div class="col-sm-8">
                         <div style="margin-top: 16px;"> <b><?php echo $fixture->home_team_name; ?></b></div>
                    </div>
                </div>
              </div>
            </div>

            <div class="col-sm-12">
                <div class="col-sm-6">
                    <div style="text-align:right; margin-top: 20px;"><b>Date:</b> <?php echo $fixture->game_date_string; ?> <b> | Venue: </b> <?php echo $fixture->venue; ?></div>
                </div>
                <div class="col-sm-6">
                    <div style="text-align:left; margin-top: 20px;"><b>Match Status: </b> <?php echo isset($match_msg->result_text)?$match_msg->result_text:"Not Available"; ?></div>
                </div>
            </div>
          </div>
              

           </div>
            </div>

            <?php $i++; } ?>
            </div>

                    <div style="float: right;">
                        {{ $fixtures->links() }}
                      </div>
        </div>
                    
        </div>


    </div>
</div>
</div>
@endsection
