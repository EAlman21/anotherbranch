$(document).ready(function(){
	//this will fire once the page has been fully loaded
	$('#comment-post-btn').click(function(){
		comment_post_btn_click();
	});
});
//This function will post what is placed in the text area and place it in the
//comment section.  The comment section in html will consist of an 
//unordered list.  Each comment will fall into its own seperate list tag.
//This function will test if anything is written in the textarea.  If not,
//function will change the css to show a red border around the textarea and an
//error message in the console.  Only after the textarea has characters written
//in it, will it then resume back to its default border.  
function comment_post_btn_click(){
	//grab value from text area	
	var _comment = $('#comment-post-text').val();
	//grab username and id
	var _userId = $('#userId').val();
	var _userName = $('#userName').val();
	
	if(_comment.length > 0 && _userId != null){
		//proceed with out ajax callback
		//print in console
		//if bordertextarea was previously red because length
		//then make border back to original color if length is
		//now > 0
		$('.comment-insert-container').css( 'border', '1px solid #e1e1e1');

		$.post("ajax/comment_insert.php",
			{
				task : "comment_insert ",//added a space inside the quotes
				userId : _userId,
				comment : _comment
			}
		)
		.error(
			function(){
					//function to return error
					console.log("Error: ");
				})
		.success(
			function(data){
					//and inserts html into <ul> / <li>
					//parsing "data"(which is a text of the
					//userId, userName, comment) as a javascript object 
					//console.log(jQuery.parseJSON("test:testValue"));
					comment_insert(jQuery.parseJSON(data));
					//function to return response text into console
					console.log("ResponseText: " + data);
					//NOTE: "data" is of type JSON
				}
		);
		console.log(_comment + " User Name: " + _userName + " User Id: " + _userId);
	}
	else{
		//if empty make border of textarea red
		$('.comment-insert-container').css( 'border', '1px solid #ff0000');
		console.log("The text area was empty");
	}
	//remove text from text area on click
	$('#comment-post-text').val("");
}
//Inserting html using jQuery
function comment_insert(data){
	var t= '';
	t += '<li class="comment-holder" id="_'+data.comment.comment_id+'">';
	t += '<div class="comment-body">';
	t += '<h3 class="username-field">'+data.user.userName+'</h3>';
	t += '<div class="comment-text">'+data.comment.comment+'</div>';
	t += '</div>';
	t += '<div class="comment-buttons-holder">';
	t += '<ul>';
	t += '<li class="delete-btn glyphicon glyphicon-remove btn-danger" id="'+data.comment.comment_id+'"></li>';
	t += '<ul>';
	t += '</div>';
	t += '</li>';
	//make t the first child of class .comments-holder-ul class
	//this will insert the htlm for the list of comments when
	//comment-post-btn is clicked
	$('.comments-holder-ul').prepend(t);
	//once we append the list, we immediately apply an event handler to allow 
	//for the element in the list to be delete without having to refresh the page
	add_delete_handlers();
}