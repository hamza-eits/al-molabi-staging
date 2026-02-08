<?php $__env->startSection('title', 'page title...'); ?>
 

<?php $__env->startSection('content'); ?>


<?php   

$users = DB::table('user')->get();

 ?>

 <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

<!-- start page title -->
  <div class="row">
      <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center ">
              <h4 class="mb-sm-0 font-size-18">UMRAH SALE REPORT</h4>

              <div class="page-title-right">
                  <div class="page-title-right">
                              <form action="<?php echo e(URL('/UmrahReport1')); ?>" method="post" name="form1" id="form1" class="form-inline w-100 d-flex align-items-center">
<?php echo csrf_field(); ?>


<div class="col-md-4">  </div>

<div class="col-md-3">
    <div class="form-group mx-2 ">
      <label for="">Salesman</label>   
  <select name="UserID" id="UserID" class="form-select">
  <option value="">Any</option>
  
   <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($value->UserID); ?>" <?php echo e((request()->UserID==$value->UserID) ? 'selected=selected':''); ?>  ><?php echo e($value->FullName); ?></option>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
</select>
    </div>
</div>


<div class="col-md-3">
    <div class="form-group mx-2 ">
      <label for="">Item</label>   
      <select name="ItemID" id="ItemID" class="form-control">
  
  <option value="">Any</option>

   <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($value->ItemID); ?>" <?php echo e((request()->ItemID==$value->ItemID) ? 'selected=selected':''); ?> ><?php echo e($value->ItemName); ?></option>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
  
</select>
    </div>
</div>


<div class="col-md-2">
    <div class="form-group mx-2 ">
      <label for="">Report Type</label>   
      <select name="Type" id="Type" class="form-control">
  <option value="Date" <?php echo e((request()->Type=='Date') ? 'selected=selected':''); ?>>Invoice Date</option>
  <option value="DepartureDate" <?php echo e((request()->Type=='DepartureDate') ? 'selected=selected':''); ?>>Departure Date</option>
</select>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group mx-2">
       <label for="">From Date</label>  <input type="date" class="form-control" id="EndDate" name="StartDate" value="<?php echo e(request()->StartDate); ?>">
    </div>
</div>

<div class="col-md-3">
    <div class="form-group mx-2">
       <label for="">Till Date</label>  <input type="date" class="form-control" id="EndDate" name="EndDate" value="<?php echo e(request()->EndDate); ?>">
    </div>
</div>



<div class="form-group d-flex">
    <button type="submit" class="btn btn-success mt-4" id="online">Submit</button>
    
</div>
</form>
              </div>
              </div>

          </div>
      </div>
  </div>
  <!-- end page title -->      


<?php if($supplier->isNotEmpty()): ?>

<?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php 


$query = DB::table('v_invoice_detail_umrah')
    ->where('SupplierID', $supplier->SupplierID)
    ->whereBetween(request()->Type, [request()->StartDate, request()->EndDate]);

if (request()->ItemID > 0) {
    $query->where('ItemID', request()->ItemID);
}

if (request()->UserID > 0) {
    $query->where('UserID', request()->UserID);
}

$invoice_detail = $query->get();



 

?>


 

    <div class="card shadow-sm ">
        <div class="card-body border-success border-top border-3 rounded-top">
            
<div class="row">
	<div class="col-md-6"><h3>	<?php echo e($supplier->SupplierName); ?></h3></div>
	<div class="col-md-6">        

   <div class="page-title-right text-end">
<div class="page-title-right text-end">
  <div class="dropdown">
    <button class="btn btn-danger dropdown-toggle waves-effect waves-light" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
      Export Options
    </button>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
      <!-- First Dropdown Link -->
      <li>
        <a class="dropdown-item" href="<?php echo e(URL('/UmrahReport1PDF').'/'.$supplier->SupplierID.'/'.request()->StartDate.'/'.request()->EndDate.'/'.request()->Type.'/'.request()->ItemID); ?>">
          <i class="mdi mdi-file-pdf-outline label-icon"></i> Export PDF
        </a>
      </li>
      <!-- Second Dropdown Link -->
      <li>
        <a class="dropdown-item" href="<?php echo e(URL('/UmrahReport2PDF').'/'.$supplier->SupplierID.'/'.request()->StartDate.'/'.request()->EndDate.'/'.request()->Type.'/'.request()->ItemID); ?>">
          <i class="mdi mdi-file-pdf-outline label-icon"></i> For Vendor
        </a>
      </li>
    </ul>
  </div>
</div>

              </div>
              </div> 

            



 



</div>

</div>
 

<?php
  // Initialize total variables
  $totalUmrahFare = 0;
  $totalFare = 0;
  $totalService = 0;
  $totalVAT = 0;
  $totalInvoice = 0;
  $totalPaid = 0;
  $totalPaymentInBus = 0;
?>


 <?php if(count($invoice_detail)>0): ?>		
<table class="table table-sm table-bordered table-striped">

