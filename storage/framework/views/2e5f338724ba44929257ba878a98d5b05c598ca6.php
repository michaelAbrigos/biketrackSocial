<?php $__env->startSection('content'); ?>

<?php echo $__env->make('Layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="main">
	<div class="row" style="margin-right: 0px !important">
		<div class="col" style="padding-top: 10px; "><h5 class="font-adam">Search Results</h5></div>
  	</div>
		
		<?php if(session('status')): ?>
		    <div class="alert alert-secondary">
		        <?php echo e(session('status')); ?>

		    </div>
		<?php endif; ?>
		
		<?php if(count($users) > 0): ?>
					
				<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					
					<div class="card" style="margin-bottom: 14px;">
						<div class="card-body">
							<div class="row">
				   	 			<div class="col-md-6" style="display: inline-block;">
				   	 				
			   	 					<?php if($user->information->gender == "Male"): ?>
			   	 						<img src="<?php echo e(asset('avatars/male1.svg')); ?>" height="50px">
									<?php else: ?>
										<img src="<?php echo e(asset('avatars/female.svg')); ?>" height="50px">
									<?php endif; ?>
				   	 				
				   	 				<p style="display: inline-block;"><?php echo e($user->information->first_name." ".$user->information->last_name); ?></p>
				   	 				<p style="display: inline-block;" class="text-muted">(<?php echo e($user->username); ?>)</p>

				   	 			</div>
				   	 			<div class="col-md-6">
				   	 		
				   	 				<?php if(in_array($user->id,$friendRequested)): ?>
			   	 					<div class="btn-group" style="float: right;">
									  <button type="button" class="btn btn-raised btn-warning" disabled>Request Sent</button>
									  <button type="button" class="btn btn-raised btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    <span class="sr-only">Toggle Dropdown</span>
									  </button>
									  <div class="dropdown-menu">
									    <a class="dropdown-item cancelRequest" href="#" value="<?php echo e($user->id); ?>">Cancel Request</a>
									  </div>
									</div>
								<?php elseif(in_array($user->id,$notYetRequestFriend)): ?>
									<div class="btn-group" style="float: right;">
									  <button type="button" class="btn btn-warning" id="confirmFriend">Confirm Request</button>
									  <button type="button" class="btn btn-raised btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    <span class="sr-only">Toggle Dropdown</span>
									  </button>
									  <div class="dropdown-menu">
									    <a class="dropdown-item" href="#" id="declineFriend">Decline Request</a>
									  </div>
									</div>
								<?php elseif(in_array($user->id,$countFriends)): ?>
									<button type="button" class="btn btn-raised btn-warning addFriend" id="<?php echo e($user->id); ?>" value="<?php echo e($user->id); ?>" style="float: right;">View Profile</button>
			   	 				<?php else: ?>
			   	 					<button type="button" class="btn btn-raised btn-warning addFriend" id="<?php echo e($user->id); ?>" value="<?php echo e($user->id); ?>" style="float: right;">Add Friend</button>
									
			   	 				<?php endif; ?>
				   	 			</div>
				   	 			
			   	 			</div>

		   	 			</div>
		   	 				
					</div>
					
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				
		<?php else: ?>
			<div class="alert alert-secondary">
			    No users found. Please search again!
			</div>
		<?php endif; ?>

</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>