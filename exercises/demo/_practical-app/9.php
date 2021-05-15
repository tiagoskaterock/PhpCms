<?php include "functions.php"; ?>
<?php include "includes/header.php";?>



	<section class="content">

		<aside class="col-xs-4">

		<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


			<article class="main-content col-xs-8">



				<a href="?tiago_var=lindo">Click Here</a>
				<a href="?tiago_var=">Click Here</a>



				<h3>
					<?php
						if (isset($_GET['tiago_var'])) {
							echo $_GET['tiago_var'];
						}
					?>						
				</h3>



				<?php
					$cookie_name = 'tiago_cookie';
					$cookie_value = 'lindo_e_gostoso';
					setcookie($cookie_name, $cookie_value, time() + 60 * 60 * 24 * 7);
				?>		




				<?php
					session_start();

					$_SESSION['nome'] = 'Tiago';

				?>




				<?php

					if (isset($_COOKIE['tiago_cookie'])) {
						echo $_COOKIE['tiago_cookie'] . "<br>";
					}

				?>
		
	
	<?php 

	/*  Create a link saying Click Here, and set 
	the link href to pass some parameters and use the GET super global to see it

		Step 2 - Set a cookie that expires in one week

		Step 3 - Start a session and set it to value, any value you want.
	*/
	
	?>





</article><!--MAIN CONTENT-->
<?php include "includes/footer.php"; ?>