<?php
	function conta_posts_ativos($tabela = 'posts') {
		global $connection;
		$select_query_count = "SELECT * FROM $tabela WHERE post_status = 'Published'";
    $find_count = mysqli_query($connection, $select_query_count);
    $total = mysqli_num_rows($find_count);
    return $total;
	}