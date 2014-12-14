<?php
	//set defines.php as highest level so that MODELS_DIR will work in this page
	//require_once $_SERVER['DOCUMENT_ROOT'] . "/" . 'comment' . "/" . 'defines.php';
	echo $_POST['task'];
	if (isset($_POST['task']) && $_POST['task'] == 'comment_insert'){
		//set defines.php as highest level so that MODELS_DIR will work in this page
		//and also it will connect to the database for us
		require_once $_SERVER['DOCUMENT_ROOT'] . "/" . 'comment' . "/" . 'defines.php';
		
		require_once MODELS_DIR . 'comments.php';
		if(class_exists('Comments')){
			if(Comments::delete($_POST['comment_id'])){
				echo "true";
			}
		}
		echo "false";
	}
?>