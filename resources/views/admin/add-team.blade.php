@extends('admin/includes.layout') @section('content')

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2>Add Teams</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Teams</a></li>
                            <li class="breadcrumb-item active"><a href="#">Add Team</a></li>
                            <li class="breadcrumb-item" aria-current="page">List Teams</li>
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
            {{ Form::open(array('url' => '/admin/add-team', 'method' => 'post','files' => true)) }}
            <div class="row clearfix">
                <div class="col-xl-7 col-lg-7 col-md-7">
                    <div class="card">
                        <div class="header">
                            <h2>Teams Details</h2>
                        </div>
                        <div class="body">
                            
                            <small class="text-muted">Name</small>
                            <p>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="name" required id="name" class="form-control" placeholder="Enter Name">
                                    </div>
                                </div>
                            </p>   

                            <small class="text-muted">Short Name</small>
                            <p>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="short_name" id="short_name" required class="form-control" placeholder="Enter Short Name">
                                    </div>
                                </div>
                            </p>   

                            <input class="checkbox-tick" value="1" type="hidden" name="status">
                        </div>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-5 col-md-5">
                    <div class="card">
                        <div class="header">
                            <h2>Team Details</h2>
                        </div>
                        <div class="body">
                     <small class="text-muted">Image</small>
                            <p>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="file" style="height: 41px; background-color: #ccc" name="image" class="form-control" required>
                                        
                                    </div>
                                </div>
                            </p>   

                           
                       </div>
                       </div>     
                    </div>

                    <div class="col-md-12" style="text-align: center;">
                        <div class="cstm_sub">
                            <!-- <button type="button" class="btn btn-round btn-primary">Add</button> &nbsp;&nbsp;
                            <button type="cancel" class="btn btn-round btn-default">Cancel</button> -->
                            <input align="center" type="submit" class="btn btn-round btn-primary" value="Add">
                                    <!-- <button type="button" class="btn btn-round btn-default">Cancel</button> -->
                        </div>
                    </div>
                </div>
            </forms>
            </div>
        </div>
    </div>



@endsection