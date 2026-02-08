<?php $__env->startSection('title', $pagetitle); ?>


<?php $__env->startSection('content'); ?>




 



 
<div class="main-content">

  <div class="page-content">
    <div class="container-fluid">




      <!-- start page title -->
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Saleman Ticket Register</h4>



          </div>
        </div>
      </div>


      <div class="card">

        <div class="card-body">
          <!-- enctype="multipart/form-data" -->
          <form action="<?php echo e(URL('/Log1')); ?>" method="post" name="form1" id="form1"> <?php echo e(csrf_field()); ?>


    <div class="col-md-4">
 
    <label for="basicpill-firstname-input">User *</label>
     <select name="UserID" id="UserID" class="form-select select2">
    <option value="">Select</option>

     <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($value->UserID); ?>" ><?php echo e($value->FullName); ?></option>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
 
  </select>
  </div>
 
              <?php echo $__env->make('components.start_end_date', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 










        </div>
        <div class="card-footer bg-light">
          <button type="submit" class="btn btn-success w-lg float-right" id="online">Submit</button>
        </div>
      </div>
              <?php if(Session::get('error')): ?>

<div class="alert alert-<?php echo e(Session::get('class')); ?> p-1" id="success-alert">

  <?php echo e(Session::get('error')); ?>

 

<?php endif; ?>
      </form>
    </div>
  </div>

</div>
</div>
</div>
<!-- END: Content-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/al-molabi/resources/views/log/log.blade.php ENDPATH**/ ?>