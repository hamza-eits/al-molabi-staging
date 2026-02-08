

<?php $__env->startSection('title', $pagetitle); ?>


<?php $__env->startSection('content'); ?>



<div class="main-content">

  <div class="page-content">
    <div class="container-fluid">

      <div class="card shadow-sm">
        <div class="card-body">
          <!-- enctype="multipart/form-data" -->
          <form action="<?php echo e(URL('/TicketRegister1')); ?>" method="post" name="form1" id="form1"> <?php echo e(csrf_field()); ?>




            <div class="col-md-4">
              <label for="basicpill-firstname-input">Invoice Type</label>
              <div class="mb-1">
                <select name="InvoiceTypeID" id="" class="  form-select" id="select2-basic">
                  <?php foreach ($invoice_type as $key => $value): ?>
                  <option value="<?php echo e($value->InvoiceTypeID); ?>"><?php echo e($value->InvoiceType); ?></option>
                  <?php endforeach ?>
                  <option value="-1" selected="">Both</option>

                </select>
              </div>
            </div>





            <div class="col-md-4">
              <div class="mb-1">
                <label for="basicpill-firstname-input">Supplier</label>
                <select name="SupplierID" id="" class="select2 form-select" id="select2-basic">
                  <option value="0">All</option>
                  <?php foreach ($supplier as $key => $value): ?>
                  <option value="<?php echo e($value->PartyID); ?>"><?php echo e($value->PartyName); ?></option>

                  <?php endforeach ?>
                </select>
              </div>
            </div>


            <div class="col-md-4">
              <div class="mb-1">
                <label for="basicpill-firstname-input">Select Activity</label>
                <select name="ItemID" id="" class="select2 form-select" id="select2-basic">
                  <option value="0">All</option>
                  <?php foreach ($item as $key => $value): ?>
                  <option value="<?php echo e($value->ItemID); ?>"><?php echo e($value->ItemCode); ?>-<?php echo e($value->ItemName); ?></option>

                  <?php endforeach ?>
                </select>
              </div>
            </div>



            <div class="col-md-4">
              <div class="mb-0">
                <label for="basicpill-firstname-input">Saleman</label>
                <select name="UserID" id="" class="select2 form-select" id="select2-basic">
                  <option value="0">All</option>
                  <?php foreach ($saleman as $key => $value): ?>
                  <option value="<?php echo e($value->UserID); ?>"><?php echo e($value->FullName); ?></option>

                  <?php endforeach ?>
                </select>
              </div>
            </div>


 <?php echo $__env->make('components.start_end_date', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>






        </div>
        <div class="card-footer bg-light">
          <button type="submit" class="btn btn-success w-lg float-right" id="online">Submit</button>
          <button type="submit" class="btn btn-success w-lg float-right" id="pdf">PDF</button>
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
        $('#form1').attr('action', '<?php echo e(URL("/TicketRegister1PDF")); ?>');
        $('#form1').submit();
    });
    $('#online').click(function(event){
        event.preventDefault();
        $('#form1').removeAttr('target');
        $('#form1').attr('action', '<?php echo e(URL("/TicketRegister1")); ?>');
        $('#form1').submit();
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/rotana_sky/resources/views/reports/ticket_register.blade.php ENDPATH**/ ?>