<div class="bg">
<?php echo $__env->make('Layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('Layouts.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('Layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
</div>
<?php echo $__env->make('Scripts.addFriendAjax', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>