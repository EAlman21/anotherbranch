<ul class="navbar-form  navbar-right">	
	<?php 
		if (logged_in() === true){
			include 'includes/widgets/nav_loggedin.php';	
		}else{
			include 'includes/widgets/nav_log.php';
		}
	?>
</ul> <!-- /.navbar-right-->
