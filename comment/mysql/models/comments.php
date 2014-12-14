<?php

	require_once MODELS_DIR . 'users.php';

class Comments{
	public static function getComments(){
	
	}
	//return a stdClass Object from the database
	public static function insert($comment_txt, $userId){
		$comment_txt = addslashes($comment_txt);
		$sql = "insert into comments values('', '$comment_txt', $userId)";
		$query = mysql_query($sql);
		$std = new stdClass();
		if($query){
			$insert_id = mysql_insert_id();
			
			//insert data into the database
			//we create a new standard class because when we extract
			//the comment, it will be done as an object
			//using mySQL_fetch_object.  And that one row will be the 
			//new standard class.
			
			$std-> comment_id = $insert_id;
			$std-> comment = $comment_txt;
			$std-> userId = (int)$userId;
			
			return $std;
		}
		return null;
	}	
	
	public static function update($data){
		//update comments from the comments database
		$output = array(); //output an empty array
		$sql = "SELECT * FROM comments ORDER BY comment_id desc" ;
		$query = mysql_query($sql);
		if($query){
			if(mysql_num_rows($query) > 0){
				while($row = mysql_fetch_object($query)){
					$output[] = $row;
				}
			}
		}
		return $output;
	}	
	public static function delete($commentId){
		//delete the comments from the comments database
		//using the id  of comment_id
		//mysql_query('delete from the comments where id=$comment_id')
		$sql = "DELETE FROM comments WHERE comment_id=$commentId";
		$query = mysql_query($sql);
		if($query){
			return true;
		}
		return null;
	}
}
?>