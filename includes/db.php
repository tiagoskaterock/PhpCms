<?php

	$no_ar = false;

	if (!$no_ar) {
		$connection = mysqli_connect('localhost', 'tiago', '123', 'cms');
	}
	else{
		// coloque as credenciais do banco de dados de produção aqui
		//$connection = mysqli_connect('localhost', 'tiago', '123', 'cms');	
	}
	
	if ($connection) {
		//echo 'We are connected';
	}


?>