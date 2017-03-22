$(document).ready(function(){
	doRun();
});

var user1 = 0;
var user2 = 0;
var action = 0;
var status = 0;

function doRun(){
	$('.rel_btn').on('click',function(){
		var rel_btn_val = $(this).text();
		user1 = $(this).data('user1');
		user2 = $(this).data('user2');
		action = $(this).data('action');
		status = $(this).data('status');

		if(rel_btn_val == 'Unfriend'){
			alert(user1 + ' ' + user2 + ' ' + action + ' ' + status);
			$.ajax({
				method:'POST',
				url:urlUpdateRel,
				data:{user1:user1,user2:user2,action:action,status:status,_token:token}
			})
			.done(function(){
				alert('updated');
			});

			$(this).text('Add Friend');
			$(this).removeClass('btn-warning').addClass('btn-primary');
			$(this).data('action',userId);
			$(this).data('status',3);
		}else if(rel_btn_val == 'Add Friend'){
			alert(user1 + ' ' + user2 + ' ' + action + ' ' + status);
			$.ajax({
				method:'POST',
				url:urlUpdateRel,
				data:{user1:user1,user2:user2,action:action,status:status,_token:token}
			})
			.done(function(){
				alert('updated');
			});
			$(this).text('Friend Request Sent');
			$(this).removeClass('btn-primary').addClass('btn-success');
			$(this).prop('disabled',true);
		}else if(rel_btn_val == 'Confirm'){
			alert(user1 + ' ' + user2 + ' ' + action + ' ' + status);
			$.ajax({
				method:'POST',
				url:urlUpdateRel,
				data:{user1:user1,user2:user2,action:action,status:status,_token:token}
			})
			.done(function(){
				alert('updated');
			});
			$(this).text('Unfriend');
			$(this).removeClass('btn-info').addClass('btn-warning');
			$(this).data('action',userId);
			$(this).data('status',2);
		}

		
		
	});
}