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
            <h4 class="mb-sm-0 font-size-18">Party Ledger</h4>



          </div>
        </div>
      </div>

      <div class="card shadow-sm">
        <div class="card-body">
          <!-- enctype="multipart/form-data" -->
          <form action="<?php echo e(URL('/PartyLedger1')); ?>" method="post" name="form1" id="form1"> <?php echo e(csrf_field()); ?>




         

            <div class="col-md-4">
              <label for="basicpill-firstname-input">Party Name</label>
              <div class="mb-2">
                  <select name="PartyID" id="partyID" class="select2 form-select" required>
                      <option value="">Select</option>
                      <?php foreach ($party as $key => $value): ?>
                      <option value="<?php echo e($value->PartyID); ?>"><?php echo e($value->PartyID); ?>-<?php echo e($value->PartyName); ?>-<?php echo e($value->Phone); ?></option>
                      <?php endforeach ?>
                  </select>
                  <span id="selectError" style="color: red; display: none;">Please select a party</span>
              </div>
          </div>
      



       

            <style>
              .datepicker {
                z-index: 1001 !important;
              }
            </style>

             
              
            
 
 <?php echo $__env->make('components.start_end_date', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>






        </div>
        <div class="card-footer bg-light  ">
          <button type="submit" class="btn-disable btn btn-success w-lg float-right" id="online">Submit</button>
          <button type="submit" class="btn-disable btn btn-success w-lg float-right" id="pdf">PDF</button>
          <a href="<?php echo e(URL('/')); ?>" class="btn-disable btn btn-secondary w-lg float-right">Cancel</a>
        </div>
      </div>
      </form>
      

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
        $('#form1').attr('action', '<?php echo e(URL("/PartyLedger1PDF")); ?>');
        $('#form1').attr('target', '_blank');
        $('#form1').submit();
    });


    $('#online').click(function(event){
        event.preventDefault();
        $('#form1').removeAttr('target');
        $('#form1').attr('action', '<?php echo e(URL("/PartyLedger1")); ?>');
        $('#form1').submit();
    });
});
</script>

<script>
  $(document).ready(function() {
      const $selectID = $('#partyID');
      const $buttons = $('.btn-disable');
      const $selectError = $('#selectError');
  
      $selectID.on('change', function() {
          if ($selectID.val() === "") {
              $buttons.prop('disabled', true);
              $selectError.show();
          } else {
              $buttons.prop('disabled', false);
              $selectError.hide();
          }
      });
  
      // Initialize state
      if ($selectID.val() === "") {
          $buttons.prop('disabled', true);
          $selectError.show();
      } else {
          $buttons.prop('disabled', false);
          $selectError.hide();
      }
  });
  </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\eits\al-molabi-staging\resources\views/reports/party_ledger.blade.php ENDPATH**/ ?>