<?php

	$localhost = true;

	if ($localhost) {
		function index() { 
			return '/cms_edwin'; 
		}

		function index_admin() { 
			return '/cms_edwin/admin';
		}

		function show_footer() { 
			require('includes/footer.php'); 
		}

		function show_sidebar() { 
			global $connection;
			require('includes/sidebar.php'); 
		}

		function show_navigation() { 
			global $connection;
			require('includes/navigation.php'); 
		}

	}










	else {
		// code to online website
	}
	