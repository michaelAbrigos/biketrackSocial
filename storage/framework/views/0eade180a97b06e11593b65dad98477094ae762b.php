<?php echo $__env->make('Layouts.sidebarMain', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header header-color font-adam"><?php echo e(__('Login')); ?></div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" class="form-control" required name="email">
                            <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-form-label">Password</label>
                            <div class="input-group">
                                    <input type="password" class="form-control" id="pass" required name="password">
                                    <?php if($errors->has('password')): ?>
                                        <span class="invalid-feedback">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2"><img src="<?php echo e(asset('icons/eye.svg')); ?> " style="height: 15px;" onclick="showPass()" id="eye"  data-toggle="tooltip" data-placement="right" title="Show/Hide Password"></span>
                                    </div>
                                </div>
                        </div>
                    
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">
                        <?php echo e(__('Login')); ?>

                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('Scripts.passwordRev', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>