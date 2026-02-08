<?php $__env->startSection('title', $pagetitle); ?>


<?php $__env->startSection('content'); ?>




 



 
<div class="main-content">

  <div class="page-content">
    <div class="container-fluid">




      <!-- start page title -->
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Log Activity</h4>



          </div>
        </div>
      </div>


      <div class="card">

        <div class="card-body">
          
 <?php if(count($log)>0): ?>    
<table class="table table-sm align-middle table-nowrap mb-0">
<tbody><tr>
<th scope="col">S.No</th>
<th scope="col">Employee ID</th>
<th scope="col">Amount</th>
<th scope="col">Date</th>
<th scope="col">Section</th>
<th scope="col">VHNO</th>
<th scope="col">Narration</th>
</tr>
</tbody>
<tbody>
<?php $__currentLoopData = $log; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <tr>
 <td class="col-md-1"><?php echo e($key+1); ?></td>
 <td class="col-md-1"><?php echo e($value->UserName); ?></td>
 <td class="col-md-1"><?php echo e($value->Amount); ?></td>
 <td class="col-md-1"><?php echo e($value->Date); ?></td>
 <td class="col-md-1"><?php echo e($value->Section); ?></td>
 <td class="col-md-1"><?php echo e($value->VHNO); ?></td>
 <td class="col-md-1"><?php echo e($value->Narration); ?></td>
 </tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
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
<!-- END: Content-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/al-molabi/resources/views/log/log1.blade.php ENDPATH**/ ?>