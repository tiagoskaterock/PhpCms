<?php

	$no_ar = false;

	if (!$no_ar) {
		$connection = mysqli_connect('hostname', 'username', 'password', 'databasename');
	}
	else{
		// coloque as credenciais do banco de dados de produção aqui
		// $connection = mysqli_connect('hostname', 'username', 'password', 'databasename');
	}
	
	if ($connection) {
		//echo 'We are connected';
	}


?>