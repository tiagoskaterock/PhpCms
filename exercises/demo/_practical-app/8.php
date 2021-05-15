<?php include "functions.php"; ?>
<?php include "includes/header.php";?>

	<section class="content">

		<aside class="col-xs-4">

		<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


		
	<article class="main-content col-xs-8">
	
	
	<?php  

	/*  Step 1 -Make a variable with some text as value

		Step 2 - Use crypt() function to encrypt it

		Step 3 - Assign the crypt result to a variable

		Step 4 - echo the variable

	*/

	?>



	<?php
	// See the password_hash() example to see where this came from.
	$var = '123';
	$hash = password_hash($var, PASSWORD_DEFAULT);
	echo "<br>";
	echo $hash;
	echo "<br>";

	if (password_verify($var, $hash)) {
	    echo 'Password is valid!';
	} else {
	    echo 'Invalid password.';
	}
	?>





</article><!--MAIN CONTENT-->
<?php include "includes/footer.php"; ?>