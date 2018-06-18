<?php $__env->startSection('content'); ?>

<body>
  <div class="bmd-layout-container bmd-drawer-f-l bmd-drawer-overlay">
  <?php echo $__env->make('Layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
  <main class="bmd-layout-content">
    
    <div class="container">
      <br>
      <h1 class="navbar-brand">Real time location</h1>
    </div>
      
    <div class="container" style="border: 1px solid gray;height: 400px;margin-top: 20px;">
      
      <div id="map"></div>
    </div>
    
  </main>

</div>
</body>  

<?php echo $__env->make('Scripts.locationUpdate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
</html>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>