<?php $__env->startSection('content'); ?>

    <div class="bmd-layout-container bmd-drawer-f-l bmd-drawer-overlay">
   	 <?php echo $__env->make('Layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   	 <main class="bmd-layout-content">
   	 	<div class="content-div">
   	 		
   	 	</div>
   	 	<div class="card bg-light mb-3" style="margin: 15px;">
            <div class="card-header header-color">
            <div class="row">
   	 			<div class="col-md-1 col-sm-12 image-div">
   	 				
   	 				<center><img src="<?php echo e(asset('avatars/male1.svg')); ?>" height="100px"></center>
   	 				
   	 			</div>
   	 			<div class="col-md-4 col-sm-12 name-div">
   	 				<h3 id="titleFname"><?php echo e($users->first_name." ".$users->last_name); ?></h3>
   	 				<h5>(<?php echo e($users->user->username); ?>)</h5>
   	 			</div>
   	 		</div>
   	 		</div>

            <div class="card-body">
                <h5 class="card-title">Account Settings</h5>
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
        <b><p id="p_fname">First Name:</b> <?php echo e($users->first_name); ?></p>
        <b><p id="p_lname">Last Name:</b> <?php echo e($users->last_name); ?></p>
        <b><p id="p_gender">Gender:</b> <?php echo e($users->gender); ?></p>
        <b><p id="p_contact">Contact Number:</b> <?php echo e($users->contact_number); ?></p>
        <b><p id="p_bday">Birthday:</b> <?php echo e($bday); ?></p>
        <b><p id="p_address">Address:</b> <?php echo e($users->home_address); ?></p>
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
				    <a class="dropdown-item" href="#" data-toggle="modal" value="<?php echo e($users->user_id); ?>" data-target="#accountinfo"><i class="material-icons">edit</i> &nbsp Edit</a>
				  </div>
			</div>
      	</div>
      </div>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <b><p>Username:</b>Abri</p>
        <b><p>Email:</b> michael.abrigos27@gmail.com</p>
        <b><p>Password: *******</b> </p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header card-head-color" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Device Information
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <?php if(count($devices) == 0): ?>
        No added device!
        <a href="#" data-toggle="modal" data-target="#deviceAdd">Add Devices</a>
        
        <?php else: ?>
        
        <?php $__currentLoopData = $devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <b><p id="d_code">Device Name:</b> <?php echo e($device->device_name); ?></p>
         <b><p id="d_code">Device Code:</b> <?php echo e($device->device_code); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
        <?php endif; ?>
        
      </div>
    </div>
  </div>
</div>
</div>
</div>
</main>

<div class="modal fade" id="persoinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        	<div class="row">
        		<div class="col">
        			<div class="form-group">
			            <label for="fname" class="col-form-label">First Name:</label>
			            <input type="text" class="form-control" required id="fname">
		          	</div>
        		</div>
        		<div class="col">
    			 	<div class="form-group">
			            <label for="lname" class="col-form-label">Last Name:</label>
			            <input type="text" class="form-control" id="lname">
		        	</div>
        		</div>
        	</div>
      
          <div class="form-group">
            <label for="contact" class="col-form-label">Contact Number:</label>
            <input class="form-control" id="contact">
          </div>

			<?php if($users->gender = "Male"): ?>
				<div class="form-check form-check-inline">
	          	<label for="message-text" class="col-form-label">Gender: &nbsp</label>
			  	<input class="form-check-input" checked type="radio" name="inlineRadioOptions" id="gender1" value="male">
			  	<label class="form-check-label" for="male">Male</label>
			  </div>

			  <div class="form-check form-check-inline">
			  	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="gender2" value="female">
				<label class="form-check-label" for="female">Female</label>
			  </div>
			<?php else: ?>
				<div class="form-check form-check-inline">
	          	<label for="message-text" class="col-form-label">Gender: &nbsp</label>
			  	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="gender1" value="male">
			  	<label class="form-check-label" for="male">Male</label>
			  </div>

			  <div class="form-check form-check-inline">
			  	<input class="form-check-input" checked type="radio" name="inlineRadioOptions" id="gender2" value="female">
				<label class="form-check-label" for="female">Female</label>
			  </div>
			<?php endif; ?>
          

		  <div class="form-group">
            <label for="recipient-name" class="col-form-label">Address:</label>
            <input type="text" class="form-control" id="address">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Birthday:</label>
            <input type="text" class="form-control" id="date">
          </div>
        
      </div>
      <div class="modal-footer">
      	<input type="hidden" id="ui-id" value="<?php echo e($users->id); ?>">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="updatePI" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="accountinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
	      <div class="modal-body">
	        	<div class="row">
	        		<div class="col">
	        			<div class="form-group">
				            <label for="username" class="col-form-label">Username:</label>
				            <input type="text" class="form-control" required id="username">
			          	</div>
	        		</div>
	        		<div class="col">
	    			 	<div class="form-group">
				            <label for="email" class="col-form-label">Email:</label>
				            <input type="email" class="form-control" required id="email">
			        	</div>
	        		</div>
	        	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Update</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="deviceAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Device</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?php echo e(route('device.store')); ?>">
        <div class="modal-body">
            <div class="form-group">
                <label for="username" class="col-form-label">Device Code:</label>
                <input type="text" class="form-control" required id="code">
            </div>
        </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" id="submitDevice" class="btn btn-primary">Add Device</button>
        </div>
        </div>
       
      </form>
    </div>
  </div>
</div>

<meta name="_token" content="<?php echo csrf_token(); ?>" />
<?php echo $__env->make('Scripts.editAjax', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script type="text/javascript">
$(document).ready(function()
{
	$('#date').bootstrapMaterialDatePicker({maxDate : new Date(), time: false });
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>