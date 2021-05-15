<?php include "functions.php"; ?>
<?php include "includes/header.php";?>

	<section class="content">

	<aside class="col-xs-4">

	<?php Navigation();?>
			
	</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

<?php  

/*  Step1: Make an if Statement with elseif and else to finally display string saying, I love PHP




	Step 2: Make a forloop  that displays 10 numbers


	Step 3 : Make a switch Statement that test againts one condition with 5 cases

 */
	$happy = 'yes';

	if ($happy == 'no') {
		echo "<h2>I love Java</h2>";
	}
	else if ($happy == 'maybe') {
		echo "<h2>I love Python</h2>";
	}
	else{
		echo "<h2>I love PHP</h2>";	
	}

	echo "<ul>";
	for ($i=0; $i < 10; $i++) { 
		echo "<li>$i</li>";
	}
	echo "</ul>";

	$name = 'Marilia';
	echo "<h2>$name</h2>";
	switch ($name) {
		case 'Fernanda':
			echo '<p>Chupa gostoso';
			break;

		case 'Luiza':
			echo '<p>Beija gostoso';
			break;

		case 'Marilia':
			echo '<p>Come gostoso';
			break;

		case 'Daiana':
			echo '<p>Senta gostoso';
			break;

		case 'Kah':
			echo '<p>Espanhola gostosa';
			break;
		
		default:
			echo '<p>Goza sozinho';
			break;
	}

	
?>






</article><!--MAIN CONTENT-->
	
<?php include "includes/footer.php"; ?>