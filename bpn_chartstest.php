<html>
<head>
      <!--Load the Ajax API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <?php
    require ('Models/Graph.php');
    $gr = new Graph();
    $platform_vs_wage = $gr->platform_vs_wage();
    //print_r($platform_vs_wage);
    $wage_per_country = $gr->wage_per_country();
    $platform_popularity = $gr->platform_popularity();
    $rating_vs_wage = $gr->rating_vs_wage();
    ?>
    <script type="text/javascript">
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});
        // Set a callback to run when the Google Visualization API is loaded.
//        google.charts.setOnLoadCallback();


            function platform_vs_wage(){
                //Create our data table out of JSON data  loaded from server.
                var data = new google.visualization.DataTable(<?php echo $platform_vs_wage; ?>);
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

        function wage_per_country(){
            var data = new google.visualization.DataTable(<?php echo $wage_per_country; ?>);
            var barchart_options =
            {
                title: 'Barchart',
                width: 600,
                height: 900,
                legend: 'none'
            };
            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

            chart.draw(data, barchart_options);
        }

        function platform_popularity() {
            var data = new google.visualization.DataTable(<?php echo $platform_popularity; ?>);
            var piechart_options =
            {
                title: 'Barchart',
                width: 600,
                height: 900,
                legend: 'none'
            };
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

            chart.draw(data, piechart_options);
        }
        function rating_vs_wage(){
            var data = new google.visualization.DataTable(<?php echo $rating_vs_wage; ?>);
            var piechart_options =
            {
                title: 'Barchart',
                width: 600,
                height: 900,
                legend: 'none'
            };
            var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));

            chart.draw(data, piechart_options);
        }

    </script>
</head>

<body>
<button id="btn" value="btn" onclick="platform_vs_wage()"> Platform vs wage barchart</button>
<button id="btn" value="btn" onclick="wage_per_country()"> Wage per country barchart</button>
<button id="btn" value="btn" onclick="platform_popularity()"> Platform popularity piechart</button>
<button id="btn" value="btn" onclick="rating_vs_wage()"> Platform popularity piechart</button>


<div id="chart_div">
</div>
</body>
</html>