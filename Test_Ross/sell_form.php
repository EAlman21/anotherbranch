<?php 
include 'core/init.php';
include 'includes/overall/header.php';
protect_page();

if (empty($_POST) === false){
	$required_fields = array('title', 'author','price','book_condition');
	foreach($_POST as $key => $value){
		if (empty($value) && in_array($key, $required_fields) === true){
			$errors[] = 'Fields marked with an asterisk are required';
			break 1;
		}
	}

	if (empty($errors) === true){
		if (book_exists($_POST['title'],$_POST['author'])===true){
			$errors[]='Sorry, the book < \'' . $_POST['title'] . '\'> is already exist.';
		}
	}
	/*
	$booktitle = $_POST['title'];
	$bookauthor = $_POST['author'];
	$bookgenre = $_POST['genre'];
	$bookprice = $_POST['price'];
	$bookcondition = $_POST['condition'];
	$book_cover = $_POST['book_cover'];
	
	$username = "csc322";
	$password = "123";
	$hostname = "localhost";
	$db = mysql_connect($hostname,$username,$password) or die("There was an error.");

	$query = "INSERT INTO csc322.books (`book_id`, `title`, `author`, `genre`, `price`, `book_condition`, `book_cover`, `rating`, `owner`) VALUES (NULL,'".$booktitle."' ,'".$bookauthor."', '".$bookgenre."', '".$bookprice."', '".$bookcondition."', NULL, NULL, '2')";

	//mysql_query("use csc322");
	$result = mysql_query($query);
	
	if($result){echo "everything Went Well";}
	else{echo mysql_error();};
	*/
}
?>
  <!-- Content of page -->
  <div class="col-md-9 col-sm-9 col-xs-12">
    <div class= "panel panel-primary">
      <div class="panel-heading">
       <h3>Have an extra copy of book? Sell it today! (<-TODO)</h3>
      </div>
<?php 
if (isset($_GET['success']) && empty($_GET['success'])){
	echo 'You\'ve added new book successfully!';
} else{
		if (empty($_POST) ===false && empty($errors) === true){
			$book_data = array(
				'title' 			=> $_POST['title'],
				'author'			=> $_POST['author'],
				'genre' 			=> $_POST['genre'],
				'price' 			=> $_POST['price'],
				'book_condition' 	=> $_POST['book_condition'],
				'book_cover' 		=> $_POST['book_cover'],
			);
			add_books($book_data);
			header('Location: sell_form.php?success');
			exit();
		} else if (empty($errors)===false){
			echo output_errors($errors);
		}
?>
	  <form class="form-horizontal" action="" method="post" action="Book_Reg.php">
		  <li class="list-group-item">
			<label>Book Title:</label>
			<input type="text" name="title" class="form-control"  placeholder="BookTitle">
		  </li>
		  <li class="list-group-item">
			<label>Author name:</label>
			<input type="text" name="author" class="form-control"  placeholder="Author name">
		  </li>  
		  <li class="list-group-item">
			<label>Genre:</label>
			<input type="text" name="genre" class="form-control"  placeholder="Genre">
		  </li>  
		  <li class="list-group-item">
			<label>Price:</label>
			<input type="text" name="price" class="form-control"  placeholder="Price (unit: $)">
		  </li>
		  <li class="list-group-item">
			<label>Condition:</label>
			<input type="text" name="book_condition" class="form-control"  placeholder="Condition">
		  </li>
		  <li class="list-group-item">
			<label>Book Cover</label>
			<input type="file" name="book_cover" >
		  </li>
		  <li class="list-group-item">
			<button type="submit" value="Log in" class="btn btn-default" > List for sell</button>
		  </li>
	  </form>
<?php }?>
    </div>
	<?php include 'includes/widgets/recommendation.php';?>                       
  </div>
  <div class="col-md-3 col-sm-3 col-xs-12">
  	<?php include 'includes/widgets/side_recommendation.php';?>
  </div> 
<?php 
	include 'includes/overall/footer.php';
?>
