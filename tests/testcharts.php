<?php

		$host="den1.mysql3.gear.host";
		$dbName="gr2";
		$user = "gr2";
		$pass = 'gr0up2t357db!';

//		//$dbHandle = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
//		$dbHandle = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
//		$query ="SELECT platform, count(*) FROM review GROUP BY platform";
//		$sqlQuery = $query; // put your students table name
//		//echo $sqlQuery;  //helpful for debugging to see what SQL query has been created
//		$statement = $dbHandle->prepare($sqlQuery); // prepare PDO statement
//		$statement->execute();   // execute the PDO statement
//		$results = $statement->fetchAll();
//		//order the results
//		echo "<table border='1'>";
//		//then echo them out:
//		foreach($results as $key => $result)
//		{
//			echo "<tr><td>" . $result[0] ."</td><td>". $result[1]."</td></tr>";
//		}
//		echo "</table>";
//		echo  $results[0];
//		$dbHandle = null;
//
//
//

$dbHandle = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
$query ="SELECT platform AS plat, count(platform) AS count FROM review GROUP BY platform ORDER BY count DESC";
$sqlQuery = $query; // put your students table name
//echo $sqlQuery;  //helpful for debugging to see what SQL query has been created
$statement = $dbHandle->prepare($sqlQuery); // prepare PDO statement
$statement->execute();   // execute the PDO statement
$results = $statement->fetchAll(PDO::FETCH_ASSOC);//data is here, just draw the chart

//you can access the data in the array like this:

foreach($results as $key => $value){//$value is one row of results
echo '<some html you="need" for the piechart>'.$value['plat']/*name of the platform*/.'</some closing tag perhaps><another tag>'.$value['count'].'</closed>';
}
$dbHandle = null;
?>









<html>
<head>
	<!--Load the AJAX API-->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
		
		// Load the Visualization API and the corechart package.
		google.charts.load('current', {'packages':['corechart']});
		
		// Set a callback to run when the Google Visualization API is loaded.
		google.charts.setOnLoadCallback(drawChart);
		
		// Callback that creates and populates a data table,
		// instantiates the pie chart, passes in the data and
		// draws it.
		function drawChart() {
			
			// Create the data table.
			var data = new google.visualization.DataTable();
			data.addColumn('string', 'Topping');
			data.addColumn('number', 'Slices');
			data.addRows([
				             ['Amazon', 94],
				             ['Fiverr', 122],
				             ['AMT', 154],
				             ['Click Work', 144],
				             ['Up Work', 287]
			             ]);
			
			// Set chart options
			var options = {'title':'How Much Pizza I Ate Last Night',
				'width':400,
				'height':300};
			
			// Instantiate and draw our chart, passing in some options.
			var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
			chart.draw(data, options);
		}
	</script>
</head>

<body>
<!--Div that will hold the pie chart-->
<div id="chart_div"></div>
</body>
</html>