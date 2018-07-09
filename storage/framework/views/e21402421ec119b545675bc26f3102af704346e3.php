<div class="sidenav">
<?php if(auth()->check() && auth()->user()->hasRole('peers')): ?>
  <a href="<?php echo e(route('location.index')); ?>"><img src="<?php echo e(asset('/icons/BTStxtOR.svg')); ?>" style="height: 70px;width: 155px"></a>
  <?php else: ?>
  <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('/icons/BTStxtOR.svg')); ?>" style="height: 70px;width: 155px"></a>
  <?php endif; ?>
	<?php if(auth()->check() && auth()->user()->hasRole('peers')): ?>
	 <a href="/location">Real Time Location</a>
	<?php else: ?>
	<div class="link-group">	
	  <a href="/location"><i class="material-icons sidenav-icons">place</i>My Location</a>
	  <a href="/groups"><i class="material-icons sidenav-icons">supervised_user_circle</i>Groups</a>
	  <a href="/peers"><i class="material-icons sidenav-icons">person</i>Peers</a>
	  <a href="/friends"><i class="material-icons sidenav-icons">supervisor_account</i>Friends</a>
	  <a href="#"><i class="material-icons sidenav-icons">history</i>History</a>
	</div>
	<?php endif; ?>
</div>