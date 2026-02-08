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
      <td colspan="2"><div align="center" class="style1"><?php echo e($company->Name); ?> </div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><strong>PARTYWISE SALE (-) SALES RETURN </strong></div></td>
    </tr>
    <tr>
      <td width="50%">DATED: <?php echo e(date('d-m-Y')); ?></td>
      <td width="50%">&nbsp;</td>
    </tr>
  </table>
  <table width="100%" border="1" cellspacing="0" cellpadding="3" style="border-collapse:collapse;">
    <thead style="display: table-header-group;">
    <tr>
      <td width="5%" bgcolor="#CCCCCC"><div align="center"><strong>S.NO</strong></div></td>
      <td width="10%" bgcolor="#CCCCCC"><div align="center"><strong>TYPE</strong></div></td>
      <td width="30%" bgcolor="#CCCCCC"><div align="center"><strong>NAME</strong></div></td>
      <td width="8%" bgcolor="#CCCCCC"><div align="center"><strong>QTY</strong></div></td>
      <td width="8%" bgcolor="#CCCCCC"><div align="right"><strong> COST</strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong>SALE </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong>PROFIT </strong></div></td>
    </tr>
  </thead>
   <?php $__currentLoopData = $party_wise; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   	
    
    <tr>
      <td><div align="center"><?php echo e($key+1); ?>.</div></td>
      <td><?php echo e($value->InvoiceType); ?></td>
      <td><?php echo e($value->PartyName); ?></td>
      <td><div align="center"><?php echo e(number_format($value->Qty,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Fare,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Total,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Service,2)); ?></div></td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </table>
  <p>&nbsp;</p>
</div>
</body>
</html><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/al-molabi/resources/views/reports/partywise_sale1PDF.blade.php ENDPATH**/ ?>