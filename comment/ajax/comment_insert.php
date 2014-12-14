<?php
	//set defines.php as highest level so that MODELS_DIR will work in this page
	//require_once $_SERVER['DOCUMENT_ROOT'] . "/" . 'comment' . "/" . 'defines.php';
	echo $_POST['task'];
	if (isset($_POST['task']) && $_POST['task'] == 'comment_insert'){
		//set defines.php as highest level so that MODELS_DIR will work in this page
		//and also it will connect to the database for us
		require_once $_SERVER['DOCUMENT_ROOT'] . "/" . 'comment' . "/" . 'defines.php';
		$userId = (int)$_POST['userId'];
		
		//we will be using mySQL so we don't want any slashes
		//str_replace function allows us to post with breaks.  Without
		//it the post comment in the list would place everything inline
		//regardless of breaks.
		//echo $_POST['comment'];
		$comment = addslashes(str_replace( "\n" , "<br>", $_POST['comment']));
		$std = new stdClass();
		$std->user = null;
		$std->comment = null;
		$std->error = false;
		require_once MODELS_DIR . 'comments.php';
		
		//checking to see if file is loaded and class exist
		if(class_exists('Comments') && class_exists('Users')){
			$userInfo = Users::getUser($userId);
			if($userId == null){
				$std->error = true;
			}
			
			$commentInfo = Comments::insert($comment, $userId);
				if($commentInfo == null){
				//if it's not null we know there is an object so 
				//that means we have the comment information
					$std->error = true;
				}
				
				$std->user = $userInfo;
				$std->comment = $commentInfo;
		}
		echo json_encode($std);
	}
	else{
		//send back to main page
		header('location: /comment');
	}
?>