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
            //Create our data table out of JSON data  loaded from server.
            var data = new google.visualization.DataTable(<?php echo $wage_per_country; ?>);
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
<button id="btn" value="btn" onclick="platform_vs_wage()"> Generate platform vs wage bar</button>
<button id="btn" value="btn" onclick="wage_per_country()"> Generate wage per country bar</button>

<div id="chart_div">
</div>
</body>
</html>