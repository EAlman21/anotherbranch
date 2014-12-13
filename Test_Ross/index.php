<?php 
include 'core/init.php';
include 'includes/overall/header.php';
?>
<!-- Content of page -->
<div class="col-md-9 col-sm-9 ">
  <div class= "panel panel-primary">
    <div class="panel-heading">
     <h3>Welcome to Libro!</h3>
    </div> 
  </div>
    <?php include 'includes/widgets/topRating.php';?> 
	<?php include 'includes/widgets/recommendation.php';?>
</div>  

<div class="col-md-3 col-sm-3 col-xs-12 ">
  <?php include 'includes/aside.php';?>
</div><!-- .col-sm-4 -->

<?php include 'includes/overall/footer.php';?>