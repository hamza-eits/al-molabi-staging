

<?php $__env->startSection('title', 'Party Yearly Report'); ?>
 

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

            
             
  <div class="card overflow-auto">
      <div class="card-body">
         <table width="200%" class="table table-striped">
  <tr>
    <td colspan="2"><div align="center" class="style1">
      <h4>VENDOR BALANCE </h4>
    </div></td>
  </tr>
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

<table class="table table-striped" >
  <tr>
    <td style="width:23%;"><strong>Description</strong></td>
    <td style="width:8%;"><strong>Opening Balance </strong></td>
   <?php  while (strtotime($start_date) <= strtotime($end_date)) { ?>

    <td><div align="center">
      <?php  echo date("M-Y",strtotime($start_date)); ?>
    </div></td>
    <?php $start_date = date ("Y-m-d", strtotime("+1 month", strtotime($start_date)));     } ?>
    <td>Total</td>
  </tr>
 <?php $__currentLoopData = $party; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <?php  
$grand=0;

 $start_date1 = request()->StartDate; 

 $sql = DB::table('journal')
            ->select( DB::raw('sum(if(ISNULL(Dr),0,Dr)-if(ISNULL(Cr),0,Cr)) as Balance'))
            ->where('PartyID',$value->PartyID)
            ->where('ChartOfAccountID',110400)
              ->where('Date','<',request()->StartDate)
            // ->whereBetween('date',array($request->StartDate,$request->EndDate))

               ->get();
if(count($sql)>0){
  $opening= $sql[0]->Balance;
}
else
{
   $opening=0;
}
 
 ?>
  <tr>
    <td><?php echo e($value->PartyName); ?></td>
    <td><div align="right"><?php echo e(($sql[0]->Balance==null) ? $sql[0]->Balance=0 : number_format($sql[0]->Balance,2)); ?></div></td>
     <?php  while (strtotime($start_date1) <= strtotime($end_date)) { 

 


      ?>


      <?php 

      // start of nested loop for checking balance
$date= date("M-Y",strtotime($start_date1));
$opening_bal = DB::table('v_party_montly_balance')->where('PartyID',$value->PartyID)->where('Date',$date)->get();

 if(count($opening_bal)>0){
  $monthly= $opening_bal[0]->Balance;
}
else
{
   $monthly=0;
}
 

       ?>

    <td><div align="center">
      <?php echo e((count($opening_bal)>0) ? $opening_bal[0]->Balance : 0); ?> <?php 

      if(!isset($grand))
{
$grand =  $monthly;
 }
else
{
$grand = $grand + $monthly;
 }
  ?>
    </div></td>
    <?php $start_date1 = date ("Y-m-d", strtotime("+1 month", strtotime($start_date1)));     }


 
     ?>
    <td><?php echo e($grand+$opening); ?></td>
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
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/rotana_sky/resources/views/reports/party_yearly_balance1.blade.php ENDPATH**/ ?>