/**
 * Created by stc567 on 1/15/18.
 */

// Load the Visualization API and the corechart package.
google.charts.load('current', {'packages':['corechart']});
// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawbarchart);


//first column must be bars, second column must be values
function drawbarchart(jsontable) {

    //Create our data table out of JSON data loaded from server.
    var data = new google.visualization.DataTable(jsontable );
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
    chart.draw(jsontable, barchart_options);

}


function drawscatterchat(jsontable) {


    var data = new google.visualization.DataTable(jsontable );
    var options = {
        title: 'Scatter Graph ',
        hAxis: {title: 'Wage'},
        vAxis: {title: 'Rating', minValue: 0, maxValue: 5},
        legend: 'none'
    };

    var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));

    chart.draw(data, options);
    
}