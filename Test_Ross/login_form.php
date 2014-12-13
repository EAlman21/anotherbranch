<?php 
include 'core/init.php';
include 'includes/overall/header.php';
?>
  <div class="col-md-6 col-xs-12">
    <div class= "panel panel-primary">
      <div class="panel-heading">
       <h3> Log in Libro</h3>
      </div>
	  <form class="form-signin" action="login.php" method="post"> <!-- form-->
	  <li class="list-group-item">
		Username(or Email):
		<input type="text" name ="username" class="form-control"  placeholder="username/email">
	  </li>
	  <li class="list-group-item">
		Password:<input type="password" name="password" class="form-control"  placeholder="Password">
	  </li>  
	  <li class="list-group-item">
		<button type="submit" value="Log in" class="btn btn-default" > Login</button>
		<!-- <button type="submit" class="btn btn-default"> Join Libro!</button> -->
	  </li>
	  <li class="list-group-item">
		|<a href="register.php"> Join Library today!</a><br>
		|<a href= "changepassword.php"> Change Password</a><br>
	  </li>
	</div>
  </div>	  
<?php include 'includes/overall/footer.php';?>