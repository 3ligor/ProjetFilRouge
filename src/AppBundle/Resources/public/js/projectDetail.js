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

	$('[data-toggle="tooltip"]').tooltip({
		animated: 'fade'
	});

	// toggle edit/view display
	var state = 'view';
	$('#editSkillButton').click(function (e) {
		e.preventDefault();
		if (state === 'edit') {													// Générer l'affichage de vue
//			location.reload();
			state = 'view';
			$('.inactiveSkill').each(function () {
				$(this).removeClass('visible').addClass('hidden');
			});
			$('#skillContainer').addClass('view').removeClass('edit');
			$('span.skillCtrl').addClass('hidden').removeClass('visible');
		} else if (state === 'view') {											// Générer l'affichage d'édition
			state = 'edit';
			$('.inactiveSkill').each(function () {
				$(this).removeClass('hidden').addClass('visible');
			});
			$('#skillContainer').addClass('edit').removeClass('view');
			$('span.skillCtrl').addClass('visible').removeClass('hidden');
		}
	});

	// add/delete skill event Action
	$('span.skillCtrl').click(function (e) {
		e.preventDefault();

		var li = $(this).parent().parent().parent().parent();
		var id = li.attr('id');
		var type = $(this).hasClass('glyphicon-plus');

		$.ajax({
			url: ajaxPath,
			type: 'POST',
			data: {type: type, skillId: id, projectId: projectId}
		}).done(function (data) {
			if (data.status === 'added') {
				li.removeClass('inactiveSkill').addClass('activeSkill');
			} else if (data.status === 'removed') {
				li.addClass('inactiveSkill').removeClass('activeSkill');
			}
			checkCategoryDisplay(li);
		}).fail(function (data) {
			console.log(data);
		});
	});

	function checkCategoryDisplay(li) {
		var parentDiv = li.parent().parent();
		var categoryLi = li.parent()[0].childNodes[1];
//		console.log(parentHasChildsWithClass(li, 'activeSkill'));
		if (parentHasChildsWithClass(li, 'activeSkill')) {
			parentDiv.addClass('activeSkill').removeClass('inactiveSkill');
			$(categoryLi).addClass('activeSkill').removeClass('inactiveSkill');
		} else {
			parentDiv.addClass('inactiveSkill').removeClass('activeSkill');
			$(categoryLi).addClass('inactiveSkill').removeClass('activeSkill');
		}
	}

	function parentHasChildsWithClass(node, cssClass) {
		check = false;
		node.parent().children().each(function () {
			if ($(this).hasClass(cssClass) && !$(this).hasClass('active')) {
				check = true;
			}
		});
		if (check) {
			return true;
		} else {
			return false;
		}
	}
});