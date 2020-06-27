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
                <b>POINTS</b>
               <div style="float: right;">
                <b>Comp Name :</b> <?php echo $points[0]->comp_name; ?>
               </div>
            </div>
            <div class="card-body">
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Img</th>
        <th>Team</th>
        <th>M</th>
        <th>W</th>
        <th>L</th>
        <th>NRR</th>
        <th>Pts</th>
      </tr>
    </thead>
    <tbody>

   <?php $i=1; foreach($points as $point){ ?>
   <?php
        if(isset($point->teamImage) && !empty($point->teamImage)){
            $teamimage = $point->teamImage;
                }else{
            $teamimage = 'dummy.jpg';
        }
    ?>
      <tr>
        <td> <img src="{{ url('public/frontpages/images/teams/') }}/<?php echo $teamimage; ?>" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail" style="width: 30px;"></td>
        <td><?php echo $point->teamName; ?></td>
        <td><?php echo $point->Played; ?></td>
        <td><?php echo $point->Won; ?></td>
        <td><?php echo $point->Lost; ?></td>
        <td><?php echo $point->NetRunRate; ?></td>
        <td><?php echo $point->Points; ?></td>
      </tr>
    
    <?php $i++; } ?>
 
    </tbody>
  </table>
                    
        </div>
                    
        </div>


    </div>
</div>
</div>
@endsection
