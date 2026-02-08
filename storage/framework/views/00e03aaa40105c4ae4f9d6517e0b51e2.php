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

           
            <div class="row d-sm-flex align-items-center justify-content-between">
                <div class="col-md-6">
                    <div class="page-title-box">
                        <h4 class="mb-sm-0 font-size-18 pt-3">Itemwise Sale </h4>
                    </div>
                </div>
                
                <div class="col-md-5">
                    <form action="<?php echo e(URL('/ItemWiseSale2')); ?>" method="post" name="form1" id="form1" class="form-inline w-100 d-flex align-items-center">
                        <?php echo csrf_field(); ?>
                        
                        <?php
                        $branches = \App\Models\Branch::getBranchList();
                    ?>
                    
            
                        <div class="col-md-3">
                            <div class="form-group mx-2 ">
                              <select name="BranchID" id="" class="form-select" id="select2-basic" required="">
                                <?php if(session('UserType') == 'SuperAdmin'): ?>
                                <option value="0">All Branches</option>
                                <?php endif; ?>
                              <?php foreach ($branches as $key => $value): ?>
                              <option value="<?php echo e($value->id); ?>" <?php echo e(($value->id== request()->BranchID) ? 'selected=selected':''); ?>

                              ><?php echo e($value->id); ?>-<?php echo e($value->name); ?></option>
        
                              <?php endforeach ?>
                            </select>
         
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group mx-2 ">
                                <input type="date" class="form-control" id="StartDate" name="StartDate" value="<?php echo e(request()->StartDate); ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mx-2">
                                <input type="date" class="form-control" id="EndDate" name="EndDate" value="<?php echo e(request()->EndDate); ?>">
                            </div>
                        </div>
            
                        <div class="form-group d-flex">
                            <button type="submit" class="btn btn-success w-md" id="online">Submit</button>
                            
                        </div>
                    </form>
                </div>
            </div>        
            
  <div class="card">
      <div class="card-body">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="2"><div align="center" class="style1"> </div></td>
    </tr>
  
    <tr>
      <td width="50%">From <?php echo e(dateformatman2(request()->StartDate)); ?> - <?php echo e(dateformatman2(request()->EndDate)); ?></td>
    <td width="50%"><div align="right">DATED: <?php echo e(date('d-m-Y')); ?></div></td>
    
    </tr>
  </table>
  <table class="table table-bordered table-striped  table-sm">
    <tr class="bg-light">
      <td width="5%" bgcolor="#CCCCCC"><div align="center"><strong>S.NO</strong></div></td>
      <td width="30%" bgcolor="#CCCCCC"><div align="center"><strong>ITEM NAME</strong></div></td>
      <td width="10%" bgcolor="#CCCCCC"><div align="center"><strong>NO OF SALES</strong></div></td>
      <td width="10%" bgcolor="#CCCCCC"><div align="center"><strong>TOTAL INVOICE</strong></div></td>
      <td width="10%" bgcolor="#CCCCCC"><div align="center"><strong>PROFIT</strong></div></td>
      <td width="10%" bgcolor="#CCCCCC"><div align="center"><strong>Percentage</strong></div></td>
           </tr>
 
<?php   

$total=0;
$profit=0;
$invoice=0;

 ?>

<?php $__currentLoopData = $today_sale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     

     <?php  

      $total +=$value->Total;
      $profit +=$value->Profit;
      $invoice +=$value->Invoice;

      ?>

    <tr>
      <td><div align="center"><?php echo e($key+1); ?>.</div></td>
      <td>  <a href="<?php echo e(URL('/InvoiceDetailList').'/'.$value->ItemID.'/'.request()->StartDate.'/'.request()->EndDate); ?>" target="_blank"><?php echo e($value->ItemName); ?></a></td>
      <td align="center"><?php echo e($value->Total); ?></td>
      <td align="center"><?php echo e(number_format($value->Invoice,2)); ?></td>
      <td><div align="center"><?php echo e($value->Profit > 0 ? number_format($value->Profit, 2) : ''); ?></div></td>
      <td><div align="center"><?php echo e($value->Percentage > 0 ? number_format($value->Percentage*100, 2) : ''); ?></div></td>
      
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<tr style="font-weight: bolder;">
  <td colspan="2" align="center" ><strong>Grand Total</strong></td>
  <td align="center"><?php echo e(number_format($total)); ?></td>
  <td align="center"><?php echo e(number_format($invoice,2)); ?></td>
  <td align="center"><?php echo e(number_format($profit,2)); ?></td>
 
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
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/rotana_sky/resources/views/reports/itemwise_sale2.blade.php ENDPATH**/ ?>