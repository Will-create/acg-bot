
<?php if( Session::has('status') ): ?>
<div class="alert alert-success shadow" role="alert" style="width: 90%">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?php echo session('status'); ?>

</div>
<?php elseif(Session::has('warning')): ?>
<div class="alert alert-warning" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?php echo session('warning'); ?>

</div>
<?php elseif(Session::has('danger')): ?>
<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?php echo session('danger'); ?>

</div>
<?php endif; ?>
<?php /**PATH /home/louisbertson/Desktop/criminalite/resources/views/partials/_notification.blade.php ENDPATH**/ ?>