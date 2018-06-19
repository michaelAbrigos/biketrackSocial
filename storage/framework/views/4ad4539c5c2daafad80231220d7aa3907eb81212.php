<?php $__env->startSection('content'); ?>

<?php echo $__env->make('Layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
	<div class="main">  
		<div class="map-container">
		 	<div id="map"></div>
		</div>
	</div>
 
<?php echo $__env->make('Scripts.locationUpdate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDh_q1lR502bpk7MmTR0XZLTph53Ac9BUE&callback=initMap">
</script>   
</html>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>