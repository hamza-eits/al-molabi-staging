<?php $__env->startSection('title', $pagetitle); ?>

<?php $__env->startSection('content'); ?>

<div class="main-content">
  <div class="page-content">
    <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">All Estimates</h4>
            <div class="page-title-right ">
              
              <div class="btn-group  shadow-sm dropstart">
                 <a href="<?php echo e(URL('/EstimateCreate')); ?>" class="btn btn-primary"> + New </a>
                
              </div>
            </div>
            
            
            
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          
          <?php if(session('error')): ?>
          <div class="alert alert-<?php echo e(Session::get('class')); ?> p-1" id="success-alert">
            
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
              <table id="student_table" class="table table-striped table-sm " style="width:100%">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Estimate#</th>
                    <th>Reference</th>
                    <th>CUSTOMER NAME</th>
                    <th>Amount</th>
                     
                    <th>Action</th>
                  </tr>
                </thead>
              </table>
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
$('#student_table').DataTable({
"processing": true,
"serverSide": true,
"ajax": "<?php echo e(url('ajax_estimate')); ?>",
"columns":[
{ "data": "EstimateDate" },
{ "data": "EstimateNo" },
{ "data": "ReferenceNo" },
{ "data": "PartyName" },

{ "data": "GrandTotal" },


{ "data": "action" },
],
"order": [[0, 'desc']],
});
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/rotana_sky/resources/views/estimate/estimate.blade.php ENDPATH**/ ?>