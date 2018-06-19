<?php $__env->startSection('content'); ?>

<body>
  <div class="bmd-layout-container bmd-drawer-f-l bmd-drawer-overlay">
  <?php echo $__env->make('Layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
  <main class="bmd-layout-content">
      
    <div class="" style="border-radius:5px;box-shadow: 0 10px 10px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1); height: 540px; margin: 20px;">
      
      <div id="map"></div>
    </div>
    
  </main>

</div>
</body>  

<?php echo $__env->make('Scripts.locationUpdate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
</html>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>