

<?php $__env->startSection('title', $pagetitle); ?>
 

<?php $__env->startSection('content'); ?>
<div class="main-content">

<div class="page-content">
<div class="container-fluid">
 <h4 class="card-title">Add New User</h4>
<p class="card-title-desc"></p>
  
  <?php if(session('error')): ?>

 <div class="alert alert-<?php echo e(Session::get('class')); ?> p-2" id="success-alert">
                    
                   <?php echo e(Session::get('error')); ?>  
                </div>

<?php endif; ?>

 <?php if(count($errors) > 0): ?>
                                 
                            <div >
                <div class="alert alert-danger p-1   border-3">
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
          <form action="<?php echo e(URL('/UserSave')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

<div class="">
<div class="">



 



<div class="mb-1 row">
<label for="example-email-input" class="col-md-2 col-form-label fw-bold ">Full Name</label>
<div class="col-md-4">
<input class="form-control" type="text"  value="<?php echo e(old('FullName')); ?>"  name="FullName" id="example-email-input">
</div>
</div>
<div class="mb-1 row">
<label for="example-url-input" class="col-md-2 col-form-label fw-bold">Username</label>
<div class="col-md-4">
<input class="form-control" type="text"  value="<?php echo e(old('Email')); ?>" name="Email" required>
</div>

</div>
<div class="mb-1 row">
<label for="example-url-input" class="col-md-2 col-form-label fw-bold">Password</label>
<div class="col-md-4">
<input class="form-control" type="text"  name="Password" value="<?php echo e(old('Password')); ?>" required>
</div>

</div>

 <div class="mb-1 row">
<label for="example-tel-input" class="col-md-2 col-form-label fw-bold">Branch</label>
<div class="col-md-4">
<select name="branch_id" class="form-select">

     

     
   
    <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <option value="<?php echo e($value->id); ?>" ><?php echo e($value->name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   
    


</select> </div>
 </div>




<div class="mb-1 row">
<label for="example-tel-input" class="col-md-2 col-form-label fw-bold">User Type</label>
<div class="col-md-4">
<select name="UserType" class="form-select">

     
    <?php if(session('UserType') == 'SuperAdmin'): ?>
        <option value="SuperAdmin">SuperAdmin</option>
    <?php endif; ?>
    <option value="Admin">Admin</option>
    <option value="User">User</option>
    <option value="Agent">Agent</option>
    <option value="Saleman">Saleman</option>
    
    
    


</select> </div>
 </div>
 



 <div class="mb-1 row">
<label for="example-tel-input" class="col-md-2 col-form-label fw-bold">Active</label>
<div class="col-md-4">
<select name="Active" class="form-select">

     
    <option value="Yes">Yes</option>
    <option value="No">No</option>
    


</select> </div>
 </div>



 
                                      
    <input type="submit" class="btn btn-primary w-md">                                   
                                   
    
                                      
                                        

                                       

                                    </div>
                                </div>

                            </form>
      </div>
  </div>

  <div class="row">
      <div class="col-lg-12">
          
          <div class="card">
              
          <div class="card-body">
<!--             <h4 class="card-title text-center">Manage Users</h4>
 -->             <!-- <p class="card-title-desc"> Add <code>.table-sm</code> to make tables more compact by cutting cell padding in half.</p>  -->   
                                        
       <div class="table-responsive">
        <table class="table table-sm" id="student_table">
            <thead>
               <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Branch</th>
                <th>User Type</th>
                <th>Created on</th>
                 
                <th width="5">Active</th>
                <th>Action</th>
              </tr>
             </thead>
            <tbody>
 


                   <?php $no=1; ?> 
                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr>
     <td  ><?php echo e($no++); ?></td>
                <td scope="row"><?php echo e($value->FullName); ?>   </td>
                <td><?php echo e($value->Email); ?></td>
                <td><?php echo e($value->BranchName); ?></td>
                <td><?php echo e($value->UserType); ?></td>
                <td><?php echo e($value->eDate); ?></td>
                 
                <td class="text-center"><span class="top-0 start-100 translate-middle badge border border-light rounded-circle  <?php echo e(($value->Active=='Yes') ? 'bg-success' : 'bg-danger'); ?>  p-1"><span class="visually-hidden">unread messages</span></span></td>
                <td><div class="d-flex gap-1">
        <a href="<?php echo e(URL('/UserEdit/'.$value->UserID)); ?>" class="text-secondary"><i class="mdi mdi-pencil font-size-15"></i></a>
        <a href="#"  onclick="delete_confirm2('UserDelete',<?php echo e($value->UserID); ?>);" class="text-secondary"><i class="mdi mdi-delete font-size-15"></i></a>
        <a href="<?php echo e(URL('/checkUserRole/'.$value->UserID)); ?>"  class="text-secondary"><i class="fas fa-user-lock
 font-size-12"></i></a>
                                                             </div> </td>
                 
            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
              </tbody>
               </table>
        
                  </div>
        
                   </div>
          </div>
      </div>



  </div>  
  
  </div>
</div>

        </div>
      </div>
    </div>
    <!-- END: Content-->
<script type="text/javascript">
$(document).ready(function() {
     $('#student_table').DataTable( );
});
</script>

</div>
</div>
</div>

    
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/rotana_sky/resources/views/user.blade.php ENDPATH**/ ?>