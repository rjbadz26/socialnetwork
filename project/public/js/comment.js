$(document).ready(function(){
	doRun();
});


function doRun(){
	$('.enter_btn').on('click',function(){
		postId = $(this).data('postid');
		comment = $(this).parents('div.comment_box').children('textarea');

		$.ajax({
			method:'POST',
			url:urlComment,
			data:{comment:comment.val(), post_id:postId , user_id:userId, _token:token }
		})
		.done(function(){
			$('#posts').load(urlDisplayPosts);
		});
	});

}