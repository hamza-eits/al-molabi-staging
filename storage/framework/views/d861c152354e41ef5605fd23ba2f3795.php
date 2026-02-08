 
  <?php 
            $DrTotal=0;
            $CrTotal=0;
             ?>
             <?php if(count($journal)>0): ?>    
          <table class="table table-sm table-bordered  table-hover table-striped align-middle table-nowrap mb-0">
          <tbody><tr>
          <th class="col-md-1 text-center">DATE</th>
          <th class="col-md-1 text-center" >VHNO</th>
          <th class="col-md-1 text-center">TYPE</th>
          <th class="col-md-5 text-center">Description</th>
          <th class="col-md-1 text-center">DR / Invoice</th>
          <th class="col-md-1 text-center">CR / Payment</th>
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
           <td align="center"><strong> TOTAL</strong></td>
            <td class="text-end"></td>
           <td class="text-end fw-bolder"><?php echo e(number_format($DrTotal,2)); ?></td>
           <td class="text-end fw-bolder"><?php echo e(number_format($CrTotal,2)); ?></td>
            
            <td class="text-end fw-bolder"> </td>
          </tr>
           </tbody>
           </table>
           <?php else: ?>
             <p class=" text-danger">No data found</p>
           <?php endif; ?> <?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/al-molabi/resources/views/blank_party_ledger1.blade.php ENDPATH**/ ?>