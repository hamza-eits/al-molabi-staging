<?php $__env->startSection('title', $pagetitle); ?>
 

<?php $__env->startSection('content'); ?>



<div class="main-content">

 <div class="page-content">
 <div class="container-fluid">
  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-print-block d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Party Ledger</h4>
                                        <strong class="text-end"><?php echo e($party[0]->PartyID); ?> - <?php echo e($party[0]->PartyName); ?></strong> 
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
           <?php if(count($journal)>0): ?>    
          <table class="table table-sm table-bordered  table-striped align-middle  mb-0">
          <tbody><tr>
          <th class="col-md-1 text-center">DATE</th>
          <th class="col-md-1 text-center" >VHNO</th>
          <th class="col-md-1 text-center">Type</th>
          <th class="col-md-5 text-center">Description</th>
          <th class="col-md-1 text-center">DR</th>
          <th class="col-md-1 text-center">CR</th>
          <th class="col-md-1 text-center">Balance</th>
           </tr>
          </tbody>
          <tbody>
            <tr></tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Opending Balance</td>
            <td></td>
            <td></td>
            <td class="text-danger text-end"><?php echo e($sql[0]->Balance); ?></td>
          <?php $__currentLoopData = $journal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr>
           <td class="text-center"><?php echo e(dateformatman($value->Date)); ?></td>
           <td class="text-center"><?php echo e($value->VHNO); ?></td>
           <td class="text-center"><?php echo e($value->JournalType); ?></td>
           <td ><?php echo e($value->Narration); ?></td>
           <td class="text-end"><div> <?php echo e(($value->Dr==0) ? '' : number_format($value->Dr,2)); ?></div></td>
           <td class="text-end"><div> <?php echo e(($value->Cr==0) ? '' : number_format($value->Cr,2)); ?></div></td>
              <td class="text-end">
               

               <?php 

if(!isset($balance)) { 

             $balance  =  $sql[0]->Balance + ($value->Dr-$value->Cr);
             $DrTotal = $DrTotal+$value->Dr;
             $CrTotal = $CrTotal+$value->Cr;
             echo number_format($balance,2);


}
else
{
  $balance = $balance + ($value->Dr-$value->Cr);
  $DrTotal = $DrTotal+$value->Dr;
             $CrTotal = $CrTotal+$value->Cr;
  echo number_format($balance,2);
}
              ?> 
<?php echo e(($balance>0) ? "DR" : "CR"); ?>

             </td>
           </tr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
          <tr  class="table-active">
              
           <td></td>
           <td></td>
           <td>TOTAL</td>
            <td class="text-end"></td>
           <td class="text-end fw-bolder"><?php echo e(number_format($DrTotal,2)); ?></td>
           <td class="text-end fw-bolder"><?php echo e(number_format($CrTotal,2)); ?></td>
            
            <td class="text-end fw-bolder"> <?php echo e(number_format($DrTotal-$CrTotal,2)); ?></td>
          </tr>
           </tbody>
           </table>
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
    <!-- END: Content-->
<!-- BEGIN: Vendor JS-->
    <script src="<?php echo e(asset('assets/vendors/js/vendors.min.js')); ?>"></script>
    <!-- BEGIN Vendor JS-->
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\eits\al-molabi-staging\resources\views/reports/party_ledger1.blade.php ENDPATH**/ ?>