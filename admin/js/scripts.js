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







function load_users_online() {

	$.get("functions.php?online_users=result", function(data){

		$(".users_online").text(data);

	});

}




setInterval(function(){

	load_users_online();

}, 500);




load_users_online();