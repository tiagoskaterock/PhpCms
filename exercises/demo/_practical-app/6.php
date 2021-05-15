
<?php include "functions.php"; ?>
<?php include "includes/header.php";?>

	<section class="content">

		<aside class="col-xs-4">
		
		<?php Navigation();?>
			
		</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">
 	<form action="" method="post">
 		<input type="text" name="nome">
 		<button type="submit">GO</button>
 	</form>

	<?php  

		if (isset($_POST['nome'])) {
			echo $_POST['nome'];
			print_r($_POST);
		}

	// Step1: Make a form that submits one value to POST super global
	
?>


</article><!--MAIN CONTENT-->
<?php include "includes/footer.php"; ?>