<?php include "functions.php"; ?>
<?php include "includes/header.php";?>

	<section class="content">

		<aside class="col-xs-4">

	<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


		<article class="main-content col-xs-8">
		

<?php



		/* Step 1: Make 2 variables called number1 and number2 and set 1 to value 10 and the other 20:

		  Step 2: Add the two variables and display the sum with echo:


		  Step3: Make 2 Arrays with the same values, one regular and the other associative

		 
			 */

		  $number1 = 10;
		  $number2 = 20;

		  ?>

		  	<h2><?php echo $number1 + $number2; ?></h2> 

		  <?php

		  $meninas = array('Ingrid', 'Miriam', 'Alexia', 'Fernanda', 'Marcia', 'Andreia', 'Marilia');

		  $metallica = array("James"=>"Singer", "Kirk"=>"Guitar", "Bob"=>"Bass", "Lars"=>"Drumms");

		  ?>
		  	<h2>Meninas</h2>
		  	<ul>
		  <?php

		  foreach ($meninas as $guria) {
		  	?>
		  	<li><?php echo $guria; ?></li>
		  	<?php
		  }

		  ?>
		  	</ul>
		  <?php




		  echo "<h2>Metallica</h2>";
		  echo "<ul>";
		  foreach($metallica as $member => $function) {
		  	echo "<li>$member, $function</li>";
			}
		  echo "</ul>";

		?>

	

		</article><!--MAIN CONTENT-->

<?php include "includes/footer.php"; ?>