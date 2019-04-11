function openEdit(id) {
	var go = $('.phonebook-index').find('#edit_user').load('/web/index.php?r=phonebook/update&id=' + id);
	$('.phonebook-form').show();

}

function saveChanges() {
	var th = $('form.update-form');
	$.ajax({
		type: "POST",
		url: th.attr('action'), //Change
		data: th.serialize(),
		dataType: 'json'
	}).done(function(response) {
		$('.help-block').remove();
		$('.alert').hide();
			if (response.success) {
				console.log('done');
				$.pjax.reload({container: "#users"});
				$('.alert').show();
			} else {

				$.each(response.errorMsg, function(key, item) {
					var $element = $('#phonebook-' + key.toLowerCase());
					$element.after('<p class="help-block">' + item[0] + '</p>');
				});
			}
		});
}
