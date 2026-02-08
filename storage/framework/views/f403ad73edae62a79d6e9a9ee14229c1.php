

<?php $__env->startSection('title', $pagetitle); ?>
 

<?php $__env->startSection('content'); ?>

 
 
 
  
 <?php if(session('error')): ?>

 <div class="alert alert-<?php echo e(Session::get('class')); ?> p-1" id="success-alert">
                    
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
<div class="main-content">

 <div class="page-content">
 <div class="container-fluid">




    <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Trial Balance</h4>
                                          
                                  From <?php echo e(request()->StartDate); ?> TO <?php echo e(request()->EndDate); ?>


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

            
            <?php 
            $DrTotal=0;
            $CrTotal=0;
             ?>
  <div class="card">
      <div class="card-body">
           <?php if(count($trial)>0): ?>    
          <table width="100%" class="table table-sm table-bordered  table-striped align-middle table-nowrap mb-0">
          <tbody>
		  <tr>
          <th width="25%" class="col-md-2 text-center">HEAD</th>
          <th width="50%" class="col-md-5 text-center" >DESCRIPTION</th>
          <th width="23%" class="col-md-2 text-center">DEBIT</th>
          <th width="21%" class="col-md-2 text-center">CREDIT</th>
           </tr>
          </tbody>
          <tbody>
            
          <?php $__currentLoopData = $trial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <?php 

          if(!isset($DrTotal)) { 

             
             $DrTotal = $value->Debit;
             $CrTotal = $value->Credit;
             


}
else
{
   $DrTotal = $DrTotal+$value->Debit;
    $CrTotal = $CrTotal+$value->Credit;
 }


 ?>
           <tr>
           
           <td class="text-center"><?php echo e($value->ChartOfAccountID); ?></td>
           <td class="text-center"><div align="left"><?php echo e($value->ChartOfAccountName); ?></div></td>
           <td class="text-center"><div align="right"><?php echo e(number_format($value->Debit,2)); ?></div></td>
           <td class="text-center"><div align="right"><?php echo e(number_format(abs($value->Credit),2)); ?></div></td>
           </tr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
          <tr  class="table-active">
              
           <td></td>
            <td>TOTAL</td>
            <td class="text-end fw-bolder"><div align="right"><?php echo e(number_format($DrTotal,2)); ?></div></td>
           <td class="text-end fw-bolder"><div align="right"><?php echo e(number_format(abs($CrTotal),2)); ?></div></td>
           </tr>
           </tbody>
           </table>
           <?php else: ?>
             <p class=" text-danger">No data found</p>
           <?php endif; ?>   
      </div>
  </div>
  
  </div>
</div>

        </div>
      </div>
    </div>
    <!-- END: Content-->
<!-- BEGIN: Vendor JS-->
    <script src="<?php echo e(asset('assets/vendors/js/vendors.min.js')); ?>"></script>
    <!-- BEGIN Vendor JS-->
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/al-molabi/resources/views/reports/trial_balance1.blade.php ENDPATH**/ ?>