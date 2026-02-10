

<?php $__env->startSection('title', 'Users'); ?>
 

<?php $__env->startSection('content'); ?>

 <div class="main-content">

 <div class="page-content">
<div class="container-fluid">

 <!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
 <h4 class="mb-sm-0 font-size-18">Manage Users</h4>

 <div class="page-title-right">
<div class="page-title-right">

</div>
</div>
</div>
</div>
<div>
 <!-- end page title -->

 <?php if(session('error')): ?>

 <div class="alert alert-<?php echo e(Session::get('class')); ?> p-3">
                    
                   <?php echo e(Session::get('error')); ?>  
                </div>

<?php endif; ?>


<div class="row">
 <div class="col-12">
    <form action="<?php echo e(URL('/user_update')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

<div class="card">
<div class="card-body">

<h4 class="card-title">User Profile</h4>
<p class="card-title-desc"></p>

  



<div class="mb-3 row">
<label for="example-email-input" class="col-md-2 col-form-label">Full Name</label>
<div class="col-md-10">
<?php echo e($v_users[0]->FullName); ?>

</div>
</div>
<div class="mb-3 row">
<label for="example-url-input" class="col-md-2 col-form-label">Username</label>
 
<div class="col-md-10">
<?php echo e($v_users[0]->Email); ?>

</div></div>
 
<div class="mb-3 row">
<label for="example-tel-input" class="col-md-2 col-form-label">User Type</label>
<div class="col-md-10">

 <?php echo e($v_users[0]->UserType); ?>


</div>
 </div>
 <div class="mb-3 row">
<label for="example-tel-input" class="col-md-2 col-form-label">Active</label>
<div class="col-md-10">
<?php echo e(($v_users[0]->Active=='Y') ? 'Yes' : 'No'); ?> </div>
 </div>

 
                                      
 
                                    
    
                                      
                                        

                                       

                                    </div>
                                </div>

                            </form>
                            </div> <!-- end col -->
                        </div>
                      

  
                         
                     
                        
                    </div> <!-- container-fluid -->
                </div>


    
</div>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\eits\al-molabi-staging\resources\views/user_profile.blade.php ENDPATH**/ ?>