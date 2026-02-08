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
    <?php if($invoice->isNotEmpty()): ?>
  <div class="card">
      <div class="card-body">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="2"><div align="center" class="style1"> </div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><strong>OUTSTANDING NORMAL INVOICES </strong></div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"></div></td>
    </tr>
    <tr>
      <td width="50%">DATED: <?php echo e(date('d-m-Y')); ?></td>
      <td width="50%"><div align="right">From <?php echo e(request()->StartDate); ?> TO <?php echo e(request()->EndDate); ?></div></td>
    </tr>
  </table>
    <table class="table table-striped table-sm">
    <tr>
      <td width="8%" bgcolor="#CCCCCC"><div align="center"><strong>INV#</strong></div></td>
      <td width="8%" bgcolor="#CCCCCC"><div align="center"><strong>REF#</strong></div></td>
      <td width="8%" bgcolor="#CCCCCC"><div align="center"><strong>VHNO</strong></div></td>
      <td width="12%" bgcolor="#CCCCCC"><div align="center"><strong>INV DATE </strong></div></td>
      <td width="12%" bgcolor="#CCCCCC"><div align="center"><strong>DUE DATE </strong></div></td>
      <td width="32%" bgcolor="#CCCCCC"><div align="left"><strong>PARTY NAME </strong></div></td>
      <td width="5%" bgcolor="#CCCCCC"><div align="center"><strong>BALANCE</strong></div></td>
    </tr>
    <?php $Total=0; ?>
   <?php $__currentLoopData = $invoice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <?php
        $Total = $Total + $value->Balance
    ?>

    
    <tr>
       <td><div align="center"><?php echo e($value->InvoiceMasterID); ?></div></td>
       <td><div align="center"><?php echo e($value->InvoiceMasterID); ?></div></td>
      <td><div align="center"><?php echo e($value->InvoiceCode); ?></div></td>
      <td><div align="center"><?php echo e($value->Date); ?></div></td>
      
      <td><div align="center"><?php echo e($value->DueDate); ?></div></td>
      <td><?php echo e($value->PartyName); ?></td>
      <td><div align="right"><?php echo e(number_format($value->Balance,2)); ?></div></td>
    </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="center"><strong>TOTAL</strong></div></td>
      <td><div align="right"><?php echo e(number_format($Total,2)); ?></div></td>
    </tr>

  </table> 
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
      <td colspan="2"><div align="center"><strong>OUTSTANDING UMRAH INVOICES </strong></div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"></div></td>
    </tr>
    <tr>
      <td width="50%">DATED: <?php echo e(date('d-m-Y')); ?></td>
      <td width="50%"><div align="right">From <?php echo e(request()->StartDate); ?> TO <?php echo e(request()->EndDate); ?></div></td>
    </tr>
  </table>
<?php if($invoice_umrah->isNotEmpty()): ?>
    <table class="table table-striped table-sm">
    <tr>
      <td width="8%" bgcolor="#CCCCCC"><div align="center"><strong>INV#</strong></div></td>
      <td width="8%" bgcolor="#CCCCCC"><div align="center"><strong>REF#</strong></div></td>
      <td width="12%" bgcolor="#CCCCCC"><div align="center"><strong>INV DATE </strong></div></td>
       <td width="24%" bgcolor="#CCCCCC"><div align="center"><strong>Package </strong></div></td>
      <td width="55%" bgcolor="#CCCCCC"><div align="left"><strong>PARTY NAME </strong></div></td>
      <td width="10%" bgcolor="#CCCCCC"><div align="center"><strong>BALANCE</strong></div></td>
    </tr>
    <?php $Total=0; ?>
   <?php $__currentLoopData = $invoice_umrah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <?php
        $Total = $Total + $value->Balance
    ?>

    
    <tr>
       <td><div align="center"><?php echo e($value->InvoiceMasterID); ?></div></td>
       <td><div align="center"><?php echo e($value->InvoiceMasterID); ?></div></td>
       <td><div align="center"><?php echo e($value->Date); ?></div></td>
       
      <td><div align="center"><?php echo e($value->name); ?></div></td>
      <td><?php echo e($value->PartyName); ?></td>
      <td><div align="right"><?php echo e(number_format($value->Balance,2)); ?></div></td>
    </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
       <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="center"><strong>TOTAL</strong></div></td>
      <td><div align="right"><?php echo e(number_format($Total,2)); ?></div></td>
    </tr>

  </table> 
<?php endif; ?>     
      </div>
  </div>
  
  </div>
</div>

        </div>
      </div>
    </div>
    <!-- END: Content-->
 
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/al-molabi/resources/views/reports/outstanding_invoice1.blade.php ENDPATH**/ ?>