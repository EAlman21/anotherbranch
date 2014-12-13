<?php
	$connect_error ="Sorry, connect failed.";
	mysql_connect('localhost','csc322','123') or die ($connect_error);
	mysql_select_db('csc322') or die ($connect_error);
?>