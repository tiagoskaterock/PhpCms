<?php
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

	function escape($string) {
		global $connection;
		$string = trim($string);
		$string = strip_tags($string);
		$string = mysqli_real_escape_string($connection, $string);
		return $string;
	}

