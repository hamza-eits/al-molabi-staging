

<?php $__env->startSection('title', $pagetitle); ?>
 

<?php $__env->startSection('content'); ?>

<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid"><div class="row">
  <div class="col-12">
  
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

            
  <div class="card shadow-sm ">
      <div class="card-body">
          <form action="<?php echo e(URL('/PartiesUpdate')); ?>" method="post">
        <?php echo e(csrf_field()); ?>


        <input type="hidden" name="PartyID" value="<?php echo e($party[0]->PartyID); ?>">
<div>
<div >

<h4 class="card-title">Update Party / Customer</h4>
<p class="card-title-desc"></p>

 

<?php 
 $PartyName = old('PartyName') ? old('PartyName') : $party[0]->PartyName ;
$Address = old('Address') ? old('Address') : $party[0]->Address ;
$Phone = old('Phone') ? old('Phone') : $party[0]->Phone ;
$Email = old('Email') ? old('Email') : $party[0]->Email ;
$InvoiceDueDays = old('InvoiceDueDays') ? old('InvoiceDueDays') : $party[0]->InvoiceDueDays ;
$Active = old('Active') ? old('Active') : $party[0]->Active ;

 ?>




 
<div class="mb-1 row">
<label for="example-url-input" class="col-md-2 col-form-label fw-bold">Branch ID</label>
<div class="col-md-4">
<select name="BranchID" class="form-select">
  <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <option value="<?php echo e($branch->id); ?>" <?php echo e(($branch->id == $party[0]->BranchID) ? 'selected' : ''); ?>>
    <?php echo e($branch->name); ?>

    </option>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>
</div>

<div class="mb-1 row">
<label for="party-type" class="col-md-2 col-form-label fw-bold">Party Type</label>
<div class="col-md-4">
<select name="PartyType" class="form-select">
  <?php $__currentLoopData = $party_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <option value="<?php echo e($type->PartyCode); ?>" <?php echo e(($type->PartyCode == $party[0]->PartyType) ? 'selected' : ''); ?>>
    <?php echo e($type->PartyCode); ?>-<?php echo e($type->PartyCategory); ?>

  </option>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>
</div>
<div class="mb-1 row">
<label for="example-url-input" class="col-md-2 col-form-label fw-bold">Party/Customer Name</label>
<div class="col-md-4">
<input class="form-control" type="text" value="<?php echo e($PartyName); ?>" name="PartyName">
</div>
</div>



<div class="mb-1 row">
<label for="example-url-input" class="col-md-2 col-form-label fw-bold">Address</label>
<div class="col-md-4">
<input class="form-control" type="text"  name="Address" value="<?php echo e($Address); ?>"  >
</div>

</div>

<div class="mb-1 row">
<label for="example-url-input" class="col-md-2 col-form-label fw-bold">Phone</label>
<div class="col-md-4">
<input class="form-control" type="text"  name="Phone" value="<?php echo e($Phone); ?>" >
</div>

</div>

<div class="mb-1 row">
<label for="example-url-input" class="col-md-2 col-form-label fw-bold">Email</label>
<div class="col-md-4">
<input class="form-control" type="text"  name="Email" value="<?php echo e($Email); ?>"  >
</div>

</div>

<div class="mb-1 row">
<label for="example-url-input" class="col-md-2 col-form-label fw-bold">Invoice Due Days</label>
<div class="col-md-4">
<input class="form-control" type="number"  name="InvoiceDueDays" value="<?php echo e($InvoiceDueDays); ?>" >
</div>

</div>
 
  <div class="mb-1 row">
<label for="example-tel-input" class="col-md-2 col-form-label fw-bold">Active</label>
<div class="col-md-4">
<select name="Active" class="form-select" >

     
    <option value="Yes" <?php echo e(($Active== 'Yes') ? 'selected=selected':''); ?>>Yes</option>
    <option value="No" <?php echo e(($Active== 'No') ? 'selected=selected':''); ?>>No</option>
    
    


</select> </div>
 </div>
 


 
 
                                      
                                    
                                   
    
                                      
                                        

                                       

                                    </div>
                                 
                                </div>

                         





      </div>
         <div class="card-footer  ">
                                       <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Update</button>


                                       
                                       
                <a href="<?php echo e(URL('/Parties')); ?>" class="btn btn-outline-secondary waves-effect">Cancel</a>
                                    </div>
  </div>
                                <!-- card end here -->
  </form>

 
  
  </div>
</div>

        </div>
      </div>
    </div>
 
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/al-molabi/resources/views/party_edit.blade.php ENDPATH**/ ?>