<?php

		$host="den1.mysql3.gear.host";
		$dbName="gr2";
		$user = "gr2";
		$pass = 'gr0up2t357db!';

		$dbHandle = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);

		$query ="SELECT platform AS plat, count(platform) AS count FROM review GROUP BY platform ORDER BY count DESC";
		$sqlQuery = $query;
		//echo $sqlQuery;  //helpful for debugging to see what SQL query has been created
		
		$statement = $dbHandle->prepare($sqlQuery); // prepare PDO statement
		$statement->execute();   // execute the PDO statement
		
		$results = $statement->fetchAll(PDO::FETCH_ASSOC);//data is here, just draw the chart

		//access data in the array

		//foreach($results as $key => $value)
		//{
			//$value is one row of results
			//echo  $value['count'];
			
			
		//}
		//seeing if i can pull different values from array
		//$a = $results['AMT'];
		//list($a,$b)=$results;
		//echo $a;
		//echo $b;
		//var_dump ($results);
		//$look = $results[0];
		//echo $look;
		foreach ($results[1] as $key => $value)
		{
				//print_r($value->count);
		}
		//$value = current ($results[]->plat);
		//print_r($value);
		//$value = next ($results);
		//print_r($value);
		//$value = next ($results);
		//print_r($value);

		//print_r (array_values ($results->plat));

		//print_r ($results);
		//print_r ($results{3});
		//echo '<pre>';
		//print_r($value);
		//echo '</pre>';
		
		
		$dbHandle = null;
?>
<html>
	<head>
		<!--Load the AJAX API-->
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<script type="text/javascript">
		
		var $z= 2;
	//	"<?php ////if (!empty($a))
	//	   {
	//	       echo $a;
	//	   } ?>////" />
	
	// Load the Visualization API and the corechart package.
	google.charts.load('current', {'packages':['corechart']});
	// Set a callback to run when the Google Visualization API is loaded.
	google.charts.setOnLoadCallback(drawChart);

	
		// Creates and populates a data table
		function drawChart() {
			
			// Create the data table.
			var piedata = new google.visualization.DataTable ();
			piedata.addColumn ('string', 'Platform');
			piedata.addColumn ('number', 'Popularity');
			piedata.addRows (
				[
					['Amazon', $z],
					['Fiverr', 8],
					['AMT', 5],
					['Click Work', 4],
					['Up Work', 3]
				]
			);
			
			// Set chart options
			var options =
				{
					'title': 'Platforms by popularity',
					'width': 600,
					'height': 400
				};
			
			var piechart = new google.visualization.PieChart (document.getElementById ('chart_div'));
			piechart.draw (piedata, options);
			
			//Bar Chart
			var barchart_options =
				{
					title: 'Barchart',
					width: 600,
					height: 400,
					legend: 'none'
				};
			
			var barchart = new google.visualization.BarChart (document.getElementById ('barchart_div'));
			barchart.draw (piedata, barchart_options);
			
			var areadata = google.visualization.arrayToDataTable (
				[
					['Platorm', 'Number'],
					['Amazon', $z],
					['Fiverr', 8],
					['AMT', 5],
					['Click Work', 4],
					['Up Work', 3]
				]);
			
			//Area Chart
			var areaChart_options =
				{
					title: 'Test Of Area Chart',
					hAxis: {title: 'Platform', titleTextStyle: {color: '#333'}},
					vAxis: {minValue: 0}
				};
			
			var areaChart = new google.visualization.AreaChart (document.getElementById ('areaChart_div'));
			areaChart.draw (areadata, areaChart_options);
		}
			
			google.charts.load ('current', {'packages': ['gauge']});
			google.charts.setOnLoadCallback (gdrawChart);
			
//			function gdrawChart () {
//				//gauges
//
//				var gdata = google.visualization.arrayToDataTable (
//					[
//						['Label', 'Value'],
//						['Amazon', $z],
//						['Fiverr', 8],
//						['AMT', 5],
//						['Click Work', 4],
//						['Up Work', 3]
//					]);
//
//				var goptions =
//					{
//						width: 600, height: 400,
////						redFrom: 90, redTo: 100,
////						yellowFrom: 75, yellowTo: 90,
//						minorTicks: 1
//					};
//
//				var gchart = new google.visualization.Gauge (document.getElementById ('gchart_div'));
//
//				gchart.draw (gdata, goptions);
//
////				setInterval (function () {gdata.setValue (0, 1, 40 + Math.round (60 * Math.random ()));gchart.draw (gdata, goptions);}, 5000);
//				setInterval (function () {gdata.setValue (0);   gchart.draw (gdata, goptions);});
//				setInterval (function () {gdata.setValue (1);   gchart.draw (gdata, goptions);});
//				setInterval (function () {gdata.setValue (2);   gchart.draw (gdata, goptions);});
//				setInterval (function () {gdata.setValue (3);	gchart.draw (gdata, goptions);});
//				setInterval (function () {gdata.setValue (4);	gchart.draw (gdata, goptions);});
//			}
//
//
	</script>
</head>


<body>
	<!--chart-->
	<!--Table and divs that hold the pie charts-->
		<table class="columns">
			<tr>
				<td><div id="chart_div" style="border: 1px solid "></div></td>
				<td><div id="barchart_div" style="border: 1px solid "></div></td>
			</tr>
			<tr>
				<td><div id="areaChart_div" style="width: 600px; height: 500px;"></div></td>
				<td><div id="gchart_div" style="width: 600px; height: 500px;"></div></td>
			</tr>
		</table>
	
	</body>
</html>

