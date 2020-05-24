function convert(value, type)
{
	var result;
	//Inches to MM
	if(type == "inch")
	{
		result = (value * 25.4).toFixed(2);
		
		//display result
		document.getElementById("result").innerHTML = `${value} in = ${result} mm`;
		document.getElementById("mmValue").value = result;
	}
	//MM to Inches
	else if(type == "millimeter")
	{
		result = (value / 25.4).toFixed(2);
		document.getElementById("result").innerHTML = `${result} in = ${value} mm`;
		document.getElementById("inchValue").value = result;
	}
}	

//Inches/Millimeter forms
var inchBox = document.getElementById("inchValue")
var mmBox = document.getElementById("mmValue")

//Exectute corresponding Conversion on input
inchBox.oninput = function() {
    var inch = document.getElementById("inchValue").value;
    convert(inch ,"inch");
};

mmBox.oninput = function() {
    var millimeter = document.getElementById("mmValue").value;
    convert(millimeter ,"millimeter");
};