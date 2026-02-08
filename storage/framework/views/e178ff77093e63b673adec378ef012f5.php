

<?php $__env->startSection('title', $pagetitle); ?>
 

<?php $__env->startSection('content'); ?>

<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
  
  <?php if(session('error')): ?>

 <div class="alert alert-<?php echo e(Session::get('class')); ?> p-1" id="success-alert">
                    
                   <?php echo e(Session::get('error')); ?>  
                </div>

<?php endif; ?>

 <?php if(count($errors) > 0): ?>
                                 
                            <div >
                <div class="alert alert-danger p-2 border-1">
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
      <div class="card-body">
          <form action="<?php echo e(URL('/SaveParties')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

<div>
<div >

<h4 class="card-title">Add Party / Customer</h4>
<p class="card-title-desc"></p>

 



<div class="mb-1 row">
<label for="example-url-input" class="col-md-2 col-form-label fw-bold">Branch</label>
<div class="col-md-4">
<select name="BranchID" class="form-select">
  <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($branch->id); ?>" <?php echo e((old('BranchID') == $branch->id) ? 'selected=selected' : ''); ?>>
      <?php echo e($branch->name); ?>

    </option>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>
</div>

<div class="mb-1 row">
<label for="example-url-input" class="col-md-2 col-form-label fw-bold">Party Type</label>
<div class="col-md-4">
<select name="PartyType" class="form-select">
  <?php $__currentLoopData = $party_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($type->PartyCode); ?>" <?php echo e((old('PartyType') == $type->PartyCode) ? 'selected=selected' : ''); ?>>
      <?php echo e($type->PartyCode); ?>-<?php echo e($type->PartyCategory); ?>

    </option>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
</select>
</div>
</div>

<div class="mb-1 row">
<label for="example-url-input" class="col-md-2 col-form-label fw-bold">Party Name</label>
<div class="col-md-4">
<input class="form-control" type="text" value="<?php echo e(old('PartyName')); ?>" name="PartyName">
</div>

</div>
<div class="mb-1 row">
<label for="example-url-input" class="col-md-2 col-form-label fw-bold">Address</label>
<div class="col-md-4">
<input class="form-control" type="text"  name="Address" value="<?php echo e(old('Address')); ?>"  >
</div>

</div>

<div class="mb-1 row">
<label for="example-url-input" class="col-md-2 col-form-label fw-bold">Phone</label>
<div class="col-md-4">
<input class="form-control" type="text"  name="Phone" value="<?php echo e(old('Phone')); ?>" >
</div>

</div>

<div class="mb-1 row">
<label for="example-url-input" class="col-md-2 col-form-label fw-bold">Email</label>
<div class="col-md-4">
<input class="form-control" type="text"  name="Email" value="<?php echo e(old('Email')); ?>"  >
</div>

</div>

<div class="mb-1 row">
<label for="example-url-input" class="col-md-2 col-form-label fw-bold">Invoice Due Days</label>
<div class="col-md-4">
<input class="form-control" type="number"  name="InvoiceDueDays" value="<?php echo e(old('InvoiceDueDays')); ?>" >
</div>

</div>
 
  <div class="mb-1 row">
<label for="example-tel-input" class="col-md-2 col-form-label fw-bold">Active</label>
<div class="col-md-4">
<select name="Active" class="form-select" >

     
    <option value="Yes" <?php echo e((old('Active')== 'Yes') ? 'selected=selected':''); ?>>Yes</option>
    <option value="No" <?php echo e((old('Active')== 'No') ? 'selected=selected':''); ?>>No</option>
    
    


</select> </div>
 </div>
 


 
 
                                      
                                    
                                   
    
                                      
                                        

                                       

                                    </div>
                                 
                                </div>

                         





      </div>
         <div class="card-footer  ">
                                       <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>


                                       
                                       
                <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                    </div>
  </div>
                                <!-- card end here -->
  </form>

 <div class="row">
      <div class="col-lg-12">
          
          <div class="card">
              
          <div class="card-body">
            <h4 class="card-title ">Party / Customer Detail</h4>
             <!-- <p class="card-title-desc"> Add <code>.table-sm</code> to make tables more compact by cutting cell padding in half.</p>  -->   
                                        
       <div class="table-responsive">
        <table class="table table-striped  table-sm  m-0" id="student_table">
            <thead>
               <tr>
                <th>Party Code</th>
                <th>Type</th>
                <th>Name</th>
                <th>Branch</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                 
                <th>Invoice Due Days</th>
                <th>Action</th>
              </tr>
             </thead>
            <tbody>
              <?php $__currentLoopData = $party; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($value->PartyID); ?></td>
                <td><?php echo e($value->PartyType); ?></td>
                <td><?php echo e($value->PartyName); ?></td>
                <td><?php echo e($value->branch->name ?? 'N/A'); ?></td> <!-- Ensure 'name' matches the branch model's attribute -->
                <td><?php echo e($value->Address); ?></td>
                <td><?php echo e($value->Phone); ?></td>
                <td><?php echo e($value->Email); ?></td>
                <td><?php echo e($value->Active); ?></td>
                <td>
                  <div class="d-flex gap-1">
                    <a href="<?php echo e(URL('/PartiesEdit/'.$value->PartyID)); ?>" class="text-secondary">
                      <i class="mdi mdi-pencil font-size-15"></i>
                    </a>
                    <a href="#" class="text-secondary" onclick="delete_confirm2('PartiesDelete',<?php echo e($value->PartyID); ?>)">
                      <i class="mdi mdi-delete font-size-15"></i>
                    </a>
                  </div>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
              </tbody>
               </table>
        
 
        
                   </div>
          </div>
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
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/rotana_sky/resources/views/party.blade.php ENDPATH**/ ?>