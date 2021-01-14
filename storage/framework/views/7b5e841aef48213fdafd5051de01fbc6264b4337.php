<?php if( Session::has($nom) ): ?>
<div class="alert alert-success shadow" role="alert" style="width: 90%">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?php echo session($nom); ?>

</div>
<?php endif; ?>
<?php if( Session::has('error') ): ?>
<div class="alert alert-danger shadow" role="alert" style="width: 90%">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?php echo session('error'); ?>

</div>
<?php endif; ?>
<?php /**PATH D:\switch_maker\war_crimes\resources\views/partials/_notify.blade.php ENDPATH**/ ?>