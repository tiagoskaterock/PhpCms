<?php include "functions.php"; ?>
<?php include "includes/header.php";?>

	<section class="content">

	<aside class="col-xs-4">

		<?php Navigation();?>
			
		
	</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

	
	<?php  

/*  Step1: Define a function and make it return a calculation of 2 numbers

	Step 2: Make a function that passes parameters and call it using parameter values


 */
	$n1 = 9;
	$n2 = 3;


	function soma(){
		global $n1;
		global $n2;
		return $n1 + $n2;
	}

	echo "<h2>";
	echo soma();
	echo "</h2>";




	function calc($num1, $num2){
		return $num1 + $num2;
	}

	echo "<h2>";
	echo calc(6, 7);
	echo "</h2>";

	
?>





</article><!--MAIN CONTENT-->


<?php include "includes/footer.php"; ?>