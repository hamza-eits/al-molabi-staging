<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Party List</title>
    <style type="text/css">
<!--
.style1 {font-size: 20px}
body,td,th {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
}
-->
    </style>

            <?php 

$company = DB::table('company')->first();

     ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
 

<div align="center">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="2"><div align="center" class="style1">
        <div align="center"><?php echo e($company->Name); ?> </div>
      </div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><strong>PARTYWISE BALANCE </strong></div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><?php echo e((request()->ReportType=='C') ? 'Creditor Customers' : 'Debitor Customers'); ?></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="50%">From <?php echo e(request()->StartDate); ?> TO <?php echo e(request()->EndDate); ?></td>
      <td width="50%"><div align="right">DATED: <?php echo e(date('d-m-Y')); ?></div></td>
    </tr>
  </table>
</div>
<?php 
            $DrTotal=0;
            $CrTotal=0;
            $BalanceTotal=0;
             ?>


<table width="100%" border="1" cellspacing="0" cellpadding="3" style="border-collapse:collapse;">
    <tr>
      <td width="6%" bgcolor="#CCCCCC"><div align="center"><strong>S.NO</strong></div></td>
      <td width="10%" bgcolor="#CCCCCC"><div align="center"><strong>Party</strong></div></td>
      <td width="52%" bgcolor="#CCCCCC"><div align="center"><strong>NAME</strong></div></td>
      <td width="16%" bgcolor="#CCCCCC"><div align="center"><strong>DEBIT</strong></div></td>
      <td width="16%" bgcolor="#CCCCCC"><div align="center"><strong> CREDIT </strong></div></td>
      <td width="16%" bgcolor="#CCCCCC"><div align="right"><strong>BALANCE</strong></div></td>
      
    </tr>
   <?php $__currentLoopData = $party; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   	    
   <?php 

            $DrTotal=$DrTotal+ $value->Dr;
            $CrTotal=$CrTotal + $value->Cr;
            $BalanceTotal= $BalanceTotal + ($value->Dr-$value->Cr);


    ?>
    
    <tr>
      <td><div align="center"><?php echo e($key+1); ?>.</div></td>
      <td><div align="center"><?php echo e($value->PartyID); ?></div></td>
      <td><div align="left"><?php echo e($value->PartyName); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Dr,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Cr,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Dr-$value->Cr,2)); ?></div></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <tr>
      <td><div align="center"></div></td>
      <td><div align="left"></div></td>
      <td><div align="center"><strong>Total</strong></div></td>
      
      <td><div align="right"><?php echo e(number_format($DrTotal,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($CrTotal,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($BalanceTotal,2)); ?></div></td>
    </tr>
</table>
  <p>&nbsp;</p>
</body>
</html><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/al-molabi/resources/views/reports/party_balance1PDF.blade.php ENDPATH**/ ?>