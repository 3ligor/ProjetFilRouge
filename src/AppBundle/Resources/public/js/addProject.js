jQuery(document).ready(function () {
	jQuery.expr[':'].regex = function (elem, index, match) {
		var matchParams = match[3].split(','),
				validLabels = /^(data|css):/,
				attr = {
					method: matchParams[0].match(validLabels) ?
							matchParams[0].split(':')[0] : 'attr',
					property: matchParams.shift().replace(validLabels, '')
				},
		regexFlags = 'ig',
				regex = new RegExp(matchParams.join('').replace(/^s+|s+$/g, ''), regexFlags);
		return regex.test(jQuery(elem)[attr.method](attr.property));
	};

	// Stage Manager
	var collectionHolderStage = $('div.stages');
	var $addStageLink = $('<div class="col-xs-6 col-sm-4 col-md-3 text-center"><a href="#" class="add_stage_link"><button type="button" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-plus"></span></button></a></div>');
	var $newLinkDiv = $('<span></span>').append($addStageLink);

	collectionHolderStage.append($newLinkDiv);
	collectionHolderStage.find('div.stage').each(function () {
		addStageFormDeleteLink($(this));
	});

	$addStageLink.on('click', function (e) {
		e.preventDefault();
		addStageForm(collectionHolderStage, $newLinkDiv);
	});

	function addStageForm(collectionHolderStage, $newLinkDiv) {
		var prototype = collectionHolderStage.attr('data-prototype');
		var newForm = prototype.replace(/__name__/g, collectionHolderStage.children().length);
		var $newFormDiv = $('<div class="stage col-xs-6 col-sm-4 col-md-3"></div>').append(newForm);
		$newLinkDiv.before($newFormDiv);

		addStageFormDeleteLink($newFormDiv);
	}

	function addStageFormDeleteLink($stageFormDiv) {
		var $removeFormA = $('<a href="#"><button type="button" class="btn btn-default btn-xs btn-block"><span class="glyphicon glyphicon-remove"></span></button></a><hr />');
		$stageFormDiv.append($removeFormA);
		$removeFormA.on('click', function (e) {
			e.preventDefault();
			$stageFormDiv.remove();
		});
	}

	$('.stages').keyup(function () {
		totalStageVolume();
	});

	(totalStageVolume = function () {
		var sum = 0;
		$(".stage input:regex(id, *_volume)").each(function () {
			sum += +Math.abs($(this).val());
		});
		if (sum < 100 && sum >= 0) {
			$("#total").html(': <span class="label label-info">' + sum + '%');
		} else if (sum === 100) {
			$("#total").html(': <span class="label label-success">' + sum + '%</span>');
		} else {
			$("#total").html(': <span class="label label-danger">' + sum + '%</span>');
		}
	})();
	// Stage Manager

	if (userRole === 'admin') {
		// UserProject Manager
		var collectionHolderInvite = $('ul.invites');
		var $addInviteLink = $('<a href="#" class="add_invite_link list-group-item text-center"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></button></a>');
		var $newLinkUl = $('<span></span>').append($addInviteLink);

		collectionHolderInvite.append($newLinkUl);
		collectionHolderInvite.find('li.invite').each(function () {
			addInviteFormDeleteLink($(this));
		});

		$addInviteLink.on('click', function (e) {
			e.preventDefault();
			addInviteForm(collectionHolderInvite, $newLinkUl);
		});

		function addInviteForm(collectionHolderInvite, $newLinkUl) {
			var prototype = collectionHolderInvite.attr('data-prototype');
			var newForm = prototype.replace(/__name__/g, collectionHolderInvite.children().length);
			var $newFormUl = $('<li class="list-group-item"></li>').append(newForm);
			$newLinkUl.before($newFormUl);

			addInviteFormDeleteLink($newFormUl);
		}

		function addInviteFormDeleteLink($inviteFormDiv) {
			var $removeFormA = $('<br /><a href="#"><button type="button" class="btn btn-default btn-xs btn-block"><span class="glyphicon glyphicon-remove"></span></button></a>');
			$inviteFormDiv.append($removeFormA);
			$removeFormA.on('click', function (e) {
				e.preventDefault();
				$inviteFormDiv.remove();
			});
		}
	}

	$(".invites select:regex(id, *_status)").each(function () {
		changeLiColor(this);
	});

	$(".invites").click(function (e) {
		var pattern = /_userProjects_[0-9]+_status/;
		if (pattern.test(e.target.id)) {
			changeLiColor(e.target);
		}
	});

	function changeLiColor(node) {
		if (node.value === '0') {
			node.parentNode.parentNode.setAttribute('class', 'list-group-item list-group-item-danger');
		} else if (node.value === '1') {
			node.parentNode.parentNode.setAttribute('class', 'list-group-item list-group-item-info');
		} else if (node.value === '2') {
			node.parentNode.parentNode.setAttribute('class', 'list-group-item list-group-item-success');
		} else if (node.value === '3') {
			node.parentNode.parentNode.setAttribute('class', 'list-group-item');
		} else if (node.value === '4') {
			node.parentNode.parentNode.setAttribute('class', 'list-group-item list-group-item-warning');
		}
	}
	// UserProject Manager


});
