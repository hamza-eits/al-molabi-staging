

<?php $__env->startSection('title', $pagetitle); ?>
 

<?php $__env->startSection('content'); ?>

<style>
  
  .display-node-name {
    position: relative;
    right: 9px;
    bottom: 16px;
    padding-top: 18px;
    padding-bottom: 12px;
    border-left: 1px solid #adadad;
    border-bottom: 1px solid #adadad;
}

 .display-node-name2 {
    position: relative;
    right: 9px;
    bottom: 16px;
    padding-top: 18px;
    padding-bottom: 12px;
    border-left: 0px solid #adadad;
    border-bottom: 1px solid #adadad;
}

 .leftline {
    position: relative;
    right: 9px;
    bottom: 16px;
    padding-top: 18px;
    padding-bottom: 12px;
    border-left: 1px solid #adadad;
    border-bottom: 1px dotted #adadad;
}

</style>

   <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid"><div class="row">

                      <div class="row"><div class="row">
  <div class="col-12">
  
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

  
 <div class="card shadow-sm">
    
  <div class="card-header">
        <h2>Chart of Account</h2>
  </div>
    
   <div class="row">
     <div class="col-md-6">  


    <!-- enctype="multipart/form-data" -->
    <form action="<?php echo e(URL('/ChartOfAccountSave')); ?>" method="post">


     <?php echo e(csrf_field()); ?> 


     <div class="card-body">
      <h5 class="mb-3">Level 2</h5>
      <input type="hidden" name="Level" value="2">
         <div class="col-md-12 col-sm-12">
               <div class="mb-3 row">
                  <div class="col-sm-3">
                    <label class="col-form-label fw-bold" for="first-name">Parent Head</label>
                  </div>
                  <div class="col-sm-9">
                    <select name="ChartOfAccountID" id="ChartOfAccountID" class="form-select select2">
                        <option value="">Select</option>
                        <?php foreach ($chartofaccount_l1 as $key => $value): ?>
                          <option value="<?php echo e($value->ChartOfAccountID); ?>"><?php echo e($value->ChartOfAccountID); ?>-<?php echo e($value->ChartOfAccountName); ?></option>
                        <?php endforeach ?>
                  
                      </select>
                  </div>
                </div>

                <div class="mb-3 row">
                  <div class="col-sm-3">
                    <label class="col-form-label fw-bold" for="first-name">Chart of Acc</label>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" id="first-name" class="form-control" name="ChartOfAccountName" >
                  </div>
                </div>

                

            
           

              
                


              </div>
               <div class="card-footer bg-transparent">
        
        <div><button type="submit" class="btn btn-success w-sm float-right">Save</button>
             <a href="<?php echo e(URL('/Dashboard')); ?>" class="btn btn-secondary w-sm float-right">Cancel</a>
        
        
      </div>
  </div>
      </div></form>




    </div>
      <div class="col-md-6">  

        <!-- enctype="multipart/form-data" -->
        <form action="<?php echo e(URL('/ChartOfAccountSaveL3')); ?>" method="post">
         <?php echo e(csrf_field()); ?> 
             <input type="hidden" name="Level" value="3">

         <div class="card-body">
      <h5 class="mb-3">Level 3</h5>
     
         <div class="col-md-12 col-sm-12">
               <div class="mb-3 row">
                  <div class="col-sm-3">
                    <label class="col-form-label fw-bold" for="first-name">Parent Head</label>
                  </div>
                  <div class="col-sm-9">
                    <select name="ChartOfAccountID" id="ChartOfAccountID" class="form-select select2">
                        <option value="">Select</option>
                        <?php foreach ($chartofaccount_l2 as $key => $value): ?>
                          <option value="<?php echo e($value->ChartOfAccountID); ?>"><?php echo e($value->ChartOfAccountID); ?>-<?php echo e($value->ChartOfAccountName); ?></option>
                        <?php endforeach ?>
                  
                      </select>
                  </div>
                </div>

                <div class="mb-3 row">
                  <div class="col-sm-3">
                    <label class="col-form-label fw-bold" for="first-name">Chart of Acc</label>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" id="first-name" class="form-control" name="ChartOfAccountName" >
                  </div>
                </div>

               
  <div class="mb-3 row">
                  <div class="col-sm-3">
                    <label class="col-form-label fw-bold" for="first-name">Type ( if Bank/Card)</label>
                  </div>
                  <div class="col-sm-9">
                    <select name="Category" id="Category" class="form-select">
                      <option value="0">Select </option>
                      <option value="BANK">CASH</option>
                      <option value="BANK">BANK</option>
                      <option value="CARD">CARD</option>
                    </select>
                  </div>
                </div>

            
             

              
                


              </div>
               <div class="card-footer bg-transparent">
        
        <div><button type="submit" class="btn btn-success w-sm float-right">Save</button>
             <a href="<?php echo e(URL('/Dashboard')); ?>" class="btn btn-secondary w-sm float-right">Cancel</a>
        
        
      </div>
  </div>
      </div>


    </form>


    </div>
   </div>
     
  
  </div>

  <?php 

