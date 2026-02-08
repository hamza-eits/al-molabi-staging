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
      <td colspan="2"><div align="center"><strong>TAX REPORT  SALE (-) SALES RETURN </strong></div></td>
    </tr>
    <tr>
      <td width="50%">From <?php echo e(request()->StartDate); ?> TO <?php echo e(request()->EndDate); ?></td>
    <td width="50%"><div align="right">DATED: <?php echo e(date('d-m-Y')); ?></div></td>
    
    </tr>
  </table>

<?php 

$Total=0;
$IPVAT=0;
$Service=0;
$Taxable=0;

 ?>

  <table class="table table-bordered table-sm">
    <tr class="bg-light">
      <td width="10%" bgcolor="#CCCCCC"><div align="center"><strong>DATE</strong></div></td>
      <td width="10%" bgcolor="#CCCCCC"><div align="center"><strong>TYPE</strong></div></td>
      <td width="30%" bgcolor="#CCCCCC"><div align="center"><strong>ACTIVITY</strong></div></td>
      <td width="8%" bgcolor="#CCCCCC"><div align="center"><strong>PAX</strong></div></td>
      <td width="8%" bgcolor="#CCCCCC"><div align="center"><strong>Gross & Tax</strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong>IPVAT </strong></div></td>
       <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong>SERVICE </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong>OPVAT </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong>NET VAT </strong></div></td>
    </tr>
   <?php $__currentLoopData = $invoice_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
<?php 

$Total=$Total+$value->Total;
$IPVAT=$IPVAT+$value->IPVAT;
$Service=$Service+$value->Service;
$Taxable=$Taxable+$value->Taxable;

 ?>

    
    <tr>
      <td><div align="center"><?php echo e(dateformatman($value->Date)); ?></div></td>
      <td><div align="center"><a href="<?php echo e(URL('/UmrahEdit/'.$value->InvoiceMasterID)); ?>" target="_blank"><?php echo e($value->InvoiceTypeCode); ?>-<?php echo e($value->InvoiceMasterID); ?></a></div></td>
      <td><?php echo e($value->ItemName); ?></td>
      <td><?php echo e($value->PaxName); ?></td>
      <td><div align="center"><?php echo e(number_format($value->Total,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->IPVAT,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Service,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Taxable,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Taxable,2)); ?></div></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


 <tr >
      
      
      
      <td colspan="4" class="text-end"><strong>TOTAL</strong></td>
      <td><div align="center"><strong><?php echo e(number_format($Total,2)); ?></strong></div></td>
      <td><div align="right"><strong><?php echo e(number_format($IPVAT,2)); ?></strong></div></td>
      <td><div align="right"><strong><?php echo e(number_format($Service,2)); ?></strong></div></td>
      <td><div align="right"><strong><?php echo e(number_format($Taxable,2)); ?></strong></div></td>
      <td><div align="right"><strong><?php echo e(number_format($Taxable,2)); ?></strong></div></td>
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
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/rotana_sky/resources/views/reports/tax_report1.blade.php ENDPATH**/ ?>