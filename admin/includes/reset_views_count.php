<?php

	require_once('../../includes/db.php');

	if (isset($_GET['p_id'])) {
		$p_id = $_GET['p_id'];
	}

	$reset_query = "UPDATE posts SET post_views_count = '0'";
	$execute = mysqli_query($connection, $reset_query);

	die("
		<script>
			alert('Views zeradas');
			window.location.href = '../posts';
		</script>
	");