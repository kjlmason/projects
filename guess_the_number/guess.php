 <!-- guess.php -->
	<?php
	if(!isset($_SESSION["setNum"]))
	{
		$randNum = rand(1, 100);
		$_SESSION["setNum"] = $randNum;
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
        $setNum = $_SESSION["setNum"];
		
		if ($setNum == $_POST["num"])
		{
			echo "<h1>Correct!</h1>";
			echo "<p>I'll think of a new number the next time you guess.</p>";
			$_SESSION["setNum"] = NULL;
		}
		else 
		{
			//echo "<p class=\"text-danger\">No, I was thinking of $setNum.</p>";
			
			//$numdiff = abs(($_POST["num"]) - $setNum);
			//echo "<p>Your answer was off by $numdiff!</p>";
			if($_POST["num"] < $setNum)
			{
				echo "<p class=\"text-danger\">Your answer was too low! Guess again.</p>";
			}
			else if($_POST["num"] > $setNum)
			{
				echo "<p class=\"text-danger\">Your answer was too high! Guess again.</p>";
			}
		}       
	}
	?>