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
  <table style="width: 100%;">
    <tr>
      <td colspan="2"><div align="center" class="style1">  </div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><strong> INVOICE SUMMARY SALEMAN WISE</strong></div></td>
    </tr>
    <tr>
      <td width="50%">From <?php echo e(request()->StartDate); ?> TO <?php echo e(request()->EndDate); ?></td>
    <td width="50%"><div align="right">DATED: <?php echo e(date('d-m-Y')); ?></div></td>
    
    </tr>
  </table>
   
  <?php if(count($invoice_summary)>0): ?>
  <table class="table table-bordered table-sm">
  <thead style="display: table-header-group;">
   <tr class="bg-light">
     <th width="5%" bgcolor="#CCCCCC"><div align="center"><strong>S#</strong></div></th>
      <th width="15%" bgcolor="#CCCCCC"><div align="left"><strong>SALEMAN NAME</strong></div></th>
      <th width="5%" bgcolor="#CCCCCC"><div align="center"><strong>QTY</strong></div></th>
      <th width="10%" bgcolor="#CCCCCC"><div align="center"><strong>GROSS</strong></div></th>
      <th width="10%" bgcolor="#CCCCCC"><div align="center"><strong>TAXES </strong></div></th>
       <th width="9%" bgcolor="#CCCCCC"><div align="center"><strong>PAYABLE </strong></div></th>
      <th width="9%" bgcolor="#CCCCCC"><div align="center"><strong>SERVICE </strong></div></th>
      <th width="9%" bgcolor="#CCCCCC"><div align="center"><strong>DIS/ </strong></div></th>
      <th width="9%" bgcolor="#CCCCCC"><div align="center"><strong>PROFIT </strong></div></th>
       
   </tr>
  </thead>
   <tbody>

<?php   

$qty=0;
$total=0;
$taxable=0;
$service=0;
$discount=0;




 ?>

    <?php $__currentLoopData = $invoice_summary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


<?php   

$qty=$qty+$value->Qty;
$total=$total+$value->Total;
$taxable=$taxable+$value->Taxable;
$service=$service+$value->Service;
$discount=$discount+$value->Discount;



 ?>
    
    
      <tr>
      
      <td><div align="center"><?php echo e($key+1); ?></div></td>
       <td><?php echo e($value->SalemanName); ?></td>
       <td align="center"><?php echo e($value->Qty); ?></td>
      <td><div align="center"><?php echo e(number_format($value->Total,2)); ?></div></td>
     
      <td><div align="center"><?php echo e(number_format($value->Taxable,2)); ?></div></td>
     
      <td><div align="center"><?php echo e(number_format($value->Total,2)); ?></div></td>
     
      <td><div align="center"><?php echo e(number_format($value->Service,2)); ?></div></td>
     
      <td><div align="center"><?php echo e(number_format($value->Discount,2)); ?></div></td>
      <td><div align="center"><?php echo e(number_format($value->Service,2)); ?></div></td>
      
 

    </tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

 <tr style="font-weight: bolder; background-color: #e9e9e9;"> 

  <td align="center" colspan="2" >Total</td>
  <td align="center"><?php echo e(number_format($qty)); ?></td>
  <td align="center"><?php echo e(number_format($total,2)); ?></td>
  <td align="center"><?php echo e(number_format($taxable,2)); ?></td>
  <td align="center"><?php echo e(number_format($total,2)); ?></td>
  <td align="center"><?php echo e(number_format($service,2)); ?></td>
  <td align="center"><?php echo e(number_format($discount,2)); ?></td>
  <td align="center"><?php echo e(number_format($service,2)); ?></td>
 </tr>

 
<?php else: ?>
<p class="text-danger"> <strong>  No record found</strong></p>
<?php endif; ?>
    

   
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
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/al-molabi/resources/views/reports/invoice_summary1.blade.php ENDPATH**/ ?>