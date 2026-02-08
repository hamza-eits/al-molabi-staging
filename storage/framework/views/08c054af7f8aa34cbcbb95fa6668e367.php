<?php $__env->startSection('title', $pagetitle); ?>
 

<?php $__env->startSection('content'); ?>



<div class="main-content">

 <div class="page-content">
 <div class="container-fluid">
  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-print-block d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Expense Report</h4>
                                         
 
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

            
            
  <div class="card">
      <div class="card-body">
         <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<?php 


$AmountTotal=0;
$Tax=0;

 ?>

 <?php if(count($expense_detail)>0): ?>    
  <table class="table table-sm align-middle table-nowrap mb-0">
  <tbody><tr>
  <th scope="col">S.No</th>
  <th scope="col">Expense</th>
  <th scope="col">Date</th>
  <th scope="col">Supplier</th>
  <th scope="col">Account</th>
  <th scope="col">Tax</th>
  <th scope="col">Amount</th>
  </tr>
  </tbody>
  <tbody>
  <?php $__currentLoopData = $expense_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php 

$AmountTotal = $AmountTotal + $value->Amount;
$Tax = $Tax + $value->Tax;

 ?>

   <tr>
   <td class="col-md-1"><?php echo e($key+1); ?></td>
   <td class="col-md-1"><?php echo e($value->ExpenseNo); ?></td>
   <td class="col-md-1"><?php echo e($value->Date); ?></td>
   <td class="col-md-1"><?php echo e($value->SupplierName); ?></td>
   <td class="col-md-1"><?php echo e($value->ChartOfAccountName); ?></td>
   <td class="col-md-1"><?php echo e($value->Tax); ?></td>
   <td class="col-md-1"><?php echo e($value->Amount); ?></td>
   </tr>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   

   <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>Total</td>
    <td><?php echo e($Tax); ?></td>
    <td><?php echo e($AmountTotal); ?></td>
   </tr>
   </tbody>
   </table>
   <?php else: ?>
     <p class=" text-danger">No data found</p>
   <?php endif; ?>     
</body>
</html>      
      </div>
  </div>
  
  </div>
</div>

        </div>
      </div>
    </div>
    <!-- END: Content-->
 
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/rotana_sky/resources/views/expense/expense_report1.blade.php ENDPATH**/ ?>