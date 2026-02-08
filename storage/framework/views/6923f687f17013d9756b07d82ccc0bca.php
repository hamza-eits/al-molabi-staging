

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
         <?php $__currentLoopData = $voucher_master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div align="center">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    
   
   
    <tr>
      <td colspan="2"><div align="center" class="style2"><u><strong><?php echo e($voucher_type[0]->VoucherTypeName); ?></strong></u></div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="left"><span class="style2">Voucher # <?php echo e($value->Voucher); ?></span></div></td>
    </tr>
    <tr>
      <td width="50%" height="18" valign="top">From <?php echo e(request()->StartDate); ?> TO <?php echo e(request()->EndDate); ?></td>
    <td width="50%" valign="top"><div align="right">DATED: <?php echo e($value->Date); ?></div></td>
    </tr>
  </table>
 
  <table class="table table-bordered table-sm">
    <tr class="bg-light">
      <td><strong>CHOFACC</strong></td>
      <td><strong>DESCRIPTION</strong></td>
      <td><strong>CHQ/REF # </strong></td>
      <td><strong>PARTY</strong></td>
      <td><strong>SUPPLIER</strong></td>
      <td><div align="right"><strong>DEBIT</strong></div></td>
      <td><div align="right"><strong>CREDIT</strong></div></td>
    </tr>
  
<?php 

$voucher = DB::table('v_voucher_detail')
              ->where('VoucherMstID',$value->VoucherMstID)

            ->get();


            $DebitTotal=0;
            $CreditTotal=0;

?>


    <?php $__currentLoopData = $voucher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     

<?php if(!isset($DebitTotal))
{
  $DebitTotal = $value1->Debit;
  $CrebitTotal = $value1->Crebit;
}
else
{
$DebitTotal = $DebitTotal+ $value1->Debit;
$CreditTotal = $CreditTotal+ $value1->Credit;
}

 
 ?>
      <tr>
      <td><?php echo e($value1->ChartOfAccountName); ?></td>
      <td><?php echo e($value1->Narration); ?></td>
      <td><?php echo e($value1->RefNo); ?></td>
      <td><?php echo e($value1->PartyName); ?></td>
      <td><?php echo e($value1->SupplierName); ?></td>
      
      <td><div align="right"><?php echo e(is_null($value1->Debit) ? '' : number_format($value1->Debit,2)); ?></div></td>
      <td><div align="right"><?php echo e(is_null($value1->Credit) ? '' : number_format($value1->Credit,2)); ?></div></td>
      </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><?php echo e(env('APP_CURRENCY')); ?> </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="right"><?php echo e(number_format($DebitTotal,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($CreditTotal,2)); ?></div></td>
    </tr>
  </table>
  <p><br>
  </p>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="33%">PAID / CHECK BY </td>
      <td width="33%"><div align="center">AUTHORIZED BY </div></td>
      <td width="33%"><div align="right">RECEIVED BY </div></td>
    </tr>
    <tr>
      <td width="33%">(Operator : Administrator </td>
      <td width="33%">&nbsp;</td>
      <td width="33%">&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p style="page-break-after: always;">&nbsp;</p>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
      </div>
  </div>
  
  </div>
</div>

        </div>
      </div>
    </div>
    <!-- END: Content-->
 
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/rotana_sky/resources/views/reports/voucher_report1.blade.php ENDPATH**/ ?>