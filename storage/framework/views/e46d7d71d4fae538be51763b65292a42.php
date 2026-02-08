<?php $__env->startSection('title', $pagetitle); ?>
 

<?php $__env->startSection('content'); ?>

<style>
  div {
  word-wrap: break-word;
}
</style>

<div class="main-content">

 <div class="page-content">
 <div class="container-fluid">
  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-print-block d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Journal Detail</h4>
                                         
 
                                </div>
                            </div>
                        </div>
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

            
            
  <div class="table-responsive">
    <div class="card">
      <div class="card-body">
        
 <?php if(count($journal)>0): ?>    
<table class="table table-sm align-middle  mb-3">
<tbody><tr>
 <th class="col-md-1">DATE</th>
<th class="col-md-1">ACCOUNT</th>
<th class="col-md-1">VHNO</th>
<th class="col-md-1">TYPE</th>
<th class="col-md-6">TRANSACTION DETAILS  </th>
<th class="col-md-1">DEBIT</th>
<th class="col-md-1">CREDIT</th>
<th class="col-md-1">EDIT</th>
</tr>
</tbody>
<tbody>
  <?php 

$TotalDr=0;
$TotalCr=0;
 $link = '';
     $linke = '';



   ?>
<?php $__currentLoopData = $journal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php 

$TotalDr = $TotalDr+ $value->Dr;
$TotalCr = $TotalCr+ $value->Cr;



 
$vhno = substr($value->VHNO,0,2);
 
 
 


 switch ($vhno) {

   case 'SI':  
     $link = 'InvoiceView/'.$value->InvoiceMasterID;
     $linke = 'InvoiceEdit/'.$value->InvoiceMasterID;
     break;

 case 'SR':  
     $link = 'InvoiceView/'.$value->InvoiceMasterID;
     $linke = 'InvoiceEdit/'.$value->InvoiceMasterID;
     break;


 case 'BILL':  
     $link = 'BillView/'.$value->InvoiceMasterID;
     $linke = 'BillEdit/'.$value->InvoiceMasterID;
     break;

 case 'BILLPAY':  
     $link = 'PurchasePaymentView/'.$value->PurchasePaymentMasterID;
     $linke = 'PurchasePaymentEdit/'.$value->PurchasePaymentMasterID;
     break;     


 case 'EX':  
     $link = 'ExpenseView/'.$value->ExpenseMasterID;
     $linke = 'ExpenseEdit/'.$value->ExpenseMasterID;
     break;



 case 'JV':  
     $link = 'VoucherView/'.$value->VoucherMstID;
     $linke = 'VoucherEdit/'.$value->VoucherMstID;
     break;


 case 'BP':  
     $link = 'VoucherView/'.$value->VoucherMstID;
     $linke = 'VoucherEdit/'.$value->VoucherMstID;
     break;

 case 'BR':  
     $link = 'VoucherView/'.$value->VoucherMstID;
     $linke = 'VoucherEdit/'.$value->VoucherMstID;
     break;
 

 case 'CP':  
     $link = 'VoucherView/'.$value->VoucherMstID;
     $linke = 'VoucherEdit/'.$value->VoucherMstID;
     break;


 case 'CR':  
     $link = 'VoucherView/'.$value->VoucherMstID;
     $linke = 'VoucherEdit/'.$value->VoucherMstID;
     break;

   case 'PAY':  
     $link = 'PaymentView/'.$value->VoucherMstID;
     $linke = 'PaymentEdit/'.$value->VoucherMstID;
     break;

  case 'LP':  
     $link = '#';
     $linke = '#';
     break;

   
   
 }
 
  
 ?>

 
 
 <tr>
  <td class="col-md-1"><?php echo e(dateformatman2($value->Date)); ?></td>
 <td class="col-md-1"><?php echo e($value->ChartOfAccountName); ?></td>
 <td class="col-md-1"><?php echo e($value->VHNO); ?></td>
 <td class="col-md-1"><?php echo e($value->JournalType); ?> </td>
 <td width="20"><?php echo e($value->Narration); ?></td>
 <td class="col-md-1" ><a href="<?php echo e(URL('/'.$link)); ?>"><?php echo e($value->Dr); ?></a></td>
 <td class="col-md-1" ><a href="<?php echo e(URL('/'.$link)); ?>"><?php echo e($value->Cr); ?></a></td>
 <td class="col-md-1" ><a href="<?php echo e(URL('/'.$linke)); ?>" target="_blank"><i class="font-size-18 bx bx-pencil align-middle me-1 text-secondary"></i></a></td>
 </tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   

 <tr>
   <td></td>
   <td colspan="2">Total Debits and Credits (<?php echo e(dateformatman2($StartDate)); ?> - <?php echo e(dateformatman2($EndDate)); ?>)</td>
   
   <td></td>
   <td></td>
   <td><?php echo e(session::get('Currency')); ?> <?php echo e($TotalDr); ?></td>
   <td><?php echo e(session::get('Currency')); ?> <?php echo e($TotalCr); ?></td>
   
 </tr>
 <tr>
   <td>As on <?php echo e(dateformatman2($EndDate)); ?></td>
   <td>Closing Balance  </td>
   <td></td>
   <td></td>
   <td></td>
   <td><?php echo e(session::get('Currency')); ?> <?php echo e(number_format($TotalDr-$TotalCr,2)); ?></td>
   <td></td>
 </tr></tbody>
 </table>
 <div ><span >Total Count : <?php echo e(count($journal)); ?></span></div>
 <?php else: ?>
   <p class=" text-danger">No data found</p>
 <?php endif; ?>   

      </div>
  </div>
  </div>
  
  </div>
</div>

        </div>
      </div>
    </div>
    <!-- END: Content-->
 
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/al-molabi/resources/views/reports/balancesheet_detail.blade.php ENDPATH**/ ?>