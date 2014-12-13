<?php
session_start();
#error_reporting(0);

require 'database/connect.php';	
require 'functions/general.php';	
require 'functions/users.php';	
require 'functions/books.php';	
if(logged_in() ===true) {
	$session_user_id = $_SESSION['user_id'];
	$user_data = user_data($session_user_id, 'user_id','username','password','first_name', 'last_name','email');
	if (user_active($user_data['username']) === false){
		session_destroy();
		header('location: index.php');
		exit();
	}
}
if(select_book()===true) {
	$session_book_id = $_SESSION['book_id'];
	$book_data = book_data($session_book_id, 'title','author','genere','price', 'description');
}
$errors = array();
?>