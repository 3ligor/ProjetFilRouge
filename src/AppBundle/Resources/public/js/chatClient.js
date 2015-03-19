$(document).ready(function ($) {

	var version = '1.1.2';
	if (localStorage.previousMessages === undefined) {
		localStorage.previousMessages = JSON.stringify([]);
	}
	var previousMessages = JSON.parse(localStorage.previousMessages);
	var previousMessagesPosition = -1;
	var windowState = 'focus';
	var pageTitle = document.title;
	var nbUnread = 0;

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

		var socket = io('http://rage-inside.fr:3001');
		var user = {
			pseudo: username,
			version: version
		};
		if (user.pseudo === undefined) {
			user.pseudo = 'anonymous';
		}

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

			previousMessagesPosition = -1;
			saveChatMessage($('input#msg').val());
			$('input#msg').val('');
		});

		$('form input').keydown(function (e) {
			if (e.keyCode === 38) {
				previousMessagesPosition++;
			} else if (e.keyCode === 40) {
				previousMessagesPosition--;
			} else {
				return;
			}

			if (previousMessages[previousMessagesPosition] !== undefined) {
				$('input#msg').val(previousMessages[previousMessagesPosition]);
			} else if (previousMessagesPosition < -1) {
				previousMessagesPosition = previousMessages.length - 1;
				$('input#msg').val(previousMessages[previousMessagesPosition]);
			} else if (previousMessagesPosition > previousMessages.length - 1 || previousMessagesPosition === -1) {
				previousMessagesPosition = -1;
				$('input#msg').val('');
			}
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
				easing: 'easeInExpo'
			});
			newUser.click(function (e) {
				e.preventDefault();
				destId = e.currentTarget.id;
				$('input#msg').val('/pv ');
			});
		}
	}

	function saveChatMessage(msg) {
		previousMessages = JSON.parse(localStorage.previousMessages);
		previousMessages.unshift(msg);
		if (previousMessages.length >= 20) {
			previousMessages.pop();
		}
		localStorage.previousMessages = JSON.stringify(previousMessages);

		return;
	}

	function scrollToBottom() {
		$("#messageContainer").scrollTop($("#messageContainer")[0].scrollHeight);
	}

	function userInChat() {
		$.ajax({
			url: 'http://rage-inside.fr:3001/nb'
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