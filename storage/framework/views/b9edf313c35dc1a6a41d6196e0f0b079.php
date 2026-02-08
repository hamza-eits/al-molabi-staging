<?php $__env->startSection('title', $pagetitle); ?>
 

<?php $__env->startSection('content'); ?>

<div class="main-content">

<div class="page-content">
<div class="container-fluid">
  
  <?php if(session('error')): ?>

 <div class="alert alert-<?php echo e(Session::get('class')); ?> p-3" id="success-alert">
                    
                   <?php echo e(Session::get('error')); ?>  
                </div>

<?php endif; ?>

 <?php if(count($errors) > 0): ?>
                                 
                            <div >
                <div class="alert alert-danger pt-3 pl-0   border-3">
                   <p class="font-weight-bold"> There were some problems with your input.</p>
                    <ul>
                        
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                </div>
 
            <?php endif; ?>

            
  <div class="card">
      <div class="card-body">
           <form action="<?php echo e(URL('/UserUpdate')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

  
<h4 class="card-title">Update User</h4>
<p class="card-title-desc"></p>

 <input type="hidden" name="UserID" value="<?php echo e($v_users[0]->UserID); ?>">



<div class="mb-3 row">
<label for="example-email-input" class="col-md-2 col-form-label">Full Name</label>
<div class="col-md-4">
<input class="form-control" type="text"   name="FullName" id="example-email-input" value="<?php echo e($v_users[0]->FullName); ?>">
</div>
</div>
<div class="mb-3 row">
<label for="example-url-input" class="col-md-2 col-form-label">Username</label>
<div class="col-md-4">
<input class="form-control" type="text"  name="Email" required value="<?php echo e($v_users[0]->Email); ?>">
</div>

</div>
<div class="mb-3 row">
<label for="example-url-input" class="col-md-2 col-form-label">Password</label>
<div class="col-md-4">
<input class="form-control" type="text"  name="Password" required value="<?php echo e($v_users[0]->Password); ?>">
</div>

</div>

 <div class="mb-3 row">
<label for="example-tel-input" class="col-md-2 col-form-label fw-bold">Branch</label>
<div class="col-md-4">
<select name="branch_id" class="form-select">

     

     
   
    <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <option value="<?php echo e($value->id); ?>" ><?php echo e($value->name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   
    


</select> </div>
 </div>


<div class="mb-3 row">
<label for="example-tel-input" class="col-md-2 col-form-label">User Type</label>
<div class="col-md-4">
<select name="UserType" class="form-select">

     
    <?php if(session('UserType') == 'SuperAdmin'): ?>
        <option value="Admin" <?php echo e(($v_users[0]->UserType == 'SuperAdmin' ) ? 'selected=selected':''); ?>>SuperAdmin</option>
    <?php endif; ?>
     <option value="Admin" <?php echo e(($v_users[0]->UserType == 'Admin' ) ? 'selected=selected':''); ?>>Admin</option>
    <option value="User" <?php echo e(($v_users[0]->UserType == 'User' ) ? 'selected=selected':''); ?>>User</option>
    <option value="Agent" <?php echo e(($v_users[0]->UserType == 'Agent' ) ? 'selected=selected':''); ?>>Agent</option>
    <option value="Saleman" <?php echo e(($v_users[0]->UserType == 'Saleman' ) ? 'selected=selected':''); ?>>Saleman</option>
      
     




</select> </div>
 </div>
 <div class="mb-3 row">
<label for="example-tel-input" class="col-md-2 col-form-label">Active</label>
<div class="col-md-4">
<select name="Active" class="form-select">

     
    <option value="Yes" <?php echo e(($v_users[0]->Active == 'Yes' ) ? 'selected=selected':''); ?>>Yes</option>
    <option value="No" <?php echo e(($v_users[0]->Active == 'No' ) ? 'selected=selected':''); ?>>No</option>
    
    


</select> </div>
 </div>

 
                                      
    <input type="submit" class="btn btn-primary w-md" value="Update">  

    <a href="<?php echo e(URL('/User')); ?>" class="btn btn-secondary w-md">Cancel</a>                                
                                   
    
                                      
                                        

                                       

                             

                            </form>
  
  </div>
  
  </div>
</div>

        </div>
      </div>


  <?php $__env->stopSection(); ?>
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/al-molabi/resources/views/user_edit.blade.php ENDPATH**/ ?>