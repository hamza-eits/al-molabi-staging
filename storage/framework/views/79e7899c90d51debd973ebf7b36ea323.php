

<?php $__env->startSection('title', $pagetitle); ?>


<?php $__env->startSection('content'); ?>


<div class="main-content">

  <div class="page-content">
    <div class="container-fluid">

      <div class="row ">
        <div class="col-12">
          <h2 class=" float-start mb-0">Supplier Balance</h2>

        </div>
      </div>


    </div>
    <div class="row">
      <div class="col-12">

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


        <div class="card">
          <div class="card-body">
            <!-- enctype="multipart/form-data" -->
            <form action="<?php echo e(URL('/SupplierBalance1')); ?>" method="post" name="form1" id="form1"> <?php echo e(csrf_field()); ?>



              <div class="col-md-4">
                <div class="mb-1">
                  <label for="basicpill-firstname-input">Branch</label>
                  <select name="BranchID" id="" class="select2 form-select" id="select2-basic" required="">
                      <?php if(session('UserType') == 'SuperAdmin'): ?>
                      <option value="0">All Branches</option>
                      <?php endif; ?>
                    <?php foreach ($branches as $key => $value): ?>
                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->id); ?>-<?php echo e($value->name); ?></option>

                    <?php endforeach ?>
                  </select>
                </div>
              </div>   


         <div class="col-md-4">
              <div class="mb-0">
                <label for="basicpill-firstname-input">Report Type</label>
                <select name="ReportType" id="" class="  form-select" id="select2-basic">
                  <option value="-1" selected>Debitor & Creditor</option>
                  <option value="D">Debitor Customer</option>
                  <option value="C">Creditor Customer</option>

                </select>
              </div>
            </div>





                <!--
                  Render a component for selecting start and end dates.
                  file path: resources\views\components\start-end-date.blade.php
                -->
                <?php if (isset($component)) { $__componentOriginal7c2a66411e0a6bf1a6dfa21bd807e9d5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c2a66411e0a6bf1a6dfa21bd807e9d5 = $attributes; } ?>
<?php $component = App\View\Components\StartEndDate::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('start-end-date'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\StartEndDate::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c2a66411e0a6bf1a6dfa21bd807e9d5)): ?>
<?php $attributes = $__attributesOriginal7c2a66411e0a6bf1a6dfa21bd807e9d5; ?>
<?php unset($__attributesOriginal7c2a66411e0a6bf1a6dfa21bd807e9d5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c2a66411e0a6bf1a6dfa21bd807e9d5)): ?>
<?php $component = $__componentOriginal7c2a66411e0a6bf1a6dfa21bd807e9d5; ?>
<?php unset($__componentOriginal7c2a66411e0a6bf1a6dfa21bd807e9d5); ?>
<?php endif; ?>


              





          </div>
          <div class="card-footer bg-light">
            <button type="submit" class="btn btn-success w-lg float-right" id="online">Submit</button>
            <button type="submit" class="btn btn-success w-lg float-right" id="pdf">PDF</button>
            <a href="<?php echo e(URL('/')); ?>" class="btn btn-secondary w-lg float-right">Cancel</a>
          </div>
        </div>
        </form>
      </div>
    </div>

  </div>
</div>
</div>
<!-- END: Content-->

<!-- END: Content-->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

<script>
  $(document).ready(function(){
    $('#pdf').click(function(event){
        event.preventDefault();
        $('#form1').removeAttr('target');
        $('#form1').attr('action', '<?php echo e(URL("/SupplierBalance1PDF")); ?>');
        $('#form1').submit();
    });
    $('#online').click(function(event){
        event.preventDefault();
        $('#form1').removeAttr('target');
        $('#form1').attr('action', '<?php echo e(URL("/SupplierBalance1")); ?>');
        $('#form1').submit();
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/al-molabi/resources/views/reports/supplier_balance.blade.php ENDPATH**/ ?>