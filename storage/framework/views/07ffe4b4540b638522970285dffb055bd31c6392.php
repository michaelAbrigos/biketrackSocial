<?php $__env->startSection('content'); ?>
<meta name="_token" content="<?php echo csrf_token(); ?>" />
  <div class="main"">
  	<?php echo $__env->make('Layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	  <div class="card bg-light mb-3">
	    <div class="card-header header-color">
	      <div class="row">
	   	 	  <div class="col-md-1 col-sm-12 image-div">
	   	 			<center><img src="<?php echo e(asset('avatars/male1.svg')); ?>" height="70px"></center>
	   	 		</div>
	   	 		<div class="col-md-4 col-sm-12 name-div">
 	 				<h4 id="titleFname"><?php echo e($users->first_name." ".$users->last_name); ?></h4>
 	 				<h6>(<?php echo e($users->user->username); ?>)</h6>
	   	 		</div>
	   	 	</div>
	   	</div>
	    <div class="card-body">
	      
	      <div id="accordion">
	        <div class="card">
	          <div class="card-header card-head-color" id="headingOne">
	            <div class="row">
	      	       <div class="col-md-8 tab-title">
		               <h5 class="mb-0">
	          	        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
	          	          Personal Information
	          	        </button>
	        	       </h5>
	      	       	</div>
	              	<div class="col-md-4 menu-div">
	              		<div class="dropdown">
        				  <button class="btn bmd-btn-icon dropdown-toggle" type="button" id="btnvert" data-toggle="dropdown" aria-haspopup="true" value="<?php echo e($users->user_id); ?>" aria-expanded="false">
        				    <i class="material-icons">more_vert</i>
        				  </button>
        				  <div class="dropdown-menu dropdown-menu-left" aria-labelledby="ex1">
        				    <a class="dropdown-item" href="#" data-toggle="modal" id="pi-b" data-target="#persoinfo"><i class="material-icons">edit</i> &nbsp Edit</a>
        				  </div>
	        			</div>
	              	</div>
	      		</div>
	  		</div>
			    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
			      	<div class="card-body">
			      		<div class="row">
			      			<div class="col"><p id="p_fname"><b>First Name:</b> <?php echo e($users->first_name); ?></p></div>
			      			<div class="col"><p id="p_lname"><b>Last Name:</b> <?php echo e($users->last_name); ?></p></div>
			      		</div>
			      		<div class="row">
			      			<div class="col"><p id="p_gender"><b>Gender:</b> <?php echo e($users->gender); ?></p></div>
			      			<div class="col"><p id="p_contact"><b>Contact Number:</b> <?php echo e($users->contact_number); ?></p></div>
			      		</div>
				    	<div class="row">
				    		<div class="col"><p id="p_bday"><b>Birthday:</b> <?php echo e($bday); ?></p></div>
				    		<div class="col"><p id="p_address"><b>Address:</b> <?php echo e($users->home_address); ?></p></div>
				    	</div>
				        
			      	</div>
			  	</div>
			 </div>
	  			<div class="card">
	    			<div class="card-header card-head-color" id="headingTwo">
	      			<div class="row">
	      				<div class="col-md-8 tab-title">
	      					<h5 class="mb-0">
						        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						          Account Information
						        </button>
	      					</h5>
	  						</div>
	  						<div class="col-md-4 menu-div">
				      		<div class="dropdown">
									  <button class="btn bmd-btn-icon dropdown-toggle" type="button" id="ex1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    <i class="material-icons">more_vert</i>
									  </button>
									  <div class="dropdown-menu dropdown-menu-left" aria-labelledby="ex1">
									    <a class="dropdown-item" href="#" data-toggle="modal" id="ai-b" value="<?php echo e($users->user_id); ?>" ><i class="material-icons">edit</i> &nbsp Edit</a>
									  </div>
									</div>
	      				</div>
	      			</div>
	    			</div>
	    			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
	      			<div class="card-body">
				        <p id="p_uname"><b>Username:</b> <?php echo e($users->user->username); ?></p>
				        <p id="p_email"><b>Email:</b> <?php echo e($users->user->email); ?></p>
				        <p id="p_pass"><b>Password: <a href="#" id="ch-pass">change password</a></b> </p>
	      			</div>
	    			</div>
	  			</div>
	  			<?php if(auth()->check() && auth()->user()->hasRole('peers')): ?>
	  			<?php else: ?>
	  			<div class="card">
	    			<div class="card-header card-head-color" id="headingThree">
	      			<h5 class="mb-0">
				        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				          Device Information
				        </button>
	      			</h5>
	    			</div>
	    			<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
	      			<div class="card-body">
				        <?php if(count($devices) == 0): ?>
				        No added device!
				        <a href="#" data-toggle="modal" data-target="#deviceAdd">Add Devices</a>
				        
				        <?php else: ?>
				        
				        <?php $__currentLoopData = $devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				         <p id="d_code"><b>Device Name:</b> <?php echo e($device->device_name); ?></p>
				         <p id="d_code"><b>Device Code:</b> <?php echo e($device->device_code); ?></p>
				        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				       
				        <?php endif; ?>
	      			</div>
	    			</div>
	  			</div>
	  			<?php endif; ?>

				</div>
			</div>
		</div>
	</div>
<?php echo $__env->make('CRUD.information.personal_info_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('CRUD.information.changePassword_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('CRUD.information.account_info_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('CRUD.information.device_info_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('Scripts.editAjax', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('Scripts.passwordRev', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script type="text/javascript">
$(document).ready(function()
{
	$('#date').bootstrapMaterialDatePicker({maxDate : new Date(), time: false });
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>