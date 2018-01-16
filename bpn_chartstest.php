<html>
<head>
      <!--Load the Ajax API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <?php
    require ('Models/Graph.php');
    $gr = new Graph();
    $jsonTable = $gr->fetchData();
    print_r($jsonTable);
    ?>
    <script src="js/filters.js"></script>
    <script type="text/javascript">
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});
        // Set a callback to run when the Google Visualization API is loaded.
        //google.charts.setOnLoadCallback(drawbarchart);


        //first column must be bars, second column must be values
        function drawbarchart() {

            //Create our data table out of JSON data  loaded from server.
            var data = new google.visualization.DataTable(<?php echo $jsonTable; ?>);
            var barchart_options =
            {
                title: 'Barchart',
                width: 600,
                height: 400,
                legend: 'none'
            };

            // Instantiate and draw our chart, passing in some options.
            // Do not forget to check your div ID
            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

            chart.draw(data, barchart_options);
        }
    </script>
</head>

<body>
<button onclick="drawbarchart(<?php echo $jsonTable; ?>)" value="Btn"> Generate chart</button>

<div id="chart_div">
</div>
</body>
</html>