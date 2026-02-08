

<?php $__env->startSection('title', $pagetitle); ?>
 

<?php $__env->startSection('content'); ?>



<div class="main-content">

 <div class="page-content">
 <div class="container-fluid">
  <!-- start page title -->
                        
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
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="2"><div align="center" class="style1"> </div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><strong>AIRLINE SUMMARY  SALE (-) SALES RETURN </strong></div></td>
    </tr>
    <tr>
      <td width="50%">From <?php echo e(request()->StartDate); ?> TO <?php echo e(request()->EndDate); ?></td>
    <td width="50%"><div align="right">DATED: <?php echo e(date('d-m-Y')); ?></div></td>
    
    </tr>
  </table>
  <table class="table table-bordered table-sm">
    <tr class="bg-light">
      <td width="5%" bgcolor="#CCCCCC"><div align="center"><strong>S.NO</strong></div></td>
      <td width="10%" bgcolor="#CCCCCC"><div align="center"><strong>TYPE</strong></div></td>
      <td width="30%" bgcolor="#CCCCCC"><div align="center"><strong>SUPPLIER</strong></div></td>
      <td width="8%" bgcolor="#CCCCCC"><div align="center"><strong>FARE</strong></div></td>
      <td width="8%" bgcolor="#CCCCCC"><div align="right"><strong> TAX</strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong>SERVICE </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong>IPVAT </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong>OPVAT </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong>TOTAL </strong></div></td>
    </tr>
   <?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    
    <tr>
      <td><div align="center"><?php echo e($key+1); ?>.</div></td>
      <td><?php echo e($value->InvoiceTypeCode); ?></td>
      <td><?php echo e($value->SupplierName); ?></td>
      <td><div align="center"><?php echo e(number_format($value->Fare,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Taxable,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Service,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->IPVAT,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->OPVAT,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Total,2)); ?></div></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </table>        
      </div>
  </div>
  
  </div>
</div>

        </div>
      </div>
    </div>
    <!-- END: Content-->
 
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/al-molabi/resources/views/reports/supplierwise_sale1.blade.php ENDPATH**/ ?>