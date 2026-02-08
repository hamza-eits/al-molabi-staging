<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            @page {
                margin: 100px 25px;

            }

            header {
                position: fixed;
                top: -90px;
                left: 0px;
                right: 0px;
                height: 50px;
                font-size: 20px !important;
                 text-align: center;
             border-bottom: 1px solid black;
            }

            footer {
                position: fixed; 
                bottom: -100px; 
                left: 0px; 
                right: 0px;
                height: 50px; 
                font-size: 11px !important;
                
                border-top: 1px solid black;
                
                text-align: center;
                padding-top: 6px;

            }

.noborder_table {
    border-left: 0;
    border-right: 0;
    border-top: 0.;
    border-bottom: 0;
    border-collapse: collapse;
    
}

.noborder_table  td,
.noborder_table   th {
    border-left: 0;
    border-right: 0;
    border-top: 0;
    border-bottom: 0;
} 

table {
    border-left: 0.01em solid #ccc;
    border-right: 0;
    border-top: 0.01em solid #ccc;
    border-bottom: 0;
    border-collapse: collapse;
}
table td,
table th {
    border-left: 0;
    border-right: 0.01em solid #ccc;
    border-top: 0;
    border-bottom: 0.01em solid #ccc;
}
        body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
}
        </style>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
    <body>
        <!-- Define header and footer blocks before your content -->


<?php 

$company=DB::table('company')->first();

 ?>


        <header >
           <?php echo e($company->Name); ?>

        </header>

        <footer>
         
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
            <h3 align="center">EXPENSE</h3>
 

   <table  class="noborder_table" width="150" align="right">

                            <tbody class="font">
                                <tr>
                                    <td>Payment Date</td>
                                    <th align="right"><?php echo e(dateformatman2($expense_master[0]->Date)); ?></th>
                                </tr>
                               
                                <tr>
                                    <td>Expense No</td>
                                    <th  align="right"><?php echo e($expense_master[0]->ExpenseNo); ?></th>
                                </tr>

                                   <tr>
                                    <td>Paid From</td>
                                    <th  align="right"><?php echo e($expense_master[0]->ChartOfAccountName); ?></th>
                                </tr>
                                   <tr>
                                     <td>Print Date:</td>
                                    <th  align="right"><?php echo e(dateformatman2(date('Y-m-d'))); ?></th>
                                   </tr>
                            </tbody>
          </table>
                     
                     <br>   Bill To:
                        <br>
                        <strong style="font-weight: bold;" class="font"><?php echo e($expense_master[0]->PartyName); ?></strong>
            
            <br>
            <br>
            <br>

                 <?php if(count($expense_detail)>0): ?>        
                <table width="100%">
                <tbody><tr bgcolor="#CCCCCC" class="bg-light">
                <th width="5">S.No</th>
                <th width="65" >Expense No</th>
                <th width="200">Expense Account</th>
                <th width="30">Tax Rate</th>
                <th width="30">Exclusive Value</th>
                <th width="30">VAT</th>
                 <th width="15">Inclusive Value</th>
                </tr>
                </tbody>
                <tbody>
                <?php $__currentLoopData = $expense_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <tr valign="top">
                 <td align="center" ><?php echo e($key+1); ?></td>
                 <td  align="center"><?php echo e($value->ExpenseNo); ?></td>
                 <td ><?php echo e($value->ChartOfAccountName); ?><br><span style="font-size: 10px; color: #6C6C6C;"><i><?php echo e($value->Notes); ?></i></span></td>
                 <td align="center" ><?php echo e(number_format($value->TaxPer,2)); ?></td>
                 <td align="right" ><?php echo e(number_format($value->Amount,2)); ?></td>
                 <td align="right" ><?php echo e(number_format($value->Tax,2)); ?></td>
                 <td align="right" ><?php echo e(number_format($value->AmountAfterTax,2)); ?></td>
                 </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
             
                 </tbody>

          </table>


                 <br>
                 Value before Tax : <strong><?php echo e(number_format($expense_master[0]->GrantTotal,2)); ?> <?php echo e(session::get('Currency')); ?></strong><br>
                 VAT : <strong><?php echo e(number_format($expense_master[0]->Tax,2)); ?> <?php echo e(session::get('Currency')); ?></strong><br>
                 Value After Tax: <strong><?php echo e(number_format($expense_master[0]->GrantTotal,2)); ?> <?php echo e(session::get('Currency')); ?></strong><br>

                 <?php else: ?>
                   <p class=" text-danger">No data found</p>
                 <?php endif; ?> 





        </main>
             <script type="text/php"> 
    
    if (isset($pdf)) { 
     //Shows number center-bottom of A4 page with $x,$y values
        $x = 520;  //X-axis i.e. vertical position 
        $y = 785; //Y-axis horizontal position
        $text = "Page {PAGE_NUM} of {PAGE_COUNT}";  //format of display message
        $font =  $fontMetrics->get_font("helvetica", "normal");
        $size = 9;
        $color = array(0,0,0);
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
    }
    
    </script> 
    </body>
</html><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/al-molabi/resources/views/expense/expense_view_pdf.blade.php ENDPATH**/ ?>