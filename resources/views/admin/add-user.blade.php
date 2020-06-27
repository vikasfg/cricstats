@extends('admin/includes.layout') @section('content')

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2>Add User</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">User</a></li>
                            <li class="breadcrumb-item active"><a href="#">Add Team</a></li>
                            <li class="breadcrumb-item" aria-current="page">List User</li>
                            </ol>
                        </nav>
                    </div>  

                     <div class="col-md-7 col-sm-12">
                        @if (session('confirm'))
                        <div class="alert alert-success" role="alert"><p class="text-success">{{ session('confirm') }}</p></div>
                        @endif @if (session('error'))
                        <div class="alert alert-danger" role="alert"><p class="text-danger">{{ session('error') }}</p></div>
                        @endif
                        @if (session('message'))
                        <div class="alert alert-warning" role="alert"><p class="text-warning">{{ session('message') }}</p></div>
                        @endif
                    </div>
                              
                </div>
            </div>
            {{ Form::open(array('url' => '/admin/add-user', 'method' => 'post','files' => true)) }}
            <div class="row clearfix">
                <div class="col-xl-7 col-lg-7 col-md-7">
                    <div class="card">
                        <div class="header">
                            <h2>User Details</h2>
                        </div>
                        <div class="body">
                            
                            <small class="text-muted">Name</small>
                            <p>
                                <div class="form-group">
                                    <div class="input-group">
                                        {{ Form::text('val_username', '',$attributes =
								array('placeholder'=>'Name','class'=>"form-control",'id'=>"val_username") ) }}
                                    </div>
                                </div>
                            </p>   


                            <small class="text-muted">Email</small>
                            <p>
                                <div class="form-group">
                                   <div class="form-group">
                                                {{ Form::email('val_email', '',$attributes =
								array('placeholder'=>'test@example.com','class'=>"form-control",'id'=>"val_email")
								) }} 
                                            </div>
                                </div>
                            </p>
                            
                            <small class="text-muted">Role - Select Role Type</small>
                            <p>
                                <div class="form-group">
                                   <div class="form-group">
                                                <select class="form-control show-tick" name="val_role" required="">
                                                    <option value="1">Super Admin</option>
                                                    <option value="2">Admin</option>
                                                    <option value="3">Manager</option>
                                                </select>
                                              </div>
                                           </div>
                                       </p>

                            <small class="text-muted">Mobile</small>
                            <p>
                                <div class="form-group">
                                   <div class="form-group">
                                            <input type="number" class="form-control" name="mobile_no" required="" placeholder="Mobile No *">
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-5 col-md-5">
                    <div class="card">
                        <div class="header">
                            <h2>Others Details</h2>
                        </div>
                        <div class="body">
                     <small class="text-muted">Image</small>
                     <small class="text-muted">Password</small>
                            <p>
                                <div class="form-group">
                                   <div class="form-group">
                                                <input type="password" id="val_password" name="val_password"
									class="form-control" placeholder="Choose a crazy one..">
                                            </div>
                                </div>
                            </p>   

                             <small class="text-muted">Confirm Password</small>
                            <p>
                                <div class="form-group">
                                   <div class="form-group">
                                                <input type="password" id="val_confirm_password"
									name="val_confirm_password" class="form-control"
									placeholder="..and confirm it!">
                                            </div>
                                </div>
                            </p>   

                           
                       </div>
                       </div>     
                    </div>

                    <div class="col-md-12" style="text-align: center;">
                        <div class="cstm_sub">
                            <input align="center" type="submit" class="btn btn-round btn-primary" value="Add">
                        </div>
                    </div>
                </div>
            </forms>
            </div>
        </div>
    </div>



@endsection