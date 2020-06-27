@extends('admin/includes.layout') @section('content')


    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2>User List</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User List</li>
                            </ol>
                        </nav>
                    </div>            
                    <!-- <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-round" title="">Add New</a>
                    </div> -->
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Users">Users</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#addUser">Admin Users</a></li>        
                        </ul>
                        <div class="tab-content mt-0">
                            <div class="tab-pane active show" id="Users">
                                <div class="table-responsive">
                                    <table class="table table-hover table-custom spacing8">
                                        <thead style="text-align: center;">
                                            <tr>
                                                 <th class="">#</th>
                                                <th class="">#</th>
                                                <th>Name</th>
                                                <th>Device-ID</th>
                                                <th>DB-ID</th>
                                                <th>Mobile</th>
                                                <th>Registred Date</th>
                                                <th class="">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody style="">
                                           <?php $i=1; foreach ($data as $user) { ?>
                                           <?php 
                                                    $string = $user->user_name;
                                                    $name = explode(" ", $string);
                                                    $fname = isset($name[0])?$name[0]:"";
                                                    $lname = isset($name[1])?$name[1]:"";
                                                    
                                           ?>
                                            <tr>
                                                <td><?php echo $user->lqu_id; ?></td>
                                                <td class="width45">
                                                    <div class="avtar-pic w35 bg-pink" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $user->user_name; ?>"><span><?php echo substr($fname,0,1); ?><?php echo substr($lname,0,1); ?></span></div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0"><?php echo $user->user_name; ?></h6>
                                                    <span><?php echo $user->user_email; ?></span>
                                                </td>
                                                <td><?php echo $user->device_id; ?></td>
                                                 <td><?php echo $user->db_id; ?></td>
                                                 <td><?php echo $user->user_mobile; ?></td>
                                                <td><?php echo date("jS M, Y", strtotime($user->created_at)); ?></td>
                                                 <td>
                                                   <button type="button" class="btn btn-sm btn-default js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; } ?>
                                            
                                        </tbody>
                                    </table>

                                     <div style="float: right;">
                                      {{ $data->links() }}
                                    </div>                
                                </div>
                            </div>

                            <div class="tab-pane" id="addUser">
                                  <div class="table-responsive">
                                    <table class="table table-hover table-custom spacing8">
                                        <thead style="text-align: center;">
                                            <tr>
                                                 <th class="">#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Registred Date</th>
                                                <th class="">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody style="">
                                           <?php $i=1; foreach ($dataA as $user) { ?>
                                           
                                            <tr>
                                                <td><?php echo $user->id; ?></td>
                                                <td class="width45">
                                                    <?php echo $user->name; ?>
                                                </td>
                                                 <td>
                                                    <h6 class="mb-0"><?php echo $user->email; ?></h6>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0"><?php echo $user->mobile_no; ?></h6>
                                                </td>
                                                <td><?php echo date("jS M, Y", strtotime($user->created_at)); ?></td>
                                                 <td>
                                                    <a href="#"><button type="button" class="btn btn-sm btn-default" title="Edit"><i class="fa fa-eye text-success"></i></button></a>
                                                   <button type="button" class="btn btn-sm btn-default" title="Edit"><i class="fa fa-edit text-warning"></i></button>
                                                   <button type="button" class="btn btn-sm btn-default js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                                                </td>
                                            </tr>
                                            <?php $i++; } ?>
                                            
                                        </tbody>
                                    </table>

                                     <div style="float: right;">
                                      {{ $dataA->links() }}
                                    </div>                
                                </div>
                            </div>
                        </div>            
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection