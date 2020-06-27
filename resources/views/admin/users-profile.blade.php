@extends('admin/includes.layout') @section('content')


    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2>User Profile</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                            </ol>
                        </nav>
                    </div>            
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <a href="<?php echo URL::to('/admin/users-list/'); ?>" class="btn btn-sm btn-primary btn-round" title="">List Users</a>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card social">
                        <div class="profile-header d-flex justify-content-between justify-content-center">
                            <div class="d-flex">
                                <div class="mr-3">
                                     <?php if(isset($user->avatar) && !empty($user->avatar) && $user->avatar != ""){ 
                                        ?>
                                    <img src="<?php echo str_replace("gs://users/profile-photo/","https://visuals.dbnewshub.com/bhaskar/cms-assets/users/profile-photo/", $user->avatar); ?>" class="rounded" alt="">
                                    <?php }else{ ?>
                                            <img src="<?php echo URL::to('admin/assets/images/user.png'); ?>" class="rounded" alt="">
                                    <?php } ?>
                                </div>
                                <div class="details">
                                    <h5 class="mb-0"><?php echo ucwords($user->name); ?></h5>
                                    <span class="text-light">Registred User</span>
                                    <p class="mb-0"><span>Mobile Number: <strong><?php echo isset($user->mobile_no)?$user->mobile_no:"Not Available"; ?></strong></p>
                                </div>
                            </div>
                            <div>
                               <div class="details">
                                    <h6 class="mb-0"><span style="color: #007bff; background-color: red; padding: 3px;">Device ID:</span> <strong style="margin-left: 4px;"><?php echo isset($user->device_id)?$user->device_id:"Not Available"; ?></strong></h6>
                                     <h6 class="mb-0" style="margin-top: 14px;"><span style="color: #007bff; background-color: red; padding: 3px;">DB ID:</span><strong style="margin-left: 4px;"><?php echo isset($user->db_id)?$user->db_id:"Not Available"; ?></strong></h6>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>               

                <div class="col-xl-4 col-lg-4 col-md-5">
                    <div class="card">
                        <div class="header">
                            <h2>Info</h2>
                            <ul class="header-dropdown dropdown">                                
                                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                            </ul>
                        </div>
                        <div class="body">
                            <small class="text-muted">Address: </small>
                            <?php if(isset($user->addressline1) && !empty($user->addressline1)){ ?>
                            <p><?php echo $user->addressline1; ?></p>
                            <p><?php echo $user->addressline2; ?></p>
                            <p><?php echo $user->addressline3; ?></p>
                            <p><?php echo $user->pincode; ?></p>
                             <p><?php echo $user->city; ?></p>
                            <?php }else{ ?>
                            <p><?php echo "Address Not Available"; ?></p>
                            <?php } ?>
                            
                              <hr>
                            <small class="text-muted">Device Id: </small>
                            <p><?php echo $user->device_id; ?></p>                            
                            <hr>
                              <small class="text-muted">Registred Date: </small>
                            <p><?php echo date("jS M, Y", $user->created); ?></p>                            
                            <hr>
                            <small class="text-muted">DB ID:</small>
                            <p><?php echo $user->db_id; ?></p>                          
                            <hr>
                            <hr>
                            <small class="text-muted">Email address: </small>
                            <p><?php echo $user->mail; ?></p>                            
                            <hr>
                            <small class="text-muted">Mobile: </small>
                            <p><?php echo $user->mobile_no; ?></p>
                            <hr>
                            <small class="text-muted">Birth Date: </small>
                            <p class="m-b-0"><?php echo date('M', $user->dob_month); ?> <?php echo date('d', $user->dob_day); ?></p>
                            <hr>
                            <div>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1923731.7533500232!2d-120.39098936853455!3d37.63767091877441!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan+Francisco%2C+CA%2C+USA!5e0!3m2!1sen!2sin!4v1522391841133" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                            <hr>
                            <small class="text-muted">Social: </small>
                            <p><i class="fa fa-twitter m-r-5"></i> twitter.com/example</p>
                            <p><i class="fa fa-facebook  m-r-5"></i> facebook.com/example</p>
                            <p><i class="fa fa-github m-r-5"></i> github.com/example</p>
                            <p><i class="fa fa-instagram m-r-5"></i> instagram.com/example</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-8 col-md-7">
                    <div class="card">
                        <div class="header">
                            <h2>Basic Information</h2>
                            <ul class="header-dropdown dropdown">                                
                                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">                                                
                                        <input type="text" class="form-control" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">                                                
                                        <input type="text" class="form-control" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option value="">-- Select Gander --</option>
                                            <option value="AF">Male</option>
                                            <option value="AX">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar"></i></span>
                                            </div>
                                            <input data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Birthdate">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-globe"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="http://">
                                        </div>
                                    </div>
                                </div>                                
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option value="">-- Select Country --</option>
                                            <option value="AF">Afghanistan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="State/Province">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="City">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">                                                
                                        <textarea rows="4" type="text" class="form-control" placeholder="Address"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <ul class="list-group mb-3 tp-setting">
                                        <li class="list-group-item">
                                            Anyone seeing my profile page
                                            <div class="float-right">
                                                <label class="switch">
                                                    <input type="checkbox" checked>
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            Anyone send me a message
                                            <div class="float-right">
                                                <label class="switch">
                                                    <input type="checkbox">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            Anyone posts a comment on my post
                                            <div class="float-right">
                                                <label class="switch">
                                                    <input type="checkbox" checked>
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            Anyone invite me to group
                                            <div class="float-right">
                                                <label class="switch">
                                                    <input type="checkbox" checked>
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                           <!--  <button type="button" class="btn btn-round btn-primary">Update</button> &nbsp;&nbsp;
                            <button type="button" class="btn btn-round btn-default">Cancel</button> -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>Account Data</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12">
                                    <hr>
                                    <h6>Change Password</h6>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Current Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="New Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Confirm New Password">
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-round btn-primary">Update</button> &nbsp;&nbsp;
                            <button type="button" class="btn btn-round btn-default">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection