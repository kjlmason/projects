 <!-- guess.php -->
	<?php
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$randNum = rand(1, 10);
        
		if ($randNum == $_POST["num"])
		{
			echo "<h1>Correct!</h1>";
		}
		else 
		{
			echo "<p class=\"text-danger\">No, I was thinking of $randNum.</p>";
			
			$numdiff = abs(($_POST["num"]) - $randNum);
			echo "<p>Your answer was off by $numdiff!</p>";
			
		}       
	}
	?>