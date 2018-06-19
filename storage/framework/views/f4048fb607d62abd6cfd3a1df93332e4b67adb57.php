<?php $__env->startSection('content'); ?>
<?php echo $__env->make('Layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
    <div class="main">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <br>
                <div class="card bg-light mb-3">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Info card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                     </div>
                </div>
                <div class="card bg-light mb-3">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Info card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                     </div>
                </div>
                <div class="card bg-light mb-3">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Info card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                     </div>
                </div>
                <div class="card bg-light mb-3">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Info card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                     </div>
                </div>
            </div>
        </div>    
</div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>