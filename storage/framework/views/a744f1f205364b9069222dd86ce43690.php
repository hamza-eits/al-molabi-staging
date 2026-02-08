

  

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

             <?php 

$company=DB::table('company')->first();

 ?>
 

  <div class="card">
      <div class="card-body">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="2"><div align="center" class="style1"><?php echo e($company->Name); ?> </div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><strong>DAY BOOK - CASH &amp; SALE </strong></div></td>
    </tr>
    <tr>
      <td width="50%">From <?php echo e(request()->StartDate); ?> TO <?php echo e(request()->EndDate); ?></td>
    <td width="50%"><div align="right">DATED: <?php echo e(date('d-m-Y')); ?></div></td>
    
    </tr>
  </table>
  
  <table class="table table-bordered table-sm">
    <tr>
      <td valign="top"><table width="100%" border="1" cellspacing="0" cellpadding="3" style="border-collapse:collapse;">
    <tr>
      <td width="10%" bgcolor="#CCCCCC"><div align="center"><strong>DATE</strong></div></td>
      <td width="10%" bgcolor="#CCCCCC"><div align="center"><strong>VHNO</strong></div></td>
      <td width="15%" bgcolor="#CCCCCC"><div align="center"><strong>NAME</strong></div></td>
      <td width="15%" bgcolor="#CCCCCC"><div align="center"><strong>SECTOR</strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="center"><strong>TOTAL </strong></div></td>
      <td width="8%" bgcolor="#CCCCCC"><div align="center"><strong>AIRLINE</strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="center"><strong>PROFIT </strong></div></td>
       </tr>
   <?php $__currentLoopData = $invoice_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    
    <tr>
      <td><div align="center"><?php echo e(dateformatman($value->Date)); ?></div></td>
      <td><div align="center"><?php echo e($value->InvoiceTypeCode); ?>-<?php echo e($value->InvoiceMasterID); ?></div></td>
      <td><?php echo e($value->PaxName); ?></td>
      <td><?php echo e($value->Sector); ?></td>
      <td><div align="right"><?php echo e(number_format($value->Total,2)); ?></div></td>
      <td><div align="center"><?php echo e(number_format($value->Fare,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Service,2)); ?></div></td>
       </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
 
<?php for($i=count($invoice_detail); $i<$row; $i++): ?>
  <tr>
    <td>.</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>
<?php endfor; ?>
 <tr>
    <td><div align="center"><strong>TOTAL</strong></div></td>
    <td></td>
    <td></td>
    <td></td>
    <td><div align="right"><strong><?php echo e(number_format($invoice_detail_summary[0]->Total,2)); ?></strong></div></td>
    <td><div align="right"><strong><?php echo e(number_format($invoice_detail_summary[0]->Fare,2)); ?></strong></div></td>
    <td><div align="right"><strong><?php echo e(number_format($invoice_detail_summary[0]->Service,2)); ?></strong></div></td>
   </tr>
  </table></td>
      <td valign="top"><table width="100%" border="1" cellpadding="3" cellspacing="0"  style="border-collapse:collapse;">
    <tr>
      <td width="10%" bgcolor="#CCCCCC"><div align="center"><strong>VHNO</strong></div></td>
      <td width="15%" bgcolor="#CCCCCC"><div align="center"><strong>DESCRIPTION</strong></div></td>
   
        <td width="9%" bgcolor="#CCCCCC"><div align="center"><strong>RECEIPT </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="center"><strong>PAYMENT </strong></div></td>
    </tr>
   <?php $__currentLoopData = $journal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    
    <tr>
      <td><div align="center"><?php echo e($value->VHNO); ?></div></td>
      
      <td><?php echo e($value->Narration); ?></td>
      <td><div align="right"><?php echo e(number_format($value->Dr,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Cr,2)); ?></div></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php for($i=count($journal); $i<$row; $i++): ?>
  <tr>
    <td>.</td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
<?php endfor; ?>
  <tr>
    <td><div align="center"><strong>TOTAL</strong></div></td>
    <td></td>
    <td><div align="right"><strong><?php echo e(number_format($journal_summary[0]->Dr,2)); ?></strong></div></td>
    <td><div align="right"><strong><?php echo e(number_format($journal_summary[0]->Cr,2)); ?></strong></div></td>
  </table></td>
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
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/rotana_sky/resources/views/reports/daybook_report1.blade.php ENDPATH**/ ?>