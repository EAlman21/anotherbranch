<?php require_once $_SERVER['DOCUMENT_ROOT']. '/comment/defines.php' ;?>
<?php require_once MODELS_DIR . 'comments.php';?>
<!Doctype html><html>
	<head>
		<title></title>
		<link href="css/layout.css" rel="stylesheet">
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		
		<script type="text/javascript" src="/comment/js/jquery.js"></script>
		<!--The ?=<_?php_echo_time_(_)_?_> tells us that we are garunteed a new page when we load -->
		<!--This can be seen in the console-->
		<script type="text/javascript" src="/comment/js/comment_insert.js?=<?php echo time(); ?>"></script>
		<script type="text/javascript" src="/comment/js/comment_delete.js?=<?php echo time(); ?>"></script>
		<script type="text/javascript" src="/comment/js/script.js"></script>
	</head>
	<body>
		<div class="wrapper">
			<div class="page-data">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h2> A Game of Throne </h2>
					</div>
					<div class="panel-body">
						<table class="table">
						<tr>
							<td><image src="AGameOfThrones.jpg"></td>
							<td>
								<tr>
									<p>A Game of Thrones is the first novel in A Song of Ice and Fire, a series of high fantasy novels by American author George R. R. Martin. It was first published on August 6, 1996. The novel won the 1997 Locus Award and was nominated for both the 1997 Nebula Award and the 1997 World Fantasy Award.</p>

								</tr>
								<tr>
									<button class="btn btn-lg btn-primary " type="submit">Add 
										<span class="glyphicon glyphicon-shopping-cart"></span>
									</button>
									<button class="btn btn-lg btn-primary" type="submit">Buy it</button>
								</tr>
							</td>
						</tr>
						</table>
					</div>  
					{{Price}}{{Stock_Amount}}
					{{Customer_Comment @Book_Name}}
				</div>
			</div>
			<div class="comment-wrapper">
				<h3 class="comment-title">User feedback....</h3>
					<div class="comment-insert">
						<h3 class="who-says"> <span><i>Says:</i></span> Username</h3>
						<div class="comment-insert-container">
							<textarea class="comment-insert-text" id="comment-post-text"></textarea>
						</div>
						<div class="comment-post-btn-wrapper" id="comment-post-btn">POST
						</div>
					</div>
					<div class="comments-list">
						<ul class="comments-holder-ul">
							<?php $comments = Comments::getComments();?>
							<?php require_once INCLUDES . 'comment_box.php'; ?>
						</ul>
					</div>
			</div>
		</div>
		
		<input type="hidden" id="userId" value="1"/>
		<input type="hidden" id="userName" value="User Name"/>
		
	</body>
</html>