<?php
$apiUrl = "http://api.openweathermap.org/data/2.5/weather";
$queryString = "zip=33436&units=imperial&appid=acc269494864601b6c4d3f0e88bd677c";

//Load User Zip Code
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["zip"]) && isset($_SESSION["zip"])) 
	{
		$username = $_SESSION["username"];
		$zip = $_POST["zip"];
		$mysqli = new mysqli("localhost", "kmason2019", "yqmY6jJaxx", "kmason2019");
		$sql = "UPDATE Users SET zip='".$zip."' WHERE username = '".$username."'";
		$result = $mysqli->query($sql);
		if (!$result) 
		{
			die;
		}
		$_SESSION["zip"] = $_POST["zip"];
	}
	else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["zip"]) 
	{
		$queryString = "zip=".$_POST["zip"]."&units=imperial&appid=acc269494864601b6c4d3f0e88bd677c";
	}
	
	if (isset($_SESSION["zip"]) && $_SESSION["zip"])
	{
		$zip = $_SESSION["zip"];
		$queryString = "zip=".$zip."&units=imperial&appid=acc269494864601b6c4d3f0e88bd677c";

	}
	

// Make HTTP request and wait for the response
$response = file_get_contents("$apiUrl?$queryString");
 
if ($response === FALSE) {
   die("Error contacting the web API");
} else {
   // Convert JSON response into PHP object
   $obj = json_decode($response);

   $city = $obj->name;
   echo "<h2>Weather for $city</h2>";
   
   $currentTemp = $obj->main->temp;
   echo "<p>Current temp: $currentTemp &deg;F</p>";
   $description = $obj->weather[0]->description;
   echo "<p>Description: $description</p>";
   $humidity = $obj->main->humidity;
   echo "<p>Humidity: $humidity%</p>";
}
?>