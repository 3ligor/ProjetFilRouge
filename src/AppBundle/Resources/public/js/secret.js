$(document).ready(function () {


	var keystring = '';
	var kc = '38384040373937396566';
	$('html').on('keyup', function (e) {
		keystring += String(e.keyCode);
		if (keystring === kc) {
			$('body').addClass('bgColor');
		} else if (kc.indexOf(keystring) !== 0) {
			keystring = '';
		}
	});

	$('html').on('mousemove', function (event) {
		var colorR = Math.abs(event.clientX % 255 - 130) + 130;
		var colorG = Math.abs(event.clientY % 255 - 130) + 130;
		var colorB = Math.abs((colorR + colorG + 255) % 510 - 255);
		$(".bgColor").attr('style', 'background-color: rgb(' + colorR + ',' + colorG + ',' + colorB + ');');
	});

});