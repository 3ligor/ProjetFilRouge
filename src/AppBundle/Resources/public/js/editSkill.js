jQuery(document).ready(function () {
	$('.editskillbtn').click(function (e) {
		e.preventDefault();
		//	Get the id of the current ahref
		var id = this.id;
		//	Save the content of the div "title" with the same id of the ahref
		var content = $('#title' + id).html();
		//	If the ahref has the attribut "enable" to true
		if ($(this).attr('enable') === "true") {
			// Add the hidden attribute to the div i want to hide
			$('#displaySkill' + id).attr('class', 'hidden');
			// Replace the "hidden" attribute by "row" to the div i want to show
			$('#editSkill' + id).attr('class', 'row');
			// Give the previous content to the input
			$('#editSkill' + id + ' #skillName' + id).val(content);
		}
	});
});

function saveEditSkill(id) {
	var that = this;
	var skillName = $('#skillName' + id).val();
	var id = id;
	console.log(ajaxPath);
	$.ajax({
		url: ajaxPath,
		type: 'POST',
		data: {title: skillName, id: id}
	}).done(function (data) {
		// Replace the "hidden" attribute by "row" to the div i want to show
		$('#displaySkill' + id).attr('class', 'row');
		$('#title' + id).html(skillName);
		// Add the hidden attribute to the div i want to hide
		$('#editSkill' + id).attr('class', 'hidden');
	});
}