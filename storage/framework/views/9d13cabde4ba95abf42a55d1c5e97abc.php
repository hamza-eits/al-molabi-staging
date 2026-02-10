

<?php $__env->startSection('title', $pagetitle); ?>
 

<?php $__env->startSection('content'); ?>

<?php
$company = DB::table('company')->first();
?>

<div class="main-content">

 <div class="page-content">
 <div class="container-fluid">
  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-print-block d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18"> </h4>
                                         
        <a href="<?php echo e(URL('/PartyListPDF')); ?>" class="btn btn-success" target="_blank">View PDF</a>

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
      <td colspan="2"><div align="center" class="style1"><?php echo e($company->Name); ?> </div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><strong>LIST OF PARTIES </strong></div></td>
    </tr>
    <tr>
      <td width="50%">DATED: <?php echo e(date('d-m-Y')); ?></td>
      <td width="50%">&nbsp;</td>
    </tr>
  </table>
  <table  class="table table-striped table-sm" >
    <tr>
      <td width="3%" bgcolor="#CCCCCC"><div align="center"><strong>S.NO</strong></div></td>
      <td width="25%" bgcolor="#CCCCCC"><div align="center"><strong>NAME</strong></div></td>
      <td width="36%" bgcolor="#CCCCCC"><div align="center"><strong>ADDRESS</strong></div></td>
      <td width="32%" bgcolor="#CCCCCC"><div align="center"><strong>PHONE/MOBILE NUMBER </strong></div></td>
      <td width="32%" bgcolor="#CCCCCC"><div align="center"><strong>EMAIL </strong></div></td>
    </tr>
   <?php $__currentLoopData = $party; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <tr>
      <td><div align="center"><?php echo e($key+1); ?>.</div></td>
      <td><?php echo e($value->PartyName); ?></td>
      <td><?php echo e($value->Address ?? ''); ?></td>
      <td><?php echo e($value->Phone ?? ''); ?></td>
      <td><?php echo e($value->Email ?? ''); ?></td>
      
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\eits\al-molabi-staging\resources\views/reports/party_list.blade.php ENDPATH**/ ?>