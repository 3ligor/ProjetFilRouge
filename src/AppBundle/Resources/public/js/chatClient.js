$(document).ready(function ($) {

	$('#chatBtn').click(chatManager);

	function chatManager() {
		$('#chatBtn').unbind('click');
		$('#chatContainer').resizable({
			handles: 's',
			alsoResize: '#chat',
			minHeight: 270,
			maxHeight: 700
		});

		var destId;
		var windowState = 'focus';
		var pageTitle = document.title;
		var nbUnread = 0;
		var socket = io('http://localhost:3000');
		var user = {
			pseudo: username
		};

		socket.emit('customConnection', user);

		$('form').submit(function (e) {
			e.preventDefault();

			var messageData = {
				user: user,
				message: $('input#msg').val()
			};
			if ($('input#msg').val().indexOf('/pv') === 0) {
				console.log(destId);
				messageData.destId = destId;
			}
			socket.emit('chatMessage', messageData);
			$('input#msg').val('');
		});

		$(window).focus(function () {
			windowState = 'focus';
			document.title = pageTitle;
			nbUnread = 0;
		});

		$(window).blur(function () {
			windowState = 'blur';
		});

		$('#chat div.panel-body').on('resize start stop', function (event) {
			scrollToBottom();
			$('#chat').css('width', '');
		});

		socket.on('chatMessage', function (data) {
			$('#messages').append($('<tr><td class="smallTD"><span class="hidden-sm hidden-xs">' + data.datetime + ' - </span><strong>' + data.pseudo + '</strong></td><td>' + data.message + '</td></tr>'));
			scrollToBottom();

			if (windowState === 'blur') {
				nbUnread++;
				document.title = nbUnread + ' Unread Messages';
			}
		});

		socket.on('userlist', function (data) {
			$.each(data, function (index, value) {
				appendUser(value);
			});
		});

		socket.on('userjoin', function (data) {
			appendUser(data);
			$('#messages').append($('<tr><td class="smallTD"><span class="hidden-sm hidden-xs">' + data.datetime + ' - </span><strong>' + data.pseudo + '</strong></td><td><i>Join :-)</i></td></tr>'));
			scrollToBottom();
		});

		socket.on('userleft', function (data) {
			$('a#' + data.socketId).hide('slide', {
				easing: 'easeInExpo',
				complete: function () {
					$('a#' + data.socketId).remove();
				}
			});
			$('#messages').append($('<tr><td class="smallTD"><span class="hidden-sm hidden-xs">' + data.datetime + ' - </span><strong>' + data.pseudo + '</strong></td><td><i>Left :-(</i></td></tr>'));
			scrollToBottom();
		});

		socket.on('reconnect', function (data) {
			$('#userlist').empty();
			socket.emit('customConnection', user);
		});

		socket.on('nbUserInChat', function (data) {
			displayUserInChat(data.nb);
		});


		function appendUser(data) {
			var newUser = $('<a id=' + data.socketId + ' class="list-group-item chatUser" href="#" style="display: none;">' + data.pseudo + '</a>');
			$('#userlist').append(newUser);
			$('#' + socket.id).addClass('list-group-item-success');
			newUser.show('slide', {
				easing: 'easeInExpo',
			});
			newUser.click(function (e) {
				e.preventDefault();
				destId = e.currentTarget.id;
				$('input#msg').val('/pv ');
			});
		}
	}

	function scrollToBottom() {
		$("#messageContainer").scrollTop($("#messageContainer")[0].scrollHeight);
	}

	function userInChat() {
		$.ajax({
			url: 'http://localhost:3000/nb'
		}).done(function (data) {
			displayUserInChat(data.nb);
		});
	}

	function displayUserInChat(nb) {
		$('#userInChat').remove();
		$('#chatBtn').append($('<span id="userInChat" class="badge">' + nb + '</span>'));
	}

	setTimeout(function () {
		userInChat();
	}, 1000);

});