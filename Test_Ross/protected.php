<?php 
include 'core/init.php';
include 'includes/overall/header.php';
?>
  <div class="col-md-9 col-xs-12">
    <div class= "panel panel-default">
      <div class="panel-heading">
       <h3> Sorry, you need to be logged in to do that!</h3>
      </div>
	  <li class="list-group-item">
		<p> Please <a href="login_form.php">log in</a> or <a href="register.php">register</a>.</p>
	  </li>
    </div>
  </div>

<div class="col-md-3 col-sm-3 col-xs-12 ">
  <?php include 'includes/aside.php';?>
</div><!-- .col-sm-4 -->


<?php include 'includes/overall/footer.php';?>