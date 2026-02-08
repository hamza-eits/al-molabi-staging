

<?php $__env->startSection('title', $pagetitle); ?>


<?php $__env->startSection('content'); ?>





<?php if(session('error')): ?>

<div class="alert alert-<?php echo e(Session::get('class')); ?> p-1" id="success-alert">

  <?php echo e(Session::get('error')); ?>

</div>

<?php endif; ?>

<?php if(count($errors) > 0): ?>

<div>
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
<div class="main-content">

  <div class="page-content">
    <div class="container-fluid">




      <!-- start page title -->
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">General Ledger</h4>



          </div>
        </div>
      </div>


      <div class="card">
        <div class="card-body">
          <!-- enctype="multipart/form-data" -->
          <form action="<?php echo e(URL('/ReconcileReport1')); ?>" method="post" name="form1" id="form1"> <?php echo e(csrf_field()); ?>



            <div class="col-md-4">
              <div class="mb-2">
                <label for="basicpill-firstname-input">Branch</label>
                <select name="BranchID" id="" class="select2 form-select" id="select2-basic" required="">
                    <?php if(session('UserType') == 'SuperAdmin'): ?>
                    <option value="0">All Branches</option>
                    <?php endif; ?>
                  <?php foreach ($branches as $key => $value): ?>
                  <option value="<?php echo e($value->id); ?>"><?php echo e($value->id); ?>-<?php echo e($value->name); ?></option>

                  <?php endforeach ?>
                </select>
              </div>
            </div>


            <div class="col-md-4">
              <div class="mb-1">
                <label for="basicpill-firstname-input">From Account #</label>
                <select name="ChartOfAccountID" id="" class="select2 form-select" id="select2-basic" required="">
                  <option value="0">All</option>
                  <?php foreach ($chartofaccount as $key => $value): ?>
                  <option value="<?php echo e($value->ChartOfAccountID); ?>">
                    <?php echo e($value->ChartOfAccountID); ?>-<?php echo e($value->ChartOfAccountName); ?></option>

                  <?php endforeach ?>
                </select>
              </div>
            </div>




            <div class="col-md-4">
              <div class="mb-1">
                <label for="basicpill-firstname-input">To Account #</label>
                <select name="ChartOfAccountID1" id="" class="select2 form-select" id="select2-basic" required="">
                  <option value="0">All</option>
                  <?php foreach ($chartofaccount as $key => $value): ?>
                  <option value="<?php echo e($value->ChartOfAccountID); ?>">
                    <?php echo e($value->ChartOfAccountID); ?>-<?php echo e($value->ChartOfAccountName); ?></option>

                  <?php endforeach ?>
                </select>
              </div>
            </div>



             <?php echo $__env->make('components.start_end_date', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




        </div>
        <div class="card-footer bg-light">
          <button type="submit" class="btn btn-success w-lg float-right" id="online">Submit</button>
          <a href="<?php echo e(URL('/')); ?>" class="btn btn-secondary w-lg float-right">Cancel</a>
        </div>
      </div>
      </form>
    </div>
  </div>

</div>
</div>
</div>
<!-- END: Content-->

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>


<script>
  $(document).ready(function(){
    $('#pdf').click(function(event){
        event.preventDefault();
        $('#form1').removeAttr('target');
        $('#form1').attr('action', '<?php echo e(URL("/ReconcileReport1")); ?>');
        $('#form1').submit();
    });
    $('#online').click(function(event){
        event.preventDefault();
        $('#form1').removeAttr('target');
        $('#form1').attr('action', '<?php echo e(URL("/ReconcileReport1")); ?>');
        $('#form1').submit();
    });
});
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/al-molabi/resources/views/reports/reconcile_report.blade.php ENDPATH**/ ?>