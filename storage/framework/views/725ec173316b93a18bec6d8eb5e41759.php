

<?php $__env->startSection('title', $pagetitle); ?>
 

<?php $__env->startSection('content'); ?>

 <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">User Rights & Control</h4>

                                    <div class="page-title-right">
                                        <div class="page-title-right">
                                         <!-- button will appear here -->
                                    </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
 
                       <!-- enctype="multipart/form-data" -->
                       <form action="<?php echo e(URL('/RoleUpdate')); ?>" method="post"> <?php echo e(csrf_field()); ?> 

 <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
   
  <div class="row">
    
  
     
   
   
   
  
  

         <div class="col-md-4">
   <div class="mb-3">
      <label for="basicpill-firstname-input">User*</label>
       <select name="UserID" id="UserID" class="form-select">
 
       <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($value->UserID); ?>" <?php echo e((old('UserID')== $value->UserID) ? 'selected=selected': ''); ?>><?php echo e($value->FullName); ?></option>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
    
    </select>
    </div>
     </div>

  </div>
  
     <input type="checkbox" id="checkAll" name="checkAll" >
     <label>Check All</label>
    <hr>
                                     
                                        <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$value1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          
                                         <h4  class="bg bg-light p-1"> <?php echo e($value1->Table); ?></h4>

<div class="row">
      


<?php 

$permission = DB::table('role')->where('Table',$value1->Table)->get();



 

    

foreach ($permission as $key =>$value)


   { 

$result=check_role($users[0]->UserID,$value->Table,$value->Action);



 

    ?>

      <div class="col-sm-2 mt-2 mb-3">
                                           
                                            
                                             <div class="custom-control custom-checkbox">
  <input name="Check[]" type="checkbox" class="custom-control-input" id="<?php echo e($value->RoleID); ?>"  value="Y" 
  <?php echo e(($result[0]->Allow == 'Y') ? 'checked' : ''); ?>   >
  <label class="custom-control-label" for="customCheck33079"><?php echo e($value->Action); ?> </label>
  <label>
  <input name="TableName[]" type="hidden" id="<?php echo e($value->RoleID); ?>" value="<?php echo e($value1->Table); ?>">
   <input name="Action[]" type="hidden" id="<?php echo e($value->RoleID); ?>" value="<?php echo e($value->Action); ?>">
   <input name="Allow[]" type="hidden" id="<?php echo e($value->RoleID); ?>Allow" value="<?php echo e($result[0]->Allow); ?>" class="role" >
   
  </label>
  
</div>
                                          
  </div>




<?php






 } ?>

</div>
                                    
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                         
                                        
<div><button type="submit" class="btn btn-success w-lg float-right">Save / Update</button>
     <a href="<?php echo e(URL('/')); ?>" class="btn btn-secondary w-lg float-right">Cancel</a>
</div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->

                           
                        </div>




                       </form>
                        <!-- end row -->

                      

                       

                         
                     
                        
                    </div> <!-- container-fluid -->
                </div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>


$(document).ready(function(){
   

$('input[type="checkbox"]').change(function() {
    var vals = $(this).val();
    var id = $(this).attr('id');
   
    if($(this).is(':checked')){
 
         $('#'+id+'Allow').val('Y');

        

        
    }else{
        
         $('#'+id+'Allow').val('N');
        
        // $(this).next().next("input[type='text']").val("");
    }

});




});

$('#checkAll').click(function () {    
     $('input:checkbox').prop('checked', this.checked);    


if($('input[name="checkAll"]').is(':checked'))
{
  $(".role").val('Y');
}else
{
 // unchecked
 $(".role").val('N');
}

 });
</script>

 



  <?php $__env->stopSection(); ?>
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/rotana_sky/resources/views/view_role.blade.php ENDPATH**/ ?>