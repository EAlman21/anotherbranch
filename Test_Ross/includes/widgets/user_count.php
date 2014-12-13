
<div class="panel-heading">
	<h7>Users</h7>
</div>
<li class="list-group-item">
	<?php
	$user_count = user_count();
	$suffix =($user_count != 1) ? 's' : '';
	?>
	<span>We current have <?php echo user_count();?> registered user<?php echo $suffix;?>.</span>
</li>