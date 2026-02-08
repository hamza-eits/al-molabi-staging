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
      <td width="10%" bgcolor="#CCCCCC"><div align="center"><strong>DATE</strong></div></td>
      <td width="10%" bgcolor="#CCCCCC"><div align="center"><strong>VHNO</strong></div></td>
      <td width="15%" bgcolor="#CCCCCC"><div align="center"><strong>NAME</strong></div></td>
      <td width="15%" bgcolor="#CCCCCC"><div align="center"><strong>SECTOR</strong></div></td>
      <td width="8%" bgcolor="#CCCCCC"><div align="center"><strong>FARE/RATE</strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="center"><strong>TAX </strong></div></td>
       <td width="9%" bgcolor="#CCCCCC"><div align="center"><strong>INCOME </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="center"><strong>DISCOUNT </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="center"><strong>NET </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="center"><strong>PROFIT </strong></div></td>
    </tr>

    <?php 

    $Fare=0;
    $Taxable=0;
    $Service=0;
    $Discount=0;
    $Total=0;
    


     ?>
   <?php $__currentLoopData = $invoice_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
<?php 

    $Fare= $Fare  +  $value->Fare;
    $Taxable= $Taxable + $value->Taxable;
    $Service= $Service + $value->Service;
    $Discount = $Discount + $value->Discount;
    $Total= $Total + $value->Total;



 ?>

    
    <tr>
      <td><div align="center"><?php echo e(dateformatman($value->Date)); ?></div></td>
      <td><div align="center"><?php echo e($value->InvoiceTypeCode); ?>-<?php echo e($value->InvoiceMasterID); ?></div></td>
      <td><?php echo e($value->PaxName); ?></td>
      <td><?php echo e($value->Sector); ?></td>
      <td><div align="center"><?php echo e(number_format($value->Fare,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Taxable,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Service,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Discount,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Total,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Service,2)); ?></div></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <tr style="font-weight: bolder;">
      <td colspan="4"> <div align="center">TOTAL</div></td>
    
      <td><div align="center"><?php echo e(number_format($Fare,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($Taxable,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($Service,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($Discount,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($Total,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($Service,2)); ?></div></td>
    </tr>



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
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/rotana_sky/resources/views/reports/saleman_report1.blade.php ENDPATH**/ ?>