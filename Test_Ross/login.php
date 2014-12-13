<?php 
include 'core/init.php';

if(empty($_POST) === false){
	$username =$_POST['username'];
	$password =$_POST['password'];		
	
	if (empty($username) === true || empty($password)===true){
		$errors[] = 'You need to enter a username and password';
	}else if (user_exists($username) === false) {
		$errors[] ='We can\'t find the username. Have you register?';
	} else if (user_active($username) === false) {
		$errors[] ='Have you active your account?';	
	}else{
		if (strlen($password) > 32){
			$errors[]= 'Password is too long';
		}
		$login = login($username, $password);
		if ($login ===false){
			$errors[]='That username and password does not match!!';
		}else {
			$_SESSION['user_id'] = $login;
			header('location: index.php');
			exit();
		}
	}
} else{
	$errors[]='no errors received.'; 
}
include 'includes/overall/header.php';
if (empty($errors)===false){
?>
	<div class="col-md-9 col-sm-9 col-xs-12"> 
	    <div class="panel panel-default ">    <!-- Start of Recommandations -->
	      <div class="panel-heading">
			<h3>We tried to log you in, but...</h3>
		  </div>
		  <li class="list-group-item">	  
			<?php
				echo output_errors($errors);
			}
			?>
		  </li>
		 </div>
	</div>
	<div class="col-md-3 col-sm-3 col-xs-12 ">
	  <?php include 'includes/aside.php';?>
	</div><!-- .col-sm-4 -->
<?php
	include 'includes/overall/footer.php';
?>

