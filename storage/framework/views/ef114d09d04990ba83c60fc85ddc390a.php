<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>INVOICE</title>
<style type="text/css">

    @page {
                margin-top: 0.5cm;
                margin-bottom: 0.5cm;
                margin-left: 0.4cm;
                margin-right: 0.4cm;
            }


        body {
             
            background: #fff;
            color: #000;
            font-family: 'Open Sans', 'Arial', 'Helvetica', sans-serif, 'Tahoma', 'Amiri', sans-serif;
            /* Arabic font */
            font-size: 10pt;
            line-height: 100%;
        }
        .paid-invoice-img {
        position: absolute;
        top: 0;
        right: 0;
        margin-bottom: 20px; /* Adjust the value as needed */
        z-index: 9999;
        float: right;
    }

.style3 {color: #FFFFFF}

</style>
</head>
<?php 
$company = DB::table('company')->first(); 


?>

<div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); opacity: 0.1; ">
  <img src="<?php echo e(asset('documents/'.$company->BackgroundLogo)); ?>" alt="Background Logo" style="max-width: 100%; height: auto;">
</div>



<body onload="window.print();">
<?php if($balance>0): ?>
  <img align="right" src="<?php echo e(asset('assets/images/unpaid-invoice.png')); ?>" alt="" class="paid-invoice-img">
  <?php else: ?>
  <img align="right" src="<?php echo e(asset('assets/images/paid-invoice.png')); ?>" alt="" class="paid-invoice-img">
  <?php endif; ?>
  <table width="100%" border="0" style="margin-top: 0px;">
    <tr>
      <th width="50%" scope="col" align="left" style="vertical-align: top;">
       <img src="<?php echo e(asset('documents/'.$company->Logo)); ?>" alt="">
      </th>
       
      <th width="50%" scope="col">&nbsp;</th>
    </tr>
    <tr>
      <td width="50%" style="line-height: 12pt">
          <?php echo e($company->Address); ?><br />
        <?php echo e($company->Contact); ?> <br>
        <?php echo e($company->Mobile); ?> <br />
        <?php echo e($company->Email); ?>

      </td>
      <td>
         
      </td>

    </tr>
    <tr>
      <td></td>
      <td width="50%" align="right" style="font-size: 28pt; font-weight: bolder;">
        <br><br>
          TAX INVOICE 
         
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <div align="right" style="margin-top: 15px;"><strong>Balance Due<br />
        <?php echo e(env('APP_CURRENCY')); ?><?php echo e(number_format($invoice_mst[0]->Balance, 2)); ?></strong></div><br>
      </td>
    </tr>
  </table>
  
<table width="100%" border="0">
  <tr>
    <th width="50%" valign="bottom" scope="col"><div align="left">Bill To<br />
      <?php echo e($invoice_mst[0]->PartyName); ?> <br /> <?php echo e($invoice_mst[0]->Phone); ?> <br>
    TRN <?php echo e($invoice_mst[0]->TRN); ?> </div></th>
    <th width="50%" scope="col"><div align="right">
      <table width="75%" border="0" align="right">
        <tr >
          <th align="right" style="text-align:right;"  >Tax Invoice No :</th>
          <td align="right" style="text-align:right;"  ><?php echo e($invoice_mst[0]->InvoiceCode); ?></td>
        </tr>
         <tr >
          <th align="right" style="text-align:right;"  >Invoice Date :</th>
          <td align="right" style="text-align:right;"  ><?php echo e($invoice_mst[0]->Date); ?></td>
        </tr>
        <tr>
          <td align="right" style="text-align:right;"  >Terms :</td>
          <td align="right" style="text-align:right;"  >Due on Receipt</td>
        </tr>
        <tr>
          <td align="right" style="text-align:right;"  >Due Date :</td>
          <td align="right" style="text-align:right;"  ><?php echo e($invoice_mst[0]->DueDate); ?></td>
        </tr>
      
        <tr>
          <td align="right" style="text-align:right;"  >VAT No. :</td>
          <td align="right" style="text-align:right;"  ><?php echo e($company->TRN); ?></td>
        </tr>
      </table>
    </div></th>
  </tr>
 
</table>
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr style="color: white; " >
    <td align="center" height="25" bgcolor="#333333" >#</p></td>
    <td align="center" bgcolor="#333333" >Item Descrption </p></td>
      <td align="center" bgcolor="#333333" >Taxable<br />
    Amount</p></td>
    <td align="center" bgcolor="#333333" >VAT</p></td>
    <td align="center" bgcolor="#333333" >Amount</p></td>
  </tr>
 
<?php 

$service=0;
$taxable=0;
$total=0;

 ?>

<?php $__currentLoopData = $invoice_det; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

