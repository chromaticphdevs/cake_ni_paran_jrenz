<nav class="ui menu">
	<div class="ui container">
	  <div class="header item">
	  	<a href="/pages/landing">Landing Page</a>
	  </div>
	  <?php if(Session::check('user')) :?>
	  	<?php if(Session::get('user')->type ==='admin'):?>
	  	  <div class="item">
		  	<a href="/admin/">Dashboard</a>
		  </div>
		  <div class="item">
		  	<a href="/profile">Profile</a>
		  </div>
		<?php else:?>
		<div class="item">
		  <a href="/profile">Profile</a>
		</div>
		<div class="item">
		  <a href="/order/list">Order History</a>
		</div>
		<?php endif;?>
	  <?php endif;?>
	  <?php if(Session::check('cart')):?>
	   <div class="item">
	  	<a href="/billing">Basket</a>
	  </div>
	   <?php endif;?>
	<?php if(! Session::check('user')) :?>
	  <div class="right menu">
	    <div class="item">
	    	<a href="/pages/register" class="ui button red">Sign Up</a>
	    </div>
	    <div class="item">
	        <a href="/pages/login" class="ui button blue">Sign In</a>
	    </div>
	  </div>
	<?php endif;?>

	<?php if(Session::check('user')) :?>
	<div class="right menu">
	    <div class="item">
	    	<a href="/user/logout" class="ui button red">Logout</a>
	    </div>
	</div>
	<?php endif;?>
	</div>
</nav>