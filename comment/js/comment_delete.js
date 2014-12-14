$(document).ready(function(){
	//when the page has loaded fully add an event handler to allow
	//each comment to be deleted without having to refresh the page
	$('.delete-btn').each(function();
});

//trigger event handler that will allow you to delete comment
//without having to refresh the page
function add_delete_handlers(){
	//we need to loop to loop through all the buttons in the li
	$('.delete-btn').each(function(){
		var btn = this;
		$(btn).click(function(){//attach handler to every button
			comment_delete(btn.id);
		});	
	});
}
//know which commment to delete by using the id of the element
//each comment has a unique id based off a numerical value.
//each new comment is incremented by one from the last inserted comment
function comment_delete(_comment_id){
	$.post("ajax/comment_delete.php",
		{
			task: "comment_delete",
			comment_id : _comment_id
		}
		).success(function(data){
			$('#_' + _comment_id).detach();
		});
}