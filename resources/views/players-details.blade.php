@extends('layouts.app')

@section('content')


<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
@media (min-width: 992px)
.col-md-6 {
    width: 50%;
    float: left;
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
</style>
<div class="container">
<div class="row justify-content-center">

<div class="col-md-2">
        <div class="card">
           @include('sidebar')
        </div>
    </div>

<?php
                        if(isset($playerindi->player_img) && !empty($playerindi->player_img)){
                            $playerimage = $playerindi->player_img;
                        }else{
                            $playerimage = 'dummy.jpg';
                        }
                      ?>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <b>PLAPYER DETAILS</b>
                <div style="float: right;">
                <b>Team :</b> <?php echo $playerindi->team_name; ?>
                <b>Name :</b> <?php echo $playerindi->player_name; ?>  <img src="{{ url('public/frontpages/images/players/') }}/<?php echo $playerimage; ?>" alt="post img" class="pull-right img-responsive thumb margin10 img-thumbnail" style="width: 50px; margin-left: 10px;">
               </div>
            </div>
                    
             

            <div class="card-body">
          <?php $i=1; foreach($players as $player){ ?>
           <!--  <div class="card" style="margin-top: 10px;"> -->
                  <div class="col-md-12 blogShort">
                     <h3 style="margin-top: 5px;"><?php //echo $player->player_name; ?></h3>
                    
                     
                     <article>
    <div style="text-transform: uppercase;">
        <p style="color: blue; font-size: 18px;"><small><b>Competition Name: </small></b> <?php echo $player->comp_name; ?></br></p>
        <small><b>competition_id: </small></b> <?php echo $player->competition_id; ?></br>
        <small><b>balls bowled: </small></b> <?php echo $player->balls_bowled; ?></br>
        <small><b>balls faced: </small></b> <?php echo $player->balls_faced; ?> </br>
        <small><b>Balls Bowled: </small></b><?php echo $player->balls_bowled; ?></br>
        <small><b>Balls Faced: </small></b><?php echo $player->balls_faced; ?></br>
        <small><b>batting average: </small></b> <?php echo $player->batting_average; ?></br>
        <small><b>bowling average: </small></b><?php echo $player->bowling_average; ?></br>
        <small><b>economy rate: </small></b><?php echo $player->economy_rate; ?></br>
        <small><b>fifties scored: </small></b><?php echo $player->fifties_scored; ?></br>
        <small><b>five wickets: </small></b><?php echo $player->five_wickets; ?></br>
        <small><b>fours scored: </small></b><?php echo $player->fours_scored; ?></br>
        <small><b>highest runs scored: </small></b><?php echo $player->highest_runs_scored; ?></br>
        <small><b>hundreds scored: </small></b><?php echo $player->hundreds_scored; ?></br>
        <small><b>innings batted: </small></b><?php echo $player->innings_batted; ?></br>
        <small><b>innings bowled: </small></b><?php echo $player->innings_bowled; ?></br>
        <small><b>maidens bowled: </small></b><?php echo $player->maidens_bowled; ?></br>
        <small><b>mins batted: </small></b><?php echo $player->mins_batted; ?></br>
        <small><b>not out: </small></b><?php echo $player->not_out; ?></br>
        <small><b>overs bowled: </small></b><?php echo $player->overs_bowled; ?></br>
        <small><b>runs scored: </small></b><?php echo $player->runs_scored; ?></br>
        <small><b>sixes scored: </small></b><?php echo $player->sixes_scored; ?></br>
        <small><b>strike rate: </small></b><?php echo $player->strike_rate; ?></br>
        <small><b>ten wickets: </small></b><?php echo $player->ten_wickets; ?></br>
        <small><b>total balls bowled: </small></b><?php echo $player->total_balls_bowled; ?></br>
         <small><b>wickets taken: </small></b><?php echo $player->wickets_taken; ?></br>
    </div>
                     </article>
                   
                 </div>
           <!--  </div> -->
            <?php $i++; } ?>
           

                   
        </div>
                    
        </div>






</div>


@endsection
