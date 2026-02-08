<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo e($pagetitle); ?></title>
    <style type="text/css">
<!--
.style1 {
	font-size: 16px;
	font-weight: bold;
}
body,td,th {
	font-size: 13px;
}
-->


    </style>


    <?php
  
$company = DB::table('company')->first();

?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<div align="center" class="style1"><?php echo e($company->Name); ?></div>
<div align="center"><?php echo e($party[0]->PartyName); ?> - <?php echo e($party[0]->PartyID); ?></div>
<div align="center">Contact : <?php echo e($party[0]->Phone); ?></div>
<div align="center">From <?php echo e(session::get('StartDate')); ?> TO <?php echo e(session::get('EndDate')); ?>

    </div>
 
        <p>
          <?php 
            $DrTotal=0;
            $CrTotal=0;
          
		       ?>
          <?php if(count($journal)>0): ?>    
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="0" style="border-collapse: collapse; font-size: 12px;">
    <thead style="background-color: #a6a6a6; text-align: center;">
        <tr>
            <th style="width: 8%;">DATE</th>
            <th style="width: 8%;">VHNO</th>
            <th style="width: 10%;">Type</th>
            <th style="width: 40%;">Description</th>
            <th style="width: 10%;">DR</th>
            <th style="width: 10%;">CR</th>
            <th style="width: 10%;">Balance</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Opening Balance</td>
            <td></td>
            <td></td>
            <td style="text-align: right;">
                <?php echo e(number_format($sql[0]->Balance, 2)); ?>

            </td>
        </tr>

        <?php
            $balance = $sql[0]->Balance;
            $DrTotal = 0;
            $CrTotal = 0;
        ?>

        <?php $__currentLoopData = $journal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $balance += ($value->Dr - $value->Cr);
                $DrTotal += $value->Dr;
                $CrTotal += $value->Cr;
                $balanceLabel = $balance > 0 ? 'DR' : ($balance < 0 ? 'CR' : '');
            ?>
            <tr>
                <td style="text-align: center;"><?php echo e(dateformatman($value->Date)); ?></td>
                <td style="text-align: center;"><?php echo e($value->VHNO); ?></td>
                <td style="text-align: center;"><?php echo e($value->JournalType); ?></td>
                <td><?php echo e($value->Narration); ?></td>
                <td style="text-align: right;"><?php echo e($value->Dr == 0 ? '' : number_format($value->Dr, 2)); ?></td>
                <td style="text-align: right;"><?php echo e($value->Cr == 0 ? '' : number_format($value->Cr, 2)); ?></td>
                <td style="text-align: right;">
                    <?php echo e(number_format(abs($balance), 2)); ?> <?php echo e($balanceLabel); ?>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <tr style="font-weight: bold;">
            <td></td>
            <td></td>
            <td style="text-align: center;">TOTAL</td>
            <td></td>
            <td style="text-align: right;"><?php echo e(number_format($DrTotal, 2)); ?></td>
            <td style="text-align: right;"><?php echo e(number_format($CrTotal, 2)); ?></td>
            <td style="text-align: right;"><?php echo e(number_format($DrTotal-$CrTotal,2)); ?></td>
        </tr>
    </tbody>
</table>

          
           <?php else: ?>
             <p class=" text-danger">No data found</p>
           <?php endif; ?>
		   
		   
</body>
</html><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/al-molabi/resources/views/reports/party_ledger1pdf.blade.php ENDPATH**/ ?>