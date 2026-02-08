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
      <td colspan="2"><div align="center" class="style1">  </div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><strong> SALE (-) SALES RETURN REGISTER </strong></div></td>
    </tr>
    <tr>
      <td width="50%">From <?php echo e(request()->StartDate); ?> TO <?php echo e(request()->EndDate); ?></td>
    <td width="50%"><div align="right">DATED: <?php echo e(date('d-m-Y')); ?></div></td>
    
    </tr>
  </table>
   
  
  <table class="table table-bordered table-sm">
  <thead class="bg-light">
   <tr>
     <th width="5%" bgcolor="#CCCCCC"><div align="center"><strong>DATE</strong></div></th>
      <th width="5%" bgcolor="#CCCCCC"><div align="center"><strong>V.NO</strong></div></th>
      <th width="5%" bgcolor="#CCCCCC"><div align="center"><strong>PAX NAME</strong></div></th>
      <th width="10%" bgcolor="#CCCCCC"><div align="center"><strong>PARTY</strong></div></th>
      <th width="10%" bgcolor="#CCCCCC"><div align="right"><strong>A/LINE </strong></div></th>
       <th width="9%" bgcolor="#CCCCCC"><div align="right"><strong>PNR </strong></div></th>
      <th width="9%" bgcolor="#CCCCCC"><div align="right"><strong>SECTOR </strong></div></th>
      <th width="9%" bgcolor="#CCCCCC"><div align="right"><strong>TICKET / </strong></div></th>
      <th width="9%" bgcolor="#CCCCCC"><div align="right"><strong>FARE/RATE </strong></div></th>
      <th width="9%" bgcolor="#CCCCCC"><div align="right"><strong>TAXES </strong></div></th>
      <th width="9%" bgcolor="#CCCCCC"><div align="right"><strong>INCOME </strong></div></th>
      <th width="9%" bgcolor="#CCCCCC"><div align="right"><strong>AIRLINE </strong></div></th>
      <th width="9%" bgcolor="#CCCCCC"><div align="right"><strong>DISC </strong></div></th>
      <th width="9%" bgcolor="#CCCCCC"><div align="right"><strong>NET </strong></div></th>
      <th width="9%" bgcolor="#CCCCCC"><div align="right"><strong>PROFIT </strong></div></th>
   </tr>
  </thead>
  <tbody>
   <?php $__currentLoopData = $invoice_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    
   <tbody>
      <tr>
      <td><div align="center"><?php echo e(dateformatman($value->Date)); ?></div></td>
      <td><div align="center"><?php echo e($value->InvoiceTypeCode); ?>-<?php echo e($value->InvoiceMasterID); ?></div></td>
      <td><?php echo e($value->PaxName); ?></td>
      <td><?php echo e($value->PaxName); ?></td>
      <td><?php echo e($value->SupplierName); ?></td>
      <td><?php echo e($value->PNR); ?></td>
      <td><?php echo e($value->Sector); ?></td>
      <td><?php echo e($value->RefNo); ?></td>
      <td><div align="center"><?php echo e(number_format($value->Fare,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Taxable,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format(abs($value->Service),2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Fare,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Discount,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Total,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format(($value->Service),2)); ?></div></td>
    </tr>
   </tbody>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr class="bg-light">
     <td width="5%" bgcolor="#CCCCCC"><div align="center"><strong></strong></div></td>
      <td width="5%" bgcolor="#CCCCCC"><div align="center"><strong></strong></div></td>
      <td width="5%" bgcolor="#CCCCCC"><div align="center"><strong></strong></div></td>
      <td width="10%" bgcolor="#CCCCCC"><div align="center"><strong></strong></div></td>
      <td width="10%" bgcolor="#CCCCCC"><div align="right"><strong></strong></div></td>
       <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong></strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong> </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong>TOTAL  </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong><?php echo e(number_format($invoice_summary[0]->Fare,2)); ?> </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong><?php echo e(number_format($invoice_summary[0]->Taxable,2)); ?> </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong><?php echo e(number_format($invoice_summary[0]->Service,2)); ?> </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong><?php echo e(number_format($invoice_summary[0]->Fare,2)); ?> </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong><?php echo e(number_format($invoice_summary[0]->Discount,2)); ?> </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong><?php echo e(number_format($invoice_summary[0]->Total,2)); ?> </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong><?php echo e(number_format($invoice_summary[0]->Service,2)); ?> </strong></div></td>
       
      
      
   </tr>

    

   
  </tbody>
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
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/al-molabi/resources/views/reports/ticket_register1.blade.php ENDPATH**/ ?>