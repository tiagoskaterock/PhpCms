// select_all_boxes

$(document).ready(function(){
	
	$('#select_all_boxes').click(function(){

		// seleciona todas
		if (this.checked) {

			$('.checkbox').each(function(){

				this.checked = true;

			})

		}
		// tira seleção de todas
		else {

			$('.checkbox').each(function(){

				this.checked = false;

			})

		}

	});

});