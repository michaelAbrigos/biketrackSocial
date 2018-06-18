<header class="bmd-layout-header">

    <div class="navbar navbar-light bg-faded" style="background-color: #031424;">
      
      <button class="navbar-toggler text-white" type="button" data-toggle="drawer" data-target="#dw-s">
        <span class="sr-only">Toggle drawer</span>
        <i class="material-icons">menu</i>
      </button>
    
        
        
          <form class="form-inline mt-2 mt-md-0" action="<?php echo e(route('search')); ?>" method="get">
            
            <input class="form-control mr-sm-2" name="searchterm" type="text" size="50" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
            <button class="btn my-2 my-sm-0" type="submit"><i class="material-icons">search</i></button></div>                                  
          </form>
       
    
   

     <?php if(auth()->guard()->guest()): ?>
        <li><a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a></li>
        <li><a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a></li>
     <?php else: ?>
       <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle text-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo e(Auth::user()->username); ?>

            </button> 
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="padding-right: 10px;">
          <a class="dropdown-item" href="<?php echo e(route('account.index')); ?>">Account</a>
          <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">Logout</a>
          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
              <?php echo csrf_field(); ?>
          </form>
        </div>
      </div>
     <?php endif; ?>
      

    </div>
  </header>
  <div id="dw-s" class="bmd-layout-drawer bg-faded">
    <header>
      <a class="navbar-brand">Dashboard</a>
    </header>
    <ul class="list-group">
      <a class="list-group-item" href="/home">News Feed</a>
      <a class="list-group-item" href="location">Real Time Tracking</a>
      <a class="list-group-item" href="#">Groups</a>
      <a class="list-group-item" href="#">Events</a>
      <a class="list-group-item" href="#">Peers</a>
    </ul>
  </div>