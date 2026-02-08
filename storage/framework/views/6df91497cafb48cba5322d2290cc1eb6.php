

<?php $__env->startSection('title', $pagetitle); ?>
 

<?php $__env->startSection('content'); ?>



<div class="main-content">

 <div class="page-content">
 <div class="container-fluid">
  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-print-block d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Profit & Loss</h4>
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
        <div class="row">
          <!--REVENUES START-->
          <div class="col-md-12"> 
          <table class="table table-bordered table-sm">
             
           <thead>
             

             <tr  class="bg-light">
               <td class="col-md-2">
                 
               </td>
               <td class="col-md-6 ">
                 <strong>REVENUES</strong>
               </td>
               <td class="col-md-2">
                  
               </td>
             </tr>
           </thead>
           <tbody>

              <?php 
            $Total=0;
           
             ?>

           <?php $__currentLoopData = $chartofaccountr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php 

$chartofaccount_l2 = DB::select('SELECT CODE,ChartOfAccountID,ChartOfAccountName from chartofaccount where  CODE = "R"  and L2 = "'.$value->ChartOfAccountID.'" and  ChartOfAccountID in (select ChartOfAccountID from v_journal )  ' );

 ?>

             <tr>
              <td>
                 <?php echo e($value->ChartOfAccountID); ?>

               </td>
               <td>
                 <?php echo e($value->ChartOfAccountName); ?>

               </td>
               <td>
                 
               </td>
             </tr>
             

 

  <?php $__currentLoopData = $chartofaccount_l2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

<?php 
$request = request(); // Assign it once

$activity = DB::table('v_journal')
    ->select(DB::raw('SUM(IF(ISNULL(Cr), 0, Cr)) - SUM(IF(ISNULL(Dr), 0, Dr)) AS Balance'))
    ->whereBetween('Date', [$request->StartDate, $request->EndDate])
    ->where('ChartOfAccountID', $value1->ChartOfAccountID)
    ->when($request->BranchID > 0, function ($query) use ($request) {
        return $query->where('BranchID', $request->BranchID);
    })
    ->get();




 
if($activity[0]->Balance ==null)
{
  $activity[0]->Balance = 0;
} 
  


if($activity[0]->Balance != 0 ){
$Total = $Total +  $activity[0]->Balance; ?>


             <tr>
              <td>
                 <?php echo e($value1->ChartOfAccountID); ?>

               </td>
               <td style="text-indent: 20px;"> 
                 <?php echo e($value1->ChartOfAccountName); ?>

               </td>
               <td>
               <a  target="_blank" href="<?php echo e(URL('/BalanceSheetDetail/'.$value1->ChartOfAccountID.'/'.request()->StartDate.'/'.request()->EndDate)); ?>"><?php echo e(($activity[0]->Balance ==null) ? '0' :  number_format($activity[0]->Balance,2)); ?></a>
               </td>
             </tr>
<?php } ?>             
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 

              
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <tr>
            <td>
                 
               </td>
               <td> <STRONG> TOTAL <?php echo e((count($chartofaccountr)>0) ? $value->ChartOfAccountName : '0'); ?></STRONG>
                 
               </td>
               <td>
                 <?php echo e($Total); ?>

               </td>
             </tr>
           </tbody>
           
          </table>   
       </div>
          <!--REVENUES END-->

          

          <!--EXPENSES START-->
          <div class="col-md-12">  
           <table class="table table-bordered table-sm">
           <thead>
             <tr  class="bg-light">
               <td class="col-md-2">
                 
               </td>
               <td class="col-md-6 ">
                 <strong>EXPENSES</strong>
               </td>
               <td class="col-md-2">
                  
               </td>
             </tr>
           </thead>
           <tbody>
            <?php 
            $Total1=0;
            ?>
            <?php $__currentLoopData = $chartofaccounte; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php 
              $chartofaccount_l2 = DB::select('SELECT CODE,ChartOfAccountID,ChartOfAccountName from chartofaccount where  CODE = "E"  and L2 = "'.$value->ChartOfAccountID.'" and  ChartOfAccountID in (select ChartOfAccountID from v_journal )  ' );
              ?>
             <tr>
              <td>
                 <?php echo e($value->ChartOfAccountID); ?>

               </td>
               <td>
                 <?php echo e($value->ChartOfAccountName); ?>

               </td>
               <td>
                 
               </td>
             </tr>
            <?php 
            $SubTotal=0;
            ?>

            <?php $__currentLoopData = $chartofaccount_l2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

            <?php 
            
            $request = request(); // Store the request once

$activitye = DB::table('v_journal')
    ->select(DB::raw('SUM(IFNULL(Dr, 0)) - SUM(IFNULL(Cr, 0)) AS Balance'))
    ->whereBetween('Date', [$request->StartDate, $request->EndDate])
    ->where('ChartOfAccountID', $value1->ChartOfAccountID)
    ->when($request->BranchID > 0, function ($query) use ($request) {
        return $query->where('BranchID', $request->BranchID);
    })
    ->get();
 

              if($activitye[0]->Balance ==null)
              {
              $activitye[0]->Balance = 0;
              } 
              if($activitye[0]->Balance != 0 ){
              $SubTotal = $SubTotal +  $activitye[0]->Balance; 
              $Total1 = $Total1 +  $activitye[0]->Balance; ?>
              <tr>
                <td>
                 <?php echo e($value1->ChartOfAccountID); ?>

               </td>
                <td style="text-indent: 20px;"> 
                 <?php echo e($value1->ChartOfAccountName); ?>

               </td>
                <td>
                 <a  target="_blank" href="<?php echo e(URL('/BalanceSheetDetail/'.$value1->ChartOfAccountID.'/'.request()->StartDate.'/'.request()->EndDate)); ?>"><?php echo e(($activitye[0]->Balance ==null) ? '0' :  number_format($activitye[0]->Balance,2)); ?></a>
               </td>
              </tr>
            <?php } ?>
             
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
<tr>
  <td></td>
  <td style="text-indent: 20px;" ><strong>Total <?php echo e($value->ChartOfAccountName); ?></strong></td>
  <td><?php echo e($SubTotal); ?></td>
</tr>

<tr style="height: 30px;">
  <td></td>
  <td></td>
  <td></td>
</tr>
              
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <tr>
            <td>
                 
               </td>
               <td>
                 TOTAL
               </td>
               <td>
                 <?php echo e($Total1); ?>

               </td>
             </tr>

              <tr>
            <td>
                 
               </td>
               <td>
                 PROFIT & LOSS
               </td>
               <td>
                 <?php echo e($Total-$Total1); ?>

               </td>
             </tr>
           </tbody>
         </table>
          </div>
          <!--EXPENSES END-->
          
        </div>  
      </div>
  </div>
  
  </div>
</div>

        </div>
      </div>
    </div>
    <!-- END: Content-->
 <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

 

 <script>
   $( document ).ready(function() {
    
  $('body').addClass('sidebar-enable vertical-collpsed')
 // $('body').removeClass('sidebar-enable vertical-collpsed')


// setTimeout(function(){
//           $("body").removeClass("sidebar-enable vertical-collpsed");
//      },5000);
});
 </script>
 
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/rotana_sky/resources/views/reports/profit_loss11.blade.php ENDPATH**/ ?>