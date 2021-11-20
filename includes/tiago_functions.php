<?php

function confirm_query($result){
  global $connection;
  if (!$result) {
    die('QUERY FAILED: ' . mysqli_error($connection));
  }
  return $result;
}

function conta_posts_ativos($tabela = 'posts') {
	global $connection;
	$select_query_count = "SELECT * FROM $tabela WHERE post_status = 'Published'";
$find_count = mysqli_query($connection, $select_query_count);
$total = mysqli_num_rows($find_count);
return $total;
}

function conta_posts_ativos_por_categoria($tabela = 'posts', $categoria) {
	global $connection;
	$select_query_count = "SELECT * FROM $tabela WHERE post_status = 'Published' AND post_category_id = $categoria";
$find_count = mysqli_query($connection, $select_query_count);
$total = mysqli_num_rows($find_count);
return $total;
}

function mostra_views(){
	global $post_views_count;
	if ($post_views_count == 1) {
    echo "$post_views_count view";
}
else {
    echo "$post_views_count views";
} 
}

// função utilizada para evitar ataques nos formulários
function escape($string) {
	global $connection;
	$string = trim($string);
	$string = strip_tags($string);
	$string = mysqli_real_escape_string($connection, $string);
	return $string;
}

// função utilizada para conferir se usuário com mesmo username já existe
function username_exists($username) {
	global $connection;

	$query = "SELECT * FROM `users` WHERE user_name = '$username'";
	$result = mysqli_query($connection, $query);
	confirm_query($result);

	// se achar resultados com mesmo nome
	return mysqli_num_rows($result) > 0 ? true : false;
}

// função utilizada para conferir se usuário com mesmo email já existe
function useremail_exists($useremail) {
	global $connection;

	$query = "SELECT * FROM `users` WHERE user_email = '$useremail'";
	$result = mysqli_query($connection, $query);
	confirm_query($result);

	// se achar resultados com mesmo email
	return mysqli_num_rows($result) > 0 ? true : false;
}