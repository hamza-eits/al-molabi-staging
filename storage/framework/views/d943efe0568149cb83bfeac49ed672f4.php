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

      <div>
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
      <div class="card shadow-sm">
        <div class="card-body">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
           

            <tr>
              <td width="30%">From <?php echo e(dateformatman2(request()->StartDate)); ?>  - <?php echo e(dateformatman2(request()->EndDate)); ?></td>
              <td width="30%">
                <div  align="center"><strong> Payment Summary</strong></div>
              </td>
              <td width="30%">
                <div align="right">DATED: <?php echo e(dateformatman2(date('Y-m-d'))); ?></div>
              </td>

            </tr>
          </table>
          <br>
          <tr>
            <td colspan="2">
              <div align="left"><strong> Cash Payment </strong></div>
            </td>
            
          </tr>
          <br>
         
          <table class="table table-bordered table-sm">
            <thead class="bg-light">
              <tr>
                <th width="5%" bgcolor="#CCCCCC">
                  <div align="left"><strong>DATE</strong></div>
                </th>
                <th width="5%" bgcolor="#CCCCCC">
                  <div align="left"><strong>Inovice No</strong></div>
                </th>
                <th width="5%" bgcolor="#CCCCCC">
                  <div align="left"><strong>V.NO</strong></div>
                </th>
                <th width="5%" bgcolor="#CCCCCC">
                  <div align="center"><strong>Party Name</strong></div>
                </th>
               
                <th width="10%" bgcolor="#CCCCCC">
                  <div align="center"><strong>Note</strong></div>
                </th>
                <th width="10%" bgcolor="#CCCCCC">
                  <div align="center"><strong>Amount</strong></div>
                </th>

              </tr>
            </thead>
            <tbody>
              <?php
              $cash = 0;
              $partyName = null;
              ?>
              <?php $__currentLoopData = $cash_payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
              $cash += $value->Paid;

              $party = DB::table('party')
              ->select('PartyID','PartyName')
              ->where('partyID',$value->PartyID)->first();
              ?>

            <tbody>
              <tr>
                <td>
                  <div align="left"><?php echo e(dateformatman($value->Date)); ?></div>
                </td>
                <td>
                  <div align="left"><?php echo e($value->InvoiceMasterID); ?></div>
                </td>
                <td>
                  <div align="left"><?php echo e($value->Voucher); ?></div>
                </td>
                <td>
                  <div align="left"><?php echo e($party->PartyName); ?></div>
                </td>
              
                <td>
                  <div align="left"><?php echo e($value->Note); ?></div>
                </td>
                <td>
                  <div align="right"><?php echo e($value->Paid); ?></div>
                </td>


                
              </tr>
            </tbody>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr class="bg-light">
              <td width="5%" bgcolor="#CCCCCC">
                <div align="center"><strong></strong></div>
              </td>
              <td width="5%" bgcolor="#CCCCCC">
                <div align="center"><strong></strong></div>
              </td>
              <td width="5%" bgcolor="#CCCCCC">
                <div align="center"><strong></strong></div>
              </td>
              <td width="10%" bgcolor="#CCCCCC">
                <div align="center"><strong></strong></div>
              </td>
             
              <td width="9%" bgcolor="#CCCCCC">
                <div align="right"><strong>TOTAL</strong></div>
              </td>

              <td width="9%" bgcolor="#CCCCCC">
                <div align="right"><strong><?php echo e(number_format($cash,0)); ?> </strong></div>
              </td>
            </tr>




            </tbody>
          </table>
          <tr>
            <td colspan="2">
              <div align="left"><strong> Bank Payment </strong></div>
            </td>
            <br>
          </tr>
          <table class="table table-bordered table-sm">
            <thead class="bg-light"> 
              <tr>
                <th width="5%" bgcolor="#CCCCCC">
                  <div align="center"><strong>DATE</strong></div>
                </th>
                <th width="5%" bgcolor="#CCCCCC">
                  <div align="center"><strong>Inovice No</strong></div>
                </th>
                <th width="5%" bgcolor="#CCCCCC">
                  <div align="center"><strong>V.NO</strong></div>
                </th>
                <th width="10%" bgcolor="#CCCCCC">
                  <div align="center"><strong>PARTY</strong></div>
                </th>
                <th width="10%" bgcolor="#CCCCCC">
                  <div align="center"><strong>Note</strong></div>
                </th>
                <th width="10%" bgcolor="#CCCCCC">
                  <div align="center"><strong>Amount</strong></div>
                </th>

              </tr>
            </thead>
            <tbody>
              <?php
              $bank = 0;
              $partyName = null;
              ?>
              <?php $__currentLoopData = $bank_payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
              $bank += $value->Paid;
              $party = DB::table('party')
              ->select('PartyID','PartyName')
              ->where('partyID',$value->PartyID)->first();
              ?>

            <tbody>
              <tr>
                <td>
                  <div align="left"><?php echo e(dateformatman($value->Date)); ?></div>
                </td>
                <td>
                  <div align="left"><?php echo e($value->InvoiceMasterID); ?></div>
                </td>
                <td>
                  <div align="left"><?php echo e($value->Voucher); ?></div>
                </td>
                <td>
                  <div align="left"><?php echo e($party->PartyName); ?></div>
                </td>
                <td>
                  <div align="left"><?php echo e($value->Note); ?></div>
                </td>
                <td>
                  <div align="right"><?php echo e($value->Paid); ?></div>
                </td>


                
              </tr>
            </tbody>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr class="bg-light">
              <td width="5%" bgcolor="#CCCCCC">
                <div align="center"><strong></strong></div>
              </td>
              <td width="5%" bgcolor="#CCCCCC">
                <div align="center"><strong></strong></div>
              </td>
              <td width="5%" bgcolor="#CCCCCC">
                <div align="center"><strong></strong></div>
              </td>
              <td width="10%" bgcolor="#CCCCCC">
                <div align="center"><strong></strong></div>
              </td>
              <td width="9%" bgcolor="#CCCCCC">
                <div align="right"><strong>TOTAL</strong></div>
              </td>

              <td width="9%" bgcolor="#CCCCCC">
                <div align="right"><strong><?php echo e(number_format($bank,0)); ?> </strong></div>
              </td>
            </tr>




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
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/al-molabi/resources/views/reports/payment_summary1.blade.php ENDPATH**/ ?>