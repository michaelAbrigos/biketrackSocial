<?php $__env->startSection('content'); ?>

<div class="bmd-layout-container bmd-drawer-f-l bmd-drawer-overlay">
   	<?php echo $__env->make('Layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   	<div class="container">
   		<br>
   		<div class="row">
   			<div class="col-md-6">
   				<div class="card">
   					<div class="card-header" id="headingOne">
				      	<div class="col-md-8 tab-title">
					      <h5 class="mb-0">
					      	Setup Account
					      </h5>
					  	</div>
					</div>
					<div class="card-body">
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

						<div class="form-check form-check-inline">
			          		<label for="message-text" class="col-form-label">Gender: &nbsp</label>
					  		<input class="form-check-input" type="radio" name="inlineRadioOptions" id="gender1" value="male">
					  		<label class="form-check-label" for="male">Male</label>
					  	</div>

					  	<div class="form-check form-check-inline">
					  		<input class="form-check-input" required type="radio" name="inlineRadioOptions" id="gender2" value="female">
							<label class="form-check-label" for="female">Female</label>
					  	</div>
					
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
				      	<input type="hidden" id="ui-id" value="">
				        <button type="submit" id="updatePI" class="btn btn-primary">Next</button>
			      </div>
   				</div>
			  </form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function()
{
	$('#date').bootstrapMaterialDatePicker({maxDate : new Date(), time: false });
});
</script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>