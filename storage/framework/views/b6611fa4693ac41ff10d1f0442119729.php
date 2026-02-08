<?php $__env->startSection('title', 'Compaign'); ?>
 

<?php $__env->startSection('content'); ?>



<div class="main-content">

 <div class="page-content">
 <div class="container-fluid">
  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-print-block d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Campaign List</h4>
                                       <div class="col d-flex justify-content-end">
                                <button type="button" id="importButton" class="btn btn-primary mr-2" data-bs-toggle="modal" data-bs-target=".compaignadd">
                                    Add New
                                </button>
                            </div>    
 
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
 
            
  <div class="card">
      <div class="card-body">


               <table id="campaign-table" class="table table-sm table-hover w-100">
                                    <thead >
                                        <tr>
                                            <th width="5%">S.No</th>
                                            <th width="80%">Name</th>
                                            <th width="5%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(++$key); ?></td>
                                                <td><?php echo e($item->name); ?></td>
                                                <td>
                                                    <a href="#" onclick="edit_campaign(<?php echo e($item->id); ?>)">
                                                        <i class="mdi mdi-pencil font-size-18 align-middle text-secondary"></i>
                                                    </a>
                                                    <a href="#"
                                                        onclick="delete_confirm_n(`campaignDelete`,'<?php echo e($item->id); ?>')">
                                                        <i class="mdi mdi-delete font-size-18 align-middle me-1 text-danger"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>     
      </div>
  </div>
  
  </div>
</div>

        </div>
   


    <!-- END: Content-->
  <!-- Modal -->
        <div class="modal fade compaignadd" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Campaign</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php echo e(route('campaign.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="card1">
                                <div class="card-body1">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for=""><strong>Campaign Name: *</strong></label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                             <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Update Campaign</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <form action="<?php echo e(route('campaign.update')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="card1">
                                <div class="card-body1">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for=""><strong>Campaign Name: *</strong></label>
                                            <input type="text" class="form-control" id="updateName" name="name"
                                                required>
                                                <input type="hidden" name="campaign_id"  id="update_campaign_id">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                             <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>


                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#campaign-table').DataTable({
                columnDefs: [{
                        orderable: false,
                        targets: [0,2]
                    } // Disable ordering for the first column (checkbox)
                ]
            });
        });
    </script>
    <script>
        function delete_confirm_n(url, id) {
            // alert(url);
            // alert(id);
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    url = "<?php echo e(URL::TO('/')); ?>/" + url + '/' + id;
                    window.location.href = url;
                }
            });

        };

        function edit_campaign(id) {
             $.ajax({
                url: 'campaignEdit/' + id,
                type: 'GET',
                success: function(response) {
                    if (response.data) {
                        $('#update_campaign_id').val(response.data.id);
                        $('#updateName').val(response.data.name);
                        $('#editModal').modal('show');
                    } else {
                        alert(response.error);
                    }

                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    alert(xhr.responseText);
                    console.error(xhr.responseText);
                }
            })
        };
    </script>
  <?php $__env->stopSection(); ?>

 
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/al-molabi/resources/views/campaigns/index.blade.php ENDPATH**/ ?>