<?php $__env->startSection('content'); ?>

<div class="bmd-layout-container bmd-drawer-f-l bmd-drawer-overlay">
   	<?php echo $__env->make('Layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<main class="bmd-layout-content">
		<div class="container">
			<h3 style="margin-top: 50px;">Search Results</h3>
			
			<?php if(session('status')): ?>
			    <div class="alert alert-secondary">
			        <?php echo e(session('status')); ?>

			    </div>

			<?php endif; ?>
			
			<?php if(count($users) > 0): ?>
				<div class="row">
  				<div class="col-sm-8">	
  					<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="card friend-box">
						<div class="card-body">
							<div class="row">
				   	 			<div class="col-md-2 col-sm-12 image-div">
				   	 				<center><img src="<?php echo e(asset('avatars/male1.svg')); ?>" height="100px"></center>
				   	 			</div>
				   	 			<div class="col-md-6 col-sm-12 name-div">
				   	 				<h3><?php echo e($user->first_name." ".$user->last_name); ?></h3>
				   	 				<h5>(<?php echo e($user->user->username); ?>)</h5>
				   	 			</div>
				   	 			
			   	 			</div>

		   	 			</div>
		   	 			<div class="card-footer text-muted">
							<button type="button" class="btn btn-raised btn-primary" style="float: right;">Add Friend</button>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
			<?php else: ?>
			<div class="alert alert-secondary">
			    No users found. Please search again!
			</div>
			<?php endif; ?>
		</div>
	</main>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>