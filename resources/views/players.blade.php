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

    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <b>PLAPYERS</b>
                <div style="float: right;">
                <b>Team :</b> <?php echo $team->name; ?>
               </div>
            </div>
            <div class="card-body">
          <?php $i=1; foreach($players as $player){ ?>
           <!--  <div class="card" style="margin-top: 10px;"> -->
                  <div class="col-md-6 blogShort">
                     <h3 style="margin-top: 5px;"><?php echo $player->player_name; ?></h3>
                     <?php
                        if(isset($player->teamImage) && !empty($player->teamImage)){
                            $teamimage = $player->teamImage;
                        }else{
                            $teamimage = 'dummy.jpg';
                        }
                        if(isset($player->player_img) && !empty($player->player_img)){
                            $playerimage = $player->player_img;
                        }else{
                            $playerimage = 'dummy.jpg';
                        }
                      ?>
                     <img src="{{ url('frontpages/images/players/') }}/<?php echo $playerimage; ?>" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail" style="width: 105px;">
                     <article>
                        <p>
                            <small>Name:</small> <?php echo $player->player_name; ?></br>
                            <small>Specialist:</small> <?php echo $player->specialist; ?></br>
                            <small>DOB/Place:</small> <?php echo $player->birth_date; ?> - <?php echo $player->birth_place; ?></br>
                            <small>Team Name:</small> <?php echo $player->team_name; ?></br>
                        </p>
                        <p><a href="<?php echo URL::to('/teams/'.$player->team_id.'/'.$player->id); ?>">See Player Detail</a></p>
                     </article>
                   
                 </div>
           <!--  </div> -->
            <?php $i++; } ?>

                    <div style="float: right;">
                        {{ $players->links() }}
                      </div>
        </div>
                    
        </div>






</div>


@endsection
