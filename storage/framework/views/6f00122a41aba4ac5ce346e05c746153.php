

<?php $__env->startSection('title', $pagetitle); ?>
 

<?php $__env->startSection('content'); ?>
<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid"><div class="row">
  <div class="col-12">
  
   <?php if(session('error')): ?>
  
  <div class="alert alert-<?php echo e(Session::get('class')); ?> p-3"  id="success-alert">
                      
                    <strong><?php echo e(Session::get('error')); ?> </strong>
                  </div>
  
  <?php endif; ?>
  
    <?php if(count($errors) > 0): ?>
                                   
                              <div >
                  <div class="alert alert-danger p-5 border-1 bg-danger text-white">
                     <p class="font-weight-bold"> There were some problems with your input.</p>
                      <ul>
                          
                          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li><?php echo e($error); ?></li>
  
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ul>
                  </div>
                  </div>
  
              <?php endif; ?>
  
 <!-- enctype="multipart/form-data" -->
 <form action="<?php echo e(URL('/ItemSave')); ?>" method="post"> 
 <?php echo e(csrf_field()); ?> 
 <div class="card shadow-sm">
    <div class="card-header">
      <h2>Item</h2>
    </div>
      <div class="card-body">
         <div class="col-md-6 col-sm-12">
            <div class="mb-3 row">
          <div class="col-sm-2">
            <label class="col-form-label fw-bold" for="branch">Branch</label>
          </div>
          <div class="col-sm-9">
            <select name="BranchID" id="branch" class="form-select">
            <option value="">For all branches</option>
            <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
            </div>

            <div class="mb-3 row">
          <div class="col-sm-2">
            <label class="col-form-label fw-bold" for="first-name">Item Code</label>
          </div>
          <div class="col-sm-9">
            <input type="text" id="first-name " class="form-control" name="ItemCode" placeholder="Item Code">
          </div>
            </div>

            <div class="mb-3 row">
          <div class="col-sm-2">
            <label class="col-form-label fw-bold" for="first-name">Item Name</label>
          </div>
          <div class="col-sm-9">
            <input type="text" id="first-name" class="form-control" name="ItemName" placeholder="Item Name">
          </div>
            </div>

            <div class="mb-3 row">
          <div class="col-sm-2">
            <label class="col-form-label fw-bold" for="first-name">Taxable</label>
          </div>
          <div class="col-sm-9">
            <select name="Taxable" id="Taxable" class="form-select">
            <option value="">Select</option>
            <option value="No" selected="">No</option>
            <option value="Yes">Yes</option>
           </select>
          </div>
            </div>

            <div class="mb-1 row">
          <div class="col-sm-2">
            <label class="col-form-label fw-bold" for="first-name">Percentage</label>
          </div>
          <div class="col-sm-9">
            <input type="text" id="Percentage" disabled="" class="form-control" name="Percentage" value="0" >
          </div>
            </div>
          </div>
      </div>
      <div class="card-footer">
        
        <div><button type="submit" class="btn btn-success w-lg float-right">Save</button>
             <a href="<?php echo e(URL('/')); ?>" class="btn btn-secondary w-lg float-right">Cancel</a>
        
        
      </div>
  </div>
  
  </div>
  </form>

<!-- card end here -->



<div class="card">
    <div class="card-body">
  <?php if(count($item)>0): ?>    
  <div class="table-responsive">
<table class=" table table-striped align-middle table-nowrap mb-0" id="student_table">
<thead><tr>
<th scope="col">S.No</th>
<th scope="col">Item Code</th>
<th scope="col">Name</th>
<th scope="col">Branch</th>
<th scope="col">Taxable</th>
<th scope="col">Tax %</th>
<th scope="col">Action</th>
</tr>
</thead>
<tbody>
<?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <tr>
 <td class="col-md-"><?php echo e($key+1); ?></td>
 <td class="col-md-2"><?php echo e($value->ItemCode); ?></td>
 <td class="col-md-7"><?php echo e($value->ItemName); ?></td>
 <td class="col-md-2"><?php echo e($value->branch->name ?? 'N/A'); ?></td>
 <td class="col-md-1"><?php echo e($value->Taxable); ?></td>
 <td class="col-md-1"><?php echo e($value->Percentage); ?></td>
 <td class="col-md-2"><a href="<?php echo e(URL('/ItemEdit/'.$value->ItemID)); ?>"><i class=" text-dark bx bx-pencil align-middle me-1"></i></a> <a href="#" onclick="delete_confirm2('ItemDelete',<?php echo e($value->ItemID); ?>)"><i class="bx bx-trash text-dark  align-middle me-1"></i></a>  </td>
 </tr>
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



<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/rotana_sky/resources/views/item.blade.php ENDPATH**/ ?>