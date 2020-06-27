@extends('admin/includes.layout') @section('content')


    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-4 col-sm-12">
                        <h1>Dashboard</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Cricket Panel</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                     <div class="col-md-4 col-sm-12">
							@if (session('confirm'))
							<div class="alert alert-success" role="alert"><p class="text-success">{{ session('confirm') }}</p></div>
							@endif @if (session('error'))
							<div class="alert alert-danger" role="alert"><p class="text-danger">{{ session('error') }}</p></div>
							@endif
							@if (session('message'))
							<div class="alert alert-warning" role="alert"><p class="text-warning">{{ session('message') }}</p></div>
							@endif
                    </div>             
                    <div class="col-md-4 col-sm-12 text-right hidden-xs">
                        <a href="<?php echo url('admin/add-team'); ?>" class="btn btn-sm btn-primary" title="">Add Team</a>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="header">
                        <h6>Account Statics</h6>
                </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i class="fa fa-briefcase"></i></div>
                                <div class="ml-4">
                                    <span>Total income</span>
                                    <h4 class="mb-0 font-weight-medium">&#8377; 7,805</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-azura text-white rounded-circle"><i class="fa fa-credit-card"></i></div>
                                <div class="ml-4">
                                    <span>Amount Sent</span>
                                    <h4 class="mb-0 font-weight-medium">&#8377; 3,651</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-orange text-white rounded-circle"><i class="fa fa-users"></i></div>
                                <div class="ml-4">
                                    <span>Today's Amount</span>
                                    <h4 class="mb-0 font-weight-medium">&#8377; 5,805</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-pink text-white rounded-circle"><i class="fa fa-life-ring"></i></div>
                                <div class="ml-4">
                                    <span>Remaining Amount</span>
                                    <h4 class="mb-0 font-weight-medium">&#8377; 13,651</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        </div>           

          <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Upcoming Matchs</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-custom spacing5">
                                <thead>
                                    <tr>
                                        <th>Match Id</th>
                                        <th>Team V Team</th>
                                        <th>Date</th>
                                        <th>Venue</th>
                                        
                                    </tr>
                                </thead>
                                  <tbody>

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

                                    <tr>
                                        <td><?php echo $fixture->id; ?></td>
                                        <td><span class="text-green"><?php echo $fixture->away_team_name; ?> <b>VS</b> <?php echo $fixture->home_team_name; ?></span> </td>
                                        <td><?php echo $fixture->game_date_string; ?></td>
                                        <td><?php echo $fixture->venue; ?></td>
                                       
                                    </tr>
                    <?php $i++; } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>          

                   
        </div>
    </div>
    



	@endsection