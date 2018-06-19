<?php $__env->startSection('content'); ?>


<div class="container">
    <br><br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header header-color font-adam"><?php echo e(__('Register Account')); ?></div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="fname" class="col-form-label">First Name</label>
                                    <input type="text" class="form-control" required name="fname">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="lname" class="col-form-label">Last Name</label>
                                    <input type="text" class="form-control" required name="lname">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="username" class="col-form-label">Username</label>
                                    <input type="text" class="form-control" required name="username">
                                </div>
                            </div>
                            <div class="col" style="padding-top: 20px">
                                <select class="custom-select custom-select-sm" name="gender">
                                  <option value="Male" disabled selected>Gender</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="email" class="col-form-label">Email</label>
                                    <input type="email" class="form-control" required name="email">
                                    <?php if($errors->has('email')): ?>
                                        <span class="invalid-feedback">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                
                            </div>
                            <div class="col">
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
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                          <label class="form-check-label" for="defaultCheck1" style="padding-top: 6px;">
                            <small class="text-muted">Accept Terms and condtions <a href="">Link here</a></small>
                          </label>
                        </div>

                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">
                        <?php echo e(__('Register')); ?>

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