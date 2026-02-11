

<?php $__env->startSection('title', $pagetitle); ?>
 

<?php $__env->startSection('content'); ?>



<div class="main-content">

 <div class="page-content">
 <div class="container-fluid">
  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-print-block d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">VENDOR BALANCE</h4>
                                        <strong class="text-end"></strong> 
        From <?php echo e(request()->StartDate); ?> TO <?php echo e(request()->EndDate); ?>


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

            
            <?php 
            $DrTotal=0;
            $CrTotal=0;
             ?>
  <div class="card">
      <div class="card-body">
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
 
 
  <tr>
    <td width="50%">From <?php echo e(request()->StartDate); ?> TO <?php echo e(request()->EndDate); ?> </td>
    <td width="50%"><div align="right">Dated : <?php echo e(date('d-m-Y')); ?></div></td>
  </tr>
</table>
</p>
<?php 
  $start_date = request()->StartDate;
  $start_date1 = request()->StartDate;
    $end_date = request()->EndDate;

     ?>

  <table  class="table table-striped table-sm" >
    <tr>
      <td width="6%" bgcolor="#CCCCCC"><div align="center"><strong>S.NO</strong></div></td>
      <td width="10%" bgcolor="#CCCCCC"><div class="text-start"><strong>Code</strong></div></td>
      <td width="40%" bgcolor="#CCCCCC"><div align="left"><strong>NAME</strong></div></td>
       <td width="16%" bgcolor="#CCCCCC"><div align="right"><strong>DEBIT</strong></div></td>
      <td width="16%" bgcolor="#CCCCCC"><div align="right"><strong> CREDIT </strong></div></td>
      <td width="16%" bgcolor="#CCCCCC"><div align="right"><strong>BALANCE</strong></div></td>
    </tr>
   <?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    

<?php 


 
  

  $DrTotal=$DrTotal+$value->Dr;
  $CrTotal=$CrTotal+$value->Cr;
 



 ?>



    
    <tr>
      <td><div align="center"><?php echo e($key+1); ?>.</div></td>
      <td><div align="left"><?php echo e($value->PartyID); ?></div></td>
      <td><?php echo e($value->PartyName); ?>-<?php echo e($value->BranchName); ?></td>
       <td><div align="right"><?php echo e(number_format($value->Dr,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format($value->Cr,2)); ?></div></td>
      <td><div align="right"><?php echo e(number_format(($value->Dr)-$value->Cr,2)); ?></div></td>
       
      <td><div align="right"></div></td>
     </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
    <tr>
      <td></td>
      <td></td>
      <td><strong>TOTAL</strong></td>
       <td align="right"><strong><?php echo e(number_format($DrTotal,2)); ?></strong></td>
      <td align="right"><strong><?php echo e(number_format($CrTotal,2)); ?></strong></td>
      
      
      <td align="right"><strong><?php echo e(number_format(($DrTotal)-($CrTotal),2)); ?></strong></td>
    </tr>



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
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\eits\al-molabi-staging\resources\views/reports/supplier_balance1.blade.php ENDPATH**/ ?>