<thead>
<th class="text-center" width="2">S.No</th>
<th class="text-center" width="6">INV#</th>
<th class="text-left" width="120" align="left">Saleman</th>
<th class="text-center" width="120">Pax Name</th>
<th class="text-center" width="10">Contact</th>
<th class="text-center" width="10">Passport</th>
<th class="text-center" width="10">Pick Point</th>
<th class="text-center" width="10">Room Type</th>
<th class="text-center" width="10">Visa Type</th>
<th class="text-center" width="16">Dat of <br>Departure</th>
<th class="text-center" width="10">Umrah <BR>Fare</th>
<th class="text-center" width="10">Fare</th>
<th class="text-center" width="10">Serice</th>
<th class="text-center" width="10">VAT5%</th>
<th class="text-center" width="10">Invoice</th>
<th class="text-center" width="4">Paid</th>
<th class="text-center" width="75">Pay In Bus</th>
</thead>


<tbody>
<?php $__currentLoopData = $invoice_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$invoice_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
  
  $totalUmrahFare += $invoice_detail->UmrahFare;
  $totalFare += $invoice_detail->Fare;
  $totalService += $invoice_detail->Service;
  $totalVAT += $invoice_detail->Taxable;
  $totalInvoice += $invoice_detail->Total;
  $totalPaid += $invoice_detail->Paid;
  $totalPaymentInBus += $invoice_detail->PaymentInBus;
?>
 <tr>
 <td align="center" ><?php echo e($key+1); ?></td>
 <td align="center"><a href="<?php echo e(URL('/UmrahPDF/').'/'.$invoice_detail->InvoiceMasterID); ?>" target="_blank"><?php echo e($invoice_detail->InvoiceMasterID); ?></a> </td>
 <td align="left"><?php echo e($invoice_detail->SalemanName); ?></td>
 <td align="left"><?php echo e($invoice_detail->PaxName); ?></td>
 <td align="center"><?php echo e($invoice_detail->Contact); ?></td>
 <td align="center"><?php echo e($invoice_detail->Passport); ?></td>
 <td align="center"><?php echo e($invoice_detail->PickPoint); ?></td>
 <td align="center"><?php echo e($invoice_detail->RoomType); ?></td>
 <td align="center"><?php echo e($invoice_detail->VisaType); ?></td>
 <td align="center"><?php echo e(dateformatman($invoice_detail->DepartureDate)); ?></td>
 <td  class="text-center"><?php echo e(number_format($invoice_detail->UmrahFare,2)); ?></td>
 <td  class="text-center"><?php echo e(number_format($invoice_detail->Fare,2)); ?></td>
 <td  class="text-center"><?php echo e(number_format($invoice_detail->Service,2)); ?></td>
 <td  class="text-center"><?php echo e(number_format($invoice_detail->Taxable,2)); ?></td>
 <td  class="text-center"><?php echo e(number_format($invoice_detail->Total,2)); ?></td>
 <td  class="text-center"><?php echo e(number_format($invoice_detail->Paid,2)); ?></td>
 <td  class="text-center"><?php echo e(number_format($invoice_detail->PaymentInBus,2)); ?></td>
 </tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
 <tr class="fw-bolder bg-danger bg-soft bg-gradient">
  <td colspan="10" class="text-center"><strong>Total</strong></td>
  <td class="text-center"><?php echo e(number_format($totalUmrahFare,2)); ?></td>
  <td class="text-center"><?php echo e(number_format($totalFare,2)); ?></td>
  <td class="text-center"><?php echo e(number_format($totalService,2)); ?></td>
  <td class="text-center"><?php echo e(number_format($totalVAT,2)); ?></td>
  <td class="text-center"><?php echo e(number_format($totalInvoice,2)); ?></td>
  <td class="text-center"><?php echo e(number_format($totalPaid,2)); ?></td>
  <td class="text-center"><?php echo e(number_format($totalPaymentInBus,2)); ?></td>
</tr>
 <tr class="fw-bolder d-none">
  <td colspan="9" class="text-center"></td>
  <td>UmrahFare</td>
  <td>Fare</td>
  <td>Service</td>
  <td>VAT</td>
  <td>Invoice</td>
  <td>Paid</td>
  <td>PaymentInBus</td>
</tr>
 </tbody>
 </table>
 <?php else: ?>
   <p class=" text-danger">No data found</p>
 <?php endif; ?>   


            
         <!-- end card body -->
    </div>
    <!-- end card -->
  
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <?php else: ?>
  <p class="text-danger">No record found</p>
  <?php endif; ?>

    </div>
    <!-- end col -->

   
</div>
<!-- end row -->





 


</div> <!-- container-fluid -->
                </div>


<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
    $('#StartDate').on('change', function() {
        var startDate = $(this).val();
        var endDate = $('#EndDate').val();

            if (!endDate || new Date(endDate) < new Date(startDate)) {
                $('#EndDate').val(startDate);
            }


        $('#EndDate').attr('min', startDate);
    });
});



    </script>




  <?php $__env->stopSection(); ?>
<?php echo $__env->make('template.tmp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/al-molabi/resources/views/umrah/umrah_report1.blade.php ENDPATH**/ ?>