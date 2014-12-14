<!--check for an empty array-->
<?php if(isset($GLOBALS['comments']) && is_array($comments)):?>
<?php foreach($comments as $key => $comment):?>
<!--need to be able to get user information-->
<?php $user = Users::getUser($comment->userId);?>
<li class="comment-holder" id="_<?php echo $comment->comment_id;?>">
	<div class="comment-body">
		<!--now that we got user from the user class we can write this-->
		<h3 class="username-field"> <?php echo $user->userName; ?></h3>
		<div class="comment-text"><?php echo $comment->comment;?></div>
	</div>
	<div class="comment-buttons-holder">
		<ul>
			<li class="delete-btn glyphicon glyphicon-remove btn-danger" id="<?php echo $comment->comment_id;?>"></li>
		<ul>
	</div>
</li>

<?php endforeach?>
<?php endif?>