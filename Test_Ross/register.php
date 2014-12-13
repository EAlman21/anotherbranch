<?php 
include 'core/init.php';
include 'includes/overall/header.php';

if (empty($_POST) ===false){
	$required_fields = array('username', 'password','password_again','first_name','email');
	foreach($_POST as $key => $value){
		if (empty($value) && in_array($key, $required_fields) === true){
			$errors[] = 'Fields marked with an asterisk are required';
			break 1;
		}
	}
	
	if (empty($errors) === true){
		if (user_exists($_POST['username'])===true){
			$errors[]='Sorry, the username \'' . $_POST['username'] . '\' is already taken.';
		}
		if (preg_match("/\\s/", $_POST['username']) == true){
			$errors[] = "username must not conatin any space.";
		}
		if (strlen($_POST['password'])<6){
			$errors[]='password must at least 6 characters';
		}
		if ($_POST['password'] !== $_POST['password_again']) {
			$errors[] ='Your passwords do not match';
		}
		if (email_exists($_POST['email'])===true){
			$errors[]='Sorry, the email \'' . $_POST['email'] . '\' is already in use.';
		}
	}
}

?>
<div class="row">
	<div class= "panel panel-primary">
	  <div class="panel-heading">
	   <h3>Join Libros today!</h3>
	  </div>

	  
<?php 
if (isset($_GET['success']) && empty($_GET['success'])){
	echo 'You\'ve been registered successfully!';
} else{
		if (empty($_POST) ===false && empty($errors) === true){
			$register_data = array(
				'username' 		=> $_POST['username'],
				'password' 		=> $_POST['password'],
				'first_name' 	=> $_POST['first_name'],
				'last_name' 	=> $_POST['last_name'],
				'email' 		=> $_POST['email'],
			);
			register_user($register_data);
			header('Location: register.php?success');
			exit();
		} else if (empty($errors)===false){
			echo output_errors($errors);
		}
?>

	<form action="" method="post" >
	  <div class="col-md-5 col-xs-5">  
<br>	  
		<li class="list-group-item">
			<input type="text" name="username" id="inputfName" class="form-control" placeholder="*username" required>	
		</li>
		<li class="list-group-item">
			<input type="password" name ="password" id="inputPassword" class="form-control" placeholder="*password [Please enter at least 6 characters for your password]" required>	
		</li>
		<li class="list-group-item">
			<input type="password" name ="password_again" id="inputPassword" class="form-control" placeholder="*password again" required>	
		</li>
		<li class="list-group-item">
			<input type="text" name ="first_name" id="inputfName" class="form-control" placeholder="*First Name" required>
		</li>
		<li class="list-group-item">
			<input type="text" name ="last_name" id="inputlName" class="form-control" placeholder="*Last Name" required>
		</li>
		<li class="list-group-item">
			<input type="email" name ="email" id="inputEmail" class="form-control" placeholder="*Email address" required autofocus>
		</li>
		<!--Button for Register a new account -->
	  </div>
	  <div class="col-md-7 col-xs-7">   
		<?php #include 'includes/widgets/securityQ.php';?>
	  </div>
	  <div class="col-md-12 col-xs-12">  		
		<li class="list-group-item ">
			<button type="submit" value="register" class="btn btn-lg btn-default "  >
				Register as a New Member
			</button>
		</li>	
	  </div>	  
	</form>
	</div>
 </div>
<?php 
}
include 'includes/overall/footer.php';
?>