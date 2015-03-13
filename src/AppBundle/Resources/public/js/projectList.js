$(document).ready(function () {

	$('tr.projectRow').on('mouseover', function(e) {
		console.log(e.currentTarget.parentNode.next);
	});
});