<?php 

$service=$service + $value->Service;
$taxable=$taxable + $value->Taxable;
$total=$total + $value->Total;

 ?>

  <tr >
    <td ><?php echo e(++$key); ?></td>
    <td style="padding-top: 10px;"><?php echo e($value->ItemName); ?><br>PAX:<?php echo e($value->PaxName); ?><br>PNR:<?php echo e($value->PNR); ?><br>Sector:<?php echo e($value->Sector); ?></td>
       <td align="center"><?php echo e(number_format($value->Service,2)); ?></td>
    <td align="center"><?php echo e(number_format($value->Taxable,2)); ?><br>  <?php echo e(($value->Taxable>0) ? '5.00%' : ''); ?> </td>
    <td align="center"><?php echo e(number_format($value->Total,2)); ?></td>
  </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <tr>
    <td colspan="8"><hr noshade="noshade" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
      <td align="right"><strong>SubTotal</strong></td>
     <td align="center"><?php echo e(number_format($service,2)); ?></td>
     <td align="center"><?php echo e(number_format($taxable,2)); ?></td>
     <td align="center"><?php echo e(number_format($total,2)); ?></td>
    
  </tr>
  <tr>
    <td colspan="8"><hr noshade="noshade" /></td>
  </tr>
  <tr>
    <td colspan="8"><table width="50%" border="0" align="right">

      <tr>
        <td height="25" align="right" style="padding-right: 25px;"><strong>Total</strong></td>
        <td height="25"><strong><?php echo e(env('APP_CURRENCY')); ?><?php echo e(number_format($invoice_mst[0]->Total,2)); ?></strong></td>
      </tr>
      <tr>
        <td height="25" align="right" style="padding-right: 25px;">Payment Made </td>
        <td style="color: red;"> (-) <?php echo e(number_format($invoice_mst[0]->Paid,2)); ?> </td>
      </tr>
      <tr style="background-color: #e9e9e9;">
        <td height="25" align="right" style="padding-right: 25px;"><strong>Balance Due</strong> </td>
        <td height="25"><strong><?php echo e(env('APP_CURRENCY')); ?><?php echo e(number_format($invoice_mst[0]->Balance,2)); ?></strong></td>
      </tr>

        <tr  >
        <td height="25" align="right" style="padding-right: 25px;"><strong>Payment Mode</strong> </td>
        <td height="25"><strong><?php echo e($invoice_mst[0]->PaymentMode); ?></strong></td>
      </tr>

    </table></td>
  </tr>
</table>
<p>VAT Summary</p>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr style="background-color: #333333; color: white;"  >
    <td  height="25" scope="col" align="left" width="50%" style="padding-left: 10px;" >Tax Detail </td>
    <td scope="col" align="right" >Taxable Amount (<?php echo e(env('APP_CURRENCY')); ?>) </td>
    <td scope="col" align="right" style="padding-right: 10px;">VAT Amount (<?php echo e(env('APP_CURRENCY')); ?>) </td>
  </tr>
  <tr>
    <td height="25" style="padding-left: 10px;">Standard Rate (5%) </td>
    <td align="right"><?php echo e(env('APP_CURRENCY')); ?><?php echo e(number_format($service,2)); ?></td>
    <td align="right" style="padding-right: 10px;"><?php echo e(env('APP_CURRENCY')); ?><?php echo e(number_format($taxable,2)); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>Notes</p>
<p>Thanks for your business.</p>
<hr noshade="noshade" />
<p>&nbsp;  </p>
<hr noshade="noshade" />
<p>Voucher Details</p>
 <?php if(count($voucher_detail)>0): ?>    
<table border="1" style="width: 100%; border-collapse: collapse;">
  <thead style="background-color: #343a40; color: white;">
    <tr>
      <th width="15">S.No</th>
      <th width="150">Date</th>
      <th width="150">Account</th>
      <th width="350">VoucherNo</th>
      <th width="100">Debit</th>
      <th width="100">Credit</th>
    </tr>
  </thead>

<tbody>
<?php $__currentLoopData = $voucher_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <tr>
 <td><?php echo e($key+1); ?></td>
 <td><?php echo e(dateformatman2($value->Date)); ?></td>
 <td><?php echo e($value->ChartOfAccountName); ?></td>
 <td><?php echo e($value->Voucher); ?></td>
 <td><?php echo e($value->Debit); ?></td>
 <td><?php echo e($value->Credit); ?></td>
 </tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
 </tbody>
 </table>
 <?php else: ?>
   <p class=" text-danger">No data found</p>
 <?php endif; ?>   

</body>
</html>
<?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/al-molabi/resources/views/invoice_pdf.blade.php ENDPATH**/ ?>