<div class="sidenav">
	<?php if(auth()->check() && auth()->user()->hasRole('peers')): ?>
	 <a href="location">Real Time Map</a>
	<?php else: ?>
	 <a href="home">News Feed</a>
	  <a href="location">Real Time Map</a>
	  <a href="groups">Groups</a>
	  <a href="peers">Peers</a>
	<?php endif; ?>
</div>