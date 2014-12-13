<?php
function book_data($book_id){
	$data = array();
	$book_id =(int) $book_id;
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if ($func_num_args > 1) {
		unset($func_get_args[0]);

		$fields = '`' . implode ('`, `', $func_get_args) . '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `books` WHERE `book_id` = $book_id"));
		echo $fields;
		return $data;
	}
}

function select_book(){
	return (isset($_SESSION['book_id'])) ? true : false;
}
function add_books($book_data){
	array_walk($book_data, 'array_sanitize');
	$fields = '`' . implode('`, `', array_keys ($book_data)) . '`';
	$data='\'' . implode('\',\'', $book_data) . '\'';
	mysql_query("INSERT INTO `books` ($fields) VALUES ($data)");
}


function book_exists($title,$author){
	$title = sanitize($title);
	$author = sanitize($author);
	return (mysql_result(mysql_query("SELECT COUNT(`boook_id`) FROM `books` WHERE `title` = '$title' AND `author` = '$author'"), 0) == 1 ) ? true : false;
}
?>