$chartofaccount_L1 = DB::table('chartofaccount')->where('Level','=',1)->get();


   ?>


 <div class="card shadow-sm">
    <div class="card-header">
      <h4>Chart of Accounts</h4>
    </div>
      <div class="card-body">
         <?php if(count($chartofaccount_L1)>0): ?>    
       <div class="table-responsive">
          <table class="table table-lg align-middle table-nowrap mb-0" id="student_table">
        <tbody><tr>
         <th class="col-md-1">Code</th>
        <th class="col-md-3">Chart of Account</th>
         <th class="col-md-1">L1</th>
        <th class="col-md-1">L2</th>
        <th class="col-md-1">L3</th>
        <th class="col-md-1">Action</th>
        </tr>
        </tbody>
        <tbody>
        <?php $__currentLoopData = $chartofaccount_L1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


          <?php 

          $chartofaccount_L2 = DB::table('chartofaccount')->where('L1',$value->ChartOfAccountID)->where('Level',2)->get();


           ?>

         <tr>
          <td class="col-md-1"><?php echo e($value->ChartOfAccountID); ?></td>
         <td class="col-md-4"><i class="far fa-folder" style="margin-left: -10px !important;"></i>&nbsp; <a  target="_blank" href="<?php echo e(URL('/JournalEntries/'.$value->ChartOfAccountID.'/2020-01-01'.'/'.date('Y-m-d'))); ?>"><?php echo e($value->ChartOfAccountName); ?></a></td>
          <td class="col-md-1"><?php echo e($value->L1); ?></td>
         <td class="col-md-1"><?php echo e($value->L2); ?></td>
         <td class="col-md-1"><?php echo e($value->L3); ?></td>
         <td class="col-md-1"  align="left"><a href="#"><i class="bx bx-lock-alt align-middle me-1 text-secondary"></i></a> </td>
         </tr>


            <?php $__currentLoopData = $chartofaccount_L2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 =>$value1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <?php 

          $chartofaccount_L3 = DB::table('chartofaccount')
                              ->where('L1',$value->ChartOfAccountID)
                              ->where('L2',$value1->ChartOfAccountID)
                              ->where('Level',3)->get();


           ?>
         

         <tr>
          <td class="col-md-1"><?php echo e($value1->ChartOfAccountID); ?></td>
         <td class="col-md-4">  <span><span class="display-node-name"> &nbsp;&nbsp;&nbsp;&nbsp; </span><!----> <span class="align-middle btn-link cursor-pointer "><a  target="_blank" href="<?php echo e(URL('/JournalEntries/'.$value1->ChartOfAccountID.'/2020-01-01'.'/'.date('Y-m-d'))); ?>"><strong><?php echo e($value1->ChartOfAccountName); ?></strong></a></span></span></td>
          <td class="col-md-1"><?php echo e($value1->L1); ?></td>
         <td class="col-md-1"><?php echo e($value1->L2); ?></td>
         <td class="col-md-1"><?php echo e($value1->L3); ?></td>
         <td class="col-md-1"><a href="<?php echo e(URL('/ChartOfAccountEdit/'.$value1->ChartOfAccountID)); ?>"><i class="bx bx-pencil align-middle me-1"></i></a> <a href="#" onclick="delete_confirm2('ChartOfAccountDelete',<?php echo e($value1->ChartOfAccountID); ?>)"><i class="bx bx-trash  align-middle me-1"></i></a></td>
         </tr>



          <?php $__currentLoopData = $chartofaccount_L3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 =>$value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

         <tr>
          <td class="col-md-1"><?php echo e($value2->ChartOfAccountID); ?></td>
         <td class="col-md-4">  <span><span class="leftline"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><!----> <span class="align-middle btn-link cursor-pointer "><a   class="text-secondary" target="_blank" href="<?php echo e(URL('/JournalEntries/'.$value2->ChartOfAccountID.'/2020-01-01'.'/'.date('Y-m-d'))); ?>"><i><?php echo e($value2->ChartOfAccountName); ?></i></a></span></span></td>
          <td class="col-md-1"><?php echo e($value2->L1); ?></td>
         <td class="col-md-1"><?php echo e($value2->L2); ?></td>
         <td class="col-md-1"><?php echo e($value2->L3); ?></td>
         <td class="col-md-1"><a href="<?php echo e(URL('/ChartOfAccountEdit/'.$value2->ChartOfAccountID)); ?>"><i class="bx bx-pencil align-middle me-1"></i></a> <a href="#" onclick="delete_confirm2('ChartOfAccountDelete',<?php echo e($value2->ChartOfAccountID); ?>)"><i class="bx bx-trash  align-middle me-1"></i></a></td>
         </tr>


        
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

        
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 



         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
         </tbody>
         </table>
       </div>
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
<script type="text/javascript">
$(document).ready(function() {
     $('#student_table').DataTable( );
});
</script>

 
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/al-molabi/resources/views/chartofaccount/chart_of_account.blade.php ENDPATH**/ ?>