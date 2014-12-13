<?php 
include 'core/init.php';
protect_page();

if (empty($_POST) === false){
	$required_fields = array('current_password','password','password_again');
	foreach($_POST as $key => $value){
		if (empty($value) && in_array($key, $required_fields) === true){
			$errors[] = 'Fields marked with an asterisk are required';
			break 1;
		}
	}
	if (md5($_POST['current_password']) === $user_data['password']){
		if ($_POST['password'] !== trim($_POST['password_again'])){
			$errors[]='Your new password do not match.';
		} else if (strlen($_POST['password'])<6){
			$errors[]='password must at least 6 characters';
		}
	} else{
		$errors[] = 'Current password is incorrect, please try again!';
	}
	print_r($errors);
}
include 'includes/overall/header.php';
?>
  <!-- Content of page -->
  <div class="col-md-8 col-xs-8">
    <div class= "panel panel-primary">
      <div class="panel-heading">
       <h3>Change Password</h3>
      </div>
		  <form action="" method="post">
			  <li class="list-group-item">
				Current passsword*:
				<input type="text" name ="current_password" class="form-control"  placeholder="Current password">
			  </li>
			  <li class="list-group-item">
				New password*:<br>
				<input type="text" name ="password" class="form-control"  placeholder="New password">
			  </li>
			  <li class="list-group-item">
				New password again*:<br>
				<input type="text" name ="password_again" class="form-control"  placeholder="New password again">
			  </li>
			  <li class="list-group-item">
				<button type="submit" value="Change password" class="btn btn-primary" >Change password </button>
			  </li>
		  </form>
    </div>	
  </div>
  
  <div class="col-md-4 col-xs-4 ">
	<?php include 'includes/aside.php';?>
  </div><!-- .col-sm-4 -->

<?php include 'includes/overall/footer.php';?>