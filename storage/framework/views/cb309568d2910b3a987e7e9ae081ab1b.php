<?php if(!is_null($supplier[0]->Balance)): ?>
 

 
<div class=" mt-1 <?php echo e(($supplier[0]->Balance>0) ? 'text-success' : 'text-danger'); ?>"><strong>Balance: <?php echo e($supplier[0]->Balance); ?></strong></div>
 <?php else: ?>
<p class="mt-1 text-danger "><strong>No Balance Recorded</strong></p>
 <?php endif; ?><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/rotana_sky/resources/views/ajax_balance.blade.php ENDPATH**/ ?>