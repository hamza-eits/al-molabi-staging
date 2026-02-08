

<?php $__env->startSection('title', $pagetitle); ?>
 

<?php $__env->startSection('content'); ?>
  <!-- BEGIN: Content-->

    <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid"><div class="row">

                      <div class="row">


 <?php if(session('error')): ?>

<div class="alert alert-<?php echo e(Session::get('class')); ?> p-3"  id="success-alert">
                    
                  <strong><?php echo e(Session::get('error')); ?> </strong>
                </div>

<?php endif; ?>

  <?php if(count($errors) > 0): ?>
                                 
                            <div >
                <div class="alert alert-danger p-1   border-1 bg-danger text-white">
                   <p class="font-weight-bold"> There were some problems with your input.</p>
                    <ul>
                        
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                </div>

            <?php endif; ?>


  <div class="col-12">
  
  <!-- enctype="multipart/form-data" -->
  <form action="<?php echo e(URL('/ItemUpdate')); ?>" method="post"> 
<input type="hidden" name="ItemID" value="<?php echo e($item[0]->ItemID); ?>">

  <?php echo e(csrf_field()); ?> 

<div class="card shadow-sm">
    <div class="card-header">
      <h2>Item</h2>
    </div>
      <div class="card-body">
         <div class="col-md-6">
                <div class="mb-1 row">
                  <div class="col-sm-2">
                  <label class="col-form-label fw-bold" for="BranchID">Branch</label>
                  </div>
                  <div class="col-sm-9">
                  <select name="BranchID" id="BranchID" class="form-select">
                    <option value="">Select Branch</option>
                    <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($branch->id); ?>" <?php echo e(($branch->id == $item[0]->BranchID) ? 'selected' : ''); ?>>
                      <?php echo e($branch->name); ?>

                      </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  </div>
                </div>

                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label fw-bold" for="first-name">Item Name</label>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" id="first-name" class="form-control" name="ItemName" placeholder="Item Name" value="<?php echo e($item[0]->ItemName); ?>">
                  </div>
                </div>

                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label fw-bold" for="first-name">Taxable</label>
                  </div>
                 
                  <?php 
$Taxable = old('Taxable') ? old('Taxable') : $item[0]->Taxable ;
 ?>
                  <div class="col-sm-9">
                    <select name="Taxable" id="Taxable" class="form-select">
                        <option value="">Select</option>
                        <option value="No" <?php echo e(($Taxable== 'No') ? 'selected=selected':''); ?>>No</option>
                        <option value="Yes" <?php echo e(($Taxable== 'Yes') ? 'selected=selected':''); ?>>Yes</option>
                  
                      </select>
                  </div>
                </div>

                <div class="mb-1 row">
                  <div class="col-sm-2">
                    <label class="col-form-label fw-bold" for="first-name">Percentage</label>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" id="Percentage"   class="form-control" name="Percentage" value="<?php echo e($item[0]->Percentage); ?>">
                  </div>
                </div>

             

              
                


              </div>
      </div>
      <div class="card-footer bg-light">
        
        <div><button type="submit" class="btn btn-success w-lg float-right">Update</button>
             <a href="<?php echo e(URL('/Item')); ?>" class="btn btn-secondary w-lg float-right">Cancel</a>
        
        
      </div>
  </div>
  
  </div>

  </form>

<!-- card end here -->



 

  

</div>

        </div>
      </div>
    </div>
    <!-- END: Content-->


         <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


<script>
  $(document).on('change ','#Taxable',function(){
  if($('#Taxable').val()=='Yes')
  {
     $("#Percentage").prop("disabled", false);
     $("#Percentage").focus();
     $("#Percentage").attr("placeholder", "5").placeholder();

  }
  else
  {
    $("#Percentage").prop("disabled", true);
    $("#Percentage").removeAttr("placeholder");
  }

  

});


 

 

</script>

 




</script>
<script type="text/javascript">
$(document).ready(function() {
     $('#student_table').DataTable( );
});
</script>
 
  <?php $__env->stopSection(); ?>



<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/rotana_sky/resources/views/item_edit.blade.php ENDPATH**/ ?>