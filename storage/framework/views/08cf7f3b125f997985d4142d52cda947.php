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

<?php 

$company = DB::table('company')->first();

 ?>
    </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
	
<div align="center">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="2"><div align="center" class="style1"><?php echo e($company->Name); ?> </div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><strong> SALE (-) SALES RETURN REGISTER </strong></div></td>
    </tr>
    <tr>
      <td width="50%">From <?php echo e(request()->StartDate); ?> TO <?php echo e(request()->EndDate); ?></td>
	  <td width="50%"><div align="right">DATED: <?php echo e(date('d-m-Y')); ?></div></td>
    
    </tr>
  </table>
   
  
  <table width="100%" border="1" style="border-collapse: collapse;">
  <thead style="display: table-header-group;">
   <tr>
     <th width="5%" bgcolor="#CCCCCC"><div align="center"><strong>DATE</strong></div></th>
      <th width="5%" bgcolor="#CCCCCC"><div align="center"><strong>V.NO</strong></div></th>
      <th width="5%" bgcolor="#CCCCCC"><div align="left"><strong>PAX NAME</strong></div></th>
      <th width="10%" bgcolor="#CCCCCC"><div align="left"><strong>PARTY</strong></div></th>
      <th width="10%" bgcolor="#CCCCCC"><div align="left"><strong>A/LINE </strong></div></th>
       <th width="9%" bgcolor="#CCCCCC"><div align="left"><strong>PNR </strong></div></th>
      <th width="9%" bgcolor="#CCCCCC"><div align="left"><strong>SECTOR </strong></div></th>
      <th width="9%" bgcolor="#CCCCCC"><div align="left"><strong>TICKET </strong></div></th>
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
      <td><div align="left"><?php echo e($value->PaxName); ?></div></td>
      <td><div align="left"><?php echo e($value->PaxName); ?></div></td>
      <td><div align="left"><?php echo e($value->SupplierName); ?></div></td>
      <td><div align="left"><?php echo e($value->PNR); ?></div></td>
      <td><div align="left"><?php echo e($value->Sector); ?></div></td>
      <td><div align="left"><?php echo e($value->RefNo); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Fare,0)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Taxable,0)); ?></div></td>
      <td><div align="right"><?php echo e(number_format(abs($value->Service),0)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Fare,0)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Discount,0)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Total,0)); ?></div></td>
      <td><div align="right"><?php echo e(number_format(($value->Service),0)); ?></div></td>
    </tr>
   </tbody>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr>
     <td width="5%" bgcolor="#CCCCCC"><div align="center"><strong></strong></div></td>
      <td width="5%" bgcolor="#CCCCCC"><div align="center"><strong></strong></div></td>
      <td width="5%" bgcolor="#CCCCCC"><div align="center"><strong></strong></div></td>
      <td width="10%" bgcolor="#CCCCCC"><div align="center"><strong></strong></div></td>
      <td width="10%" bgcolor="#CCCCCC"><div align="right"><strong></strong></div></td>
       <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong></strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong> </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong>TOTAL  </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong><?php echo e(number_format($invoice_summary[0]->Fare,0)); ?> </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong><?php echo e(number_format($invoice_summary[0]->Taxable,0)); ?> </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong><?php echo e(number_format($invoice_summary[0]->Service,0)); ?> </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong><?php echo e(number_format($invoice_summary[0]->Fare,0)); ?> </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong><?php echo e(number_format($invoice_summary[0]->Discount,0)); ?> </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong><?php echo e(number_format($invoice_summary[0]->Total,0)); ?> </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong><?php echo e(number_format($invoice_summary[0]->Service,0)); ?> </strong></div></td>
   </tr>

    

   
  </tbody>
</table>
</div>
</body>
</html><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/rotana_sky/resources/views/reports/ticket_register1pdf.blade.php ENDPATH**/ ?>