

<?php $__env->startSection('title', $pagetitle); ?>
 

<?php $__env->startSection('content'); ?>

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
        <form action="<?php echo e(URL('/ChartOfAccountUpdate')); ?>" method="post">
         <?php echo e(csrf_field()); ?> 
             <input type="hidden" name="ChartOfAccountID" value="<?php echo e(request()->id); ?>">

         <div class="card-body">
      <h5 class="mb-3">Level 3</h5>
          <div class="col-md-12 col-sm-12">
               <div class="mb-3 row">
                  <div class="col-sm-3">
                    <label class="col-form-label fw-bold" for="first-name">Parent Head</label>
                  </div>
                  <div class="col-sm-9">
                    <select name="ChartOfAccountIDold" id="ChartOfAccountIDold" class="form-select select2">
                         <?php foreach ($chartofaccount_l2 as $key => $value): ?>
                          <option value="<?php echo e($value->ChartOfAccountID); ?>" <?php echo e(($value->ChartOfAccountID== $chartofaccount[0]->L2) ? 'selected=selected':''); ?>><?php echo e($value->ChartOfAccountID); ?>-<?php echo e($value->ChartOfAccountName); ?></option>
                        <?php endforeach ?>
                  
                      </select>
                  </div>
                </div>

                <div class="mb-3 row">
                  <div class="col-sm-3">
                    <label class="col-form-label fw-bold" for="first-name">Chart of Acc</label>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" id="first-name" class="form-control" name="ChartOfAccountName" value="<?php echo e($chartofaccount[0]->ChartOfAccountName); ?>" >
                  </div>
                </div>

               
  <div class="mb-3 row">
                  <div class="col-sm-3">
                    <label class="col-form-label fw-bold" for="first-name">Type ( if Bank/Card)</label>
                  </div>
                  <div class="col-sm-9">
                    <select name="Category" id="Category" class="form-select">
                      <option value="0">Select </option>
                      <option value="CASH">CASH</option>
                      <option value="BANK">BANK</option>
                      <option value="CARD">CARD</option>
                    </select>
                  </div>
                </div>

            
             

              
                


              </div>
               <div class="card-footer bg-transparent">
        
        <div><button type="submit" class="btn btn-success w-sm float-right">Save</button>
             <a href="<?php echo e(URL('/ChartOfAcc')); ?>" class="btn btn-secondary w-sm float-right">Cancel</a>
        
        
      </div>
  </div>
      </div>


    </form>


    </div>
   </div>
     
  
  </div>

  

 
  
  </div>
</div>

        </div>
      </div>
    </div>
    <!-- END: Content-->
 
 
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/rotana_sky/resources/views/chartofaccount/chart_of_account_edit.blade.php ENDPATH**/ ?>