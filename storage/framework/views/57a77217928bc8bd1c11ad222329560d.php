<?php $__env->startSection('title', 'Lead Create'); ?>
<?php $__env->startSection('content'); ?>


<div class="main-content">

 <div class="page-content">
 <div class="container-fluid">



    <div class="content-wrapper">
        <div class="row" style="height: 81vh; overflow: auto;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h3 >Add Lead Details</h3>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <a href="<?php echo e(url('leads')); ?>" class="btn btn-primary btn-rounded ">Back</a>
                            </div>
                        </div>
                    </div>





                    <div class="card-body">
                        <small class="text-primary"><em>Input fields marked with * are the required fields</em></small>
                        <hr>
                        <form action="<?php echo e(url('storelead')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <label for="name"><strong>Customer/Lead Full Name: </strong></label>
                                    <input required type="text" name="name" id="name"  class="form-control"
                                        value="<?php echo e(old('name')); ?>">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <label for="tel"><strong>Contact / Email: *</strong></label>
                                    <input type="tel" name="tel" id="tel" required class="form-control"
                                        value="<?php echo e(old('tel')); ?>">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <label for="tel"><strong>Alternate Number:</strong></label>
                                    <input type="tel" name="other_tel" id="tel" class="form-control"
                                        value="<?php echo e(old('other_tel')); ?>">
                                </div>
                                
                                
                                <div class="col-lg-4 col-md-6 col-sm-12 d-none">
                                    <label for="business_details"><strong>Business Details:</strong></label>
                                    <input type="text" name="business_details" id="business_details" class="form-control"
                                        value="<?php echo e(old('business_details')); ?>">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 d-none">
                                    <label for="service"><strong>Service:</strong></label>
                                    <input type="text" name="service" id="service" class="form-control"
                                        value="<?php echo e(old('service')); ?>">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <label for="channel"><strong>Channel:</strong></label>
                                    <select name="channel" id="channel" class="form-select select2">
                                        

                                         <?php $__currentLoopData = $channel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($value->ChannelName); ?>" ><?php echo e($value->ChannelName); ?></option>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                        
                                    </select>
                                </div>
                                
                                
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <label for="branch_id"><strong>Branch:</strong></label>
                                    <select name="branch_id" id="branch_id" class="form-select select2">
                                        <option value="" selected>--Select Branch--</option>
                                        <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"
                                                <?php echo e(old('branch_id') == $item->id ? 'selected' : ''); ?>> <?php echo e($item->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <label for="branch_service"><strong>Branch Service:</strong></label>
                                    <select name="service_id" id="service_id" class="form-select select2">
                                        <option value="">--Select One--</option>
                                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($service->id); ?>"
                                                <?php echo e(old('service_id') == $service->id ? 'selected' : ''); ?>>
                                                <?php echo e($service->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 d-none" id="subServiceCol">
                                    <label for="branch_sub_service"><strong>Branch Sub Service:</strong></label>
                                    <select name="sub_service_id" id="sub_service_id" class="form-control">
                                        <option value="">--Select One--</option>
                                        <?php $__currentLoopData = $subServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subservice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($subservice->id); ?>"
                                                <?php echo e(old('sub_service_id') == $subservice->id ? 'selected' : ''); ?>>
                                                <?php echo e($subservice->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                
                                
                                <div class="col-lg-4 col-md-6 col-sm-12 d-none">
                                    <label for="currency"><strong>Currency:</strong></label>
                                    <select name="currency" id="currency" class="form-select select2">
                                        
                                        <option value="AED" <?php echo e(old('currency') == 'AED' ? 'selected' : ''); ?>>AED
                                        </option>
                                        <option value="USD" <?php echo e(old('currency') == 'USD' ? 'selected' : ''); ?>>USD
                                        </option>
                                        
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 d-none">
                                    <label for="amount"><strong>Quoted Amount:</strong></label>
                                    <input type="number" step="0.001" name="amount" id="amount" class="form-control"
                                        value="<?php echo e(old('amount')); ?>">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <label for="agent_id"><strong>Agent:</strong></label>
                                    <select name="agent_id" id="agent_id" class="form-select select2">
                                        <option value="">--Select Agent--</option>
                                        <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($agent->UserID); ?>"
                                                <?php echo e(old('agent_id') == $agent->UserID ? 'selected' : ''); ?>><?php echo e($agent->FullName); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                
                                
                                <div class="col-md-4 col-sm-12 d-none">
                                    <label for="lead_status"><strong>Campaign:</strong></label>
                                    <select name="campaign_id" id="campaign_id" class="form-select select2">
                                        <option value="">--Select Campaign--</option>
                                        <?php $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($campaign->id); ?>"<?php echo e(old('campaign_id') == $campaign->id ? 'selected' : ''); ?>>
                                                <?php echo e($campaign->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#branch_id').change(function() {
                const selectedBranchID = $(this).val();
                if (selectedBranchID != '') {
                     // alert(selectedBranchID);
                    $.ajax({
                        url: 'ajaxGetAgents/' + selectedBranchID,
                        type: 'GET',
                        success: function(response) {
                            if (response.data.length > 0) {
                                const agents = response.data;
                                $('#agent_id').empty();
                                $('#agent_id').append(
                                    '<option value="">--Select Agent--</option>');
                                agents.forEach(agent => {
                                    $('#agent_id').append(
                                        '<option value="' + agent.UserID + '">' + agent
                                        .FullName + '</option>'
                                    );
                                    console.log(agent.name);
                                });
                                // Handle the successful response here
                                // console.log(response.data.name);
                            } else {
                                $('#agent_id').empty(); // Clear existing options
                                $('#agent_id').append(
                                    '<option value="">--No Agents--</option>');
                            }

                        },
                        error: function(xhr, status, error) {
                            // Handle errors here
                            alert(xhr.responseText);
                            console.error(xhr.responseText);
                        }
                    });
                    $.ajax({
                        url: 'ajaxGetServices/' + selectedBranchID,
                        type: 'GET',
                        success: function(response) {
                            if (response.data.length > 0) {
                                const services = response.data;
                                $('#service_id').empty();
                                $('#service_id').append(
                                    '<option value="">--Select Service--</option>');
                                services.forEach(service => {
                                    $('#service_id').append(
                                        '<option value="' + service.id + '">' +
                                        service
                                        .name + '</option>'
                                    );
                                    console.log(service.name);
                                });
                                // Handle the successful response here
                                console.log(response.data.name);
                            } else {
                                $('#service_id').empty(); // Clear existing options
                                $('#service_id').append(
                                    '<option value="">--No Service--</option>');
                            }

                        },
                        error: function(xhr, status, error) {
                            // Handle errors here
                            alert(xhr.responseText);
                            console.error(xhr.responseText);
                        }
                    })
                } else {
                    $.ajax({
                        url: 'ajaxGetAgents',
                        type: 'GET',
                        success: function(response) {
                            if (response.data.length > 0) {
                                const agents = response.data;
                                $('#agent_id').empty();
                                $('#agent_id').append(
                                    '<option value="">--Select Agent--</option>');
                                agents.forEach(agent => {
                                    $('#agent_id').append(
                                        '<option value="' + agent.UserID + '">' + agent
                                        .FullName + '</option>'
                                    );
                                    console.log(agent.FullName);
                                });
                                // Handle the successful response here
                                console.log(response.data.FullName);
                            } else {
                                $('#agent_id').empty(); // Clear existing options
                                $('#agent_id').append(
                                    '<option value="">--No Agents--</option>');
                            }

                        },
                        error: function(xhr, status, error) {
                            // Handle errors here
                            alert(xhr.responseText);
                            console.error(xhr.responseText);
                        }
                    });
                    $.ajax({
                        url: 'ajaxGetServices',
                        type: 'GET',
                        success: function(response) {
                            if (response.data.length > 0) {
                                const services = response.data;
                                $('#service_id').empty();
                                $('#service_id').append(
                                    '<option value="">--Select Service--</option>');
                                services.forEach(service => {
                                    $('#service_id').append(
                                        '<option value="' + service.id + '">' +
                                        service
                                        .name + '</option>'
                                    );
                                    console.log(service.name);
                                });
                                // Handle the successful response here
                                console.log(response.data.name);
                            } else {
                                $('#service_id').empty(); // Clear existing options
                                $('#service_id').append(
                                    '<option value="">--No Service--</option>');
                            }

                        },
                        error: function(xhr, status, error) {
                            // Handle errors here
                            alert(xhr.responseText);
                            console.error(xhr.responseText);
                        }
                    })
                }

            });
            $('#service_id').change(function() {
                const selectedServiceID = $(this).val();
                if (selectedServiceID != '') {
                    // alert(selectedBranchID);
                    // $('#subServiceCol').removeClass('d-none');
                    $.ajax({
                        url: 'ajaxGetSubservices/' + selectedServiceID,
                        type: 'GET',
                        success: function(response) {
                            if (response.data.length > 0) {
                                const subServices = response.data;
                                $('#sub_service_id').empty();
                                $('#sub_service_id').append(
                                    '<option value="">--Select Sub Service--</option>');
                                subServices.forEach(subService => {
                                    $('#sub_service_id').append(
                                        '<option value="' + subService.id + '">' +
                                        subService
                                        .name + '</option>'
                                    );
                                    console.log(subService.name);
                                });
                                // Handle the successful response here
                                // console.log(response.data.name);
                            } else {
                                $('#sub_service_id').empty(); // Clear existing options
                                $('#sub_service_id').append(
                                    '<option value="">--No Sub Services--</option>');
                            }

                        },
                        error: function(xhr, status, error) {
                            // Handle errors here
                            alert(xhr.responseText);
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    $('#sub_service_id').empty();
                    // $('#subServiceCol').addClass('d-none');

                }

            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/al-molabi/resources/views/leads/create.blade.php ENDPATH**/ ?>