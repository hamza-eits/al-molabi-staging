<?php $__env->startSection('title', $pagetitle); ?>

<?php $__env->startSection('content'); ?>

<!-- BEGIN: Content-->

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            
            <div class="row d-sm-flex align-items-center justify-content-between">
                <div class="col-md-4">
                    <div class="page-title-box">
                        <h4 class="mb-sm-0 font-size-18 pt-3">Supplier Ledger: <?php echo e($supplier[0]->PartyID."- ".$supplier[0]->PartyName); ?></h4>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <form method="post" name="form1" id="form1" class="form-inline w-100 d-flex align-items-center">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="ChartOfAccountID" value="<?php echo e(request()->ChartOfAccountID); ?>">
                        <input type="hidden" name="SupplierID" value="<?php echo e(request()->SupplierID); ?>">
            
                        <div class="col-md-4">
                            <div class="form-group mx-2 ">
                                <input type="date" class="form-control" id="StartDate" name="StartDate" value="<?php echo e(request()->StartDate); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mx-2">
                                <input type="date" class="form-control" id="EndDate" name="EndDate" value="<?php echo e(request()->EndDate); ?>">
                            </div>
                        </div>
            
                        <div class="form-group ms-auto d-flex gap-2">
                            <button type="submit" class="btn btn-success w-md" id="online">Submit</button>
                            <button type="submit" class="btn btn-primary w-md" id="excel">Export to Excel</button>
                        </div>
                    </form>
                </div>
            </div>
            
   <?php
    use Illuminate\Support\Str;
?>         
            
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <?php if(session('error')): ?>
                    <div class="alert alert-<?php echo e(Session::get('class')); ?> p-1" id="success-alert">
                        <?php echo e(Session::get('error')); ?>

                    </div>
                    <?php endif; ?>

                    <?php if(count($errors) > 0): ?>
                    <div>
                        <div class="alert alert-danger p-1 border-3">
                            <p class="font-weight-bold">There were some problems with your input.</p>
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php 
                        $DrTotal=0;
                        $CrTotal=0;
                    ?>
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <?php if(count($journal)>0): ?>
                            <table class="table table-sm table-bordered table-striped align-middle  mb-0">
                                <tbody>
                                    <tr>
                                        <th class="col-md-1 text-center">DATE</th>
                                        <th class="col-md-1 text-center">VHNO</th>
                                        <th class="col-md-1 text-center">Type</th>
                                        <th class="col-md-5 text-center">Description</th>
                                        <th class="col-md-1 text-center">DR</th>
                                        <th class="col-md-1 text-center">CR</th>
                                        <th class="col-md-1 text-center">Balance</th>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-danger text-end">Opening Balance</td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-danger text-end"><?php echo e(number_format( $sql[0]->Balance,2)); ?></td>
                                    </tr>
                                    <?php $__currentLoopData = $journal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center"><?php echo e(dateformatman($value->Date)); ?></td>
                                        <td class="text-center"><a href="<?php echo e(Str::startsWith($value->VHNO, 'SI') ? URL('/InvoiceEdit/'.$value->InvoiceMasterID) : URL('/UmrahEdit/'.$value->InvoiceMasterID)); ?>" target="_blank">
    <?php echo e($value->VHNO); ?>

</a></td>
                                        <td class="text-center"><a href="<?php echo e(URL('/VoucherEdit/'.$value->VoucherMstID)); ?>" target="_blank"><?php echo e($value->JournalType); ?></a></td>
                                        <td><?php echo e($value->Narration); ?></td>
                                        <td class="text-end"><?php echo e($value->Dr ? number_format($value->Dr, 2) : ''); ?></td>
                                        <td class="text-end"><?php echo e($value->Cr ? number_format($value->Cr, 2) : ''); ?></td>
                                        <td class="text-end">
                                            <?php 
                                                if (!isset($balance)) { 
                                                    $balance = $sql[0]->Balance + ($value->Dr - $value->Cr);
                                                    $DrTotal += $value->Dr;
                                                    $CrTotal += $value->Cr;
                                                } else {
                                                    $balance += ($value->Dr - $value->Cr);
                                                    $DrTotal += $value->Dr;
                                                    $CrTotal += $value->Cr;
                                                }
                                                echo number_format($balance,2);
                                            ?>
                                            <?php echo e(($balance > 0) ? "DR" : "CR"); ?>

                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="table-active">
                                        <td></td>
                                        <td></td>
                                        <td>TOTAL</td>
                                        <td class="text-end"></td>
                                        <td class="text-end fw-bolder"><?php echo e(number_format($DrTotal, 2)); ?></td>
                                        <td class="text-end fw-bolder"><?php echo e(number_format($CrTotal, 2)); ?></td>
                                        <td class="text-end fw-bolder"> <?php echo e(number_format($DrTotal-$CrTotal,2)); ?></td>

                                    </tr>
                                </tbody>
                            </table>
                            <?php else: ?>
                            <p class="text-danger">No data found</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->

<!-- Include jQuery if not already included -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
  $(document).ready(function(){
    $('#pdf').click(function(event){
        event.preventDefault();
        $('#form1').removeAttr('target');
        $('#form1').attr('action', '<?php echo e(URL("/SupplierLedger1PDF")); ?>');
        $('#form1').attr('target', '_blank');
        $('#form1').submit();
    });

    $('#excel').click(function(event){
        event.preventDefault();
        $('#form1').removeAttr('target');
        $('#form1').attr('action', '<?php echo e(URL("/SupplierLedgerExcelExport")); ?>');
        $('#form1').submit();
    });

    $('#online').click(function(event){
        event.preventDefault();
        $('#form1').removeAttr('target');
        $('#form1').attr('action', '<?php echo e(URL("/SupplierLedger1")); ?>');
        $('#form1').submit();
    });
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/rotana_sky/resources/views/reports/supplier_ledger1.blade.php ENDPATH**/ ?>