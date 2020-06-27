@extends('admin/includes.layout') @section('content')
<style type="text/css">
    .formclass {
    float: right;
    position: absolute;
    top: 8px;
    right: 10;
    font-size: 34px;
}
</style>
<div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-5 col-sm-12">
                        <h1>Teams List</h1>
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
            
            <div class="row clearfix">
                <div class="col-12">

                  <?php
                      if(isset($teams) && !empty($teams)){ 
                  ?>

                    <div class="table-responsive">
                        <table class="table table-hover table-custom spacing8">
                            <thead>
                                <tr> 
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Short Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                $i=1; foreach ($teams as $team) { ?>
                                <tr>
                                    <td><?php echo $team->id; ?></td>
                                   <td><img src="{{ url('public/frontpages/images/teams/') }}/<?php echo $team->image; ?>" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail" style="width: 50px;"></td>
                                    <td>
                                        <?php echo $team->name; ?>
                                    </td>
                                    <td>
                                        <?php echo $team->short_name; ?>
                                    </td>
                                    <td>
                                         <a href="<?php echo URL::to('/admin/update-team/'.$team->id); ?>"><button type="button" class="btn btn-primary mb-2 edit_data" title="Edit Comment"><span class="sr-only">Edit</span> <i class="fa fa-pencil"></i></button></a>

                                        <button type="button" class="btn btn-danger mb-2 delete" title="Move to trash" id='del_<?php echo $team->id; ?>'><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                        <div style="float: right;">
                         {{ $teams->links() }}
                        </div>

                    </div>

                     <?php }else{ ?>
                          <div style="text-align: center; color: red;" class=""><p colspan="5">Please Select one game Date first !</p></div>
                    <?php } ?>

                </div>
            </div>

            

        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script type="text/javascript">
$(document).ready(function(){

 // Delete 
 $('.delete').click(function(){

var r = confirm("Do you really want to delete this item?.");
    if (r == true) {

   var el = this;
   var id = this.id;
   var splitid = id.split("_");
   // Delete id
   var deleteid = splitid[1];
 
   // AJAX Request
   $.ajax({
     url: "<?php echo url('/admin/delete-team'); ?>",
     type: 'GET',
     data: { id:deleteid },
     success: function(response){
    if(response == 1){
     // Remove row from HTML Table
     $(el).closest('tr').css('background','tomato');
     $(el).closest('tr').fadeOut(800,function(){
        $(this).remove();
     });
      }else{
     alert('Invalid ID.');
      }

    }
   });
} else { 
}
 });

 // Delete 
 $('.unpublished').click(function(){
var r = confirm("Do you really want to Published this item?.");
    if (r == true) {

   var el = this;
   var id = this.id;
   var splitid = id.split("_");
   // Delete id
   var deleteid = splitid[1];
 
   // AJAX Request
   $.ajax({
     url: "<?php echo url('/admin/make-published-comment-ajax'); ?>",
     type: 'GET',
     data: { id:deleteid },
     success: function(response){
    if(response == 1){
     // Remove row from HTML Table
     $(el).closest('tr').css('background','tomato');
     $(el).closest('tr').fadeOut(400,function(){
        $(this).remove();
     });
      }else{
     alert('Invalid ID.');
      }

    }
   });
} else { 
}
 });
});
</script>

<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           $('#edit_error_message').hide();
           var comment_id = $(this).attr("id");  
           $.ajax({  
                url:"<?php echo url('/admin/get-single-comment-ajax'); ?>",  
                method:"GET",  
                data:{comment_id:comment_id},  
                dataType:"json",  
                success:function(data){  
                     $('#comment').val(data.comment);  
                     $('#comment_id').val(data.comment_id);
                     $('#newsDatabind').html(data.newsTitle);
                     $('#newsCatDatabind').html(data.categoryName);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){
           event.preventDefault();
           if($('#comment').val() == "")
           {  
                alert("Comment field is required");  
           }
           else  
           {    
            var comment_id = $('#comment_id').val();

                $.ajax({  
                     url:"<?php echo url('/admin/insert-single-comment-ajax'); ?>",  
                     method:"GET",  
                     data:$('#insert_form').serialize(),
                     beforeSend:function(){  
                          $('#insert').val("Updating");  
                     }, 
                     success:function(data){
                        if(data == 2){
                            $('#edit_error_message').show();
                             $('#insert').val("update");
                        }else{
                            $('#insert_form')[0].reset();  
                            $('#add_data_Modal').modal('hide'); 
                            // $('#comment_'+comment_id+).remove();
                            $( '#comment_'+comment_id).replaceWith(data);
                            $('#edit_success_message').show().fadeOut(5000,function(){
                            $(this).remove();
                         });
                            //$('#employee_table').html(data);  
                        }
                     }  
                });  
           }  
      });

        $('#insert_form_abuse').on("submit", function(event){  
           event.preventDefault();  
           if($('#abuse').val() == "")  
           {  
                alert("Field is required!");
           }
           else  
           {    
            var abuse_id = $('#abuse').val();

                $.ajax({  
                     url:"<?php echo url('/admin/insert-abuse-ajax'); ?>",  
                     method:"GET",  
                     data:$('#insert_form_abuse').serialize(),
                     beforeSend:function(){  
                          $('#Add').val("Adding");  
                     }, 
                     success:function(data){
                     //alert(data);
                          $('#insert_form_abuse')[0].reset();
                          $('#Add').val("Add");  
                          $('#abuse_success_message').show().fadeOut(5000,function(){
                            $(this).remove();
                         });
                     }  
                });  
           }  
      });  

 /*     $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      }); */ 
 });  
 </script>

@endsection