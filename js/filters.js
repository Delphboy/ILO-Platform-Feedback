/**
 * Created by stc567 on 1/15/18.
 */

/**
 * TABLE FILTERS
 */
function myFunction1() {
    // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById("myInput1");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

/**
 * CHART FILTERS
 */
function platform_vs_wage(jsontable){
    google.charts.load('43', {'packages':['corechart']});
    alert(jsontable);
    //Create our data table out of JSON data  loaded from server.
    var data = new google.visualization.DataTable(jsontable);
    var barchart_options =
        {
            title: 'Platform vs Average Wage',
            width: 600,
            height: 600,
            legend: 'none'
        };

    // Instantiate and draw our chart, passing in some options.
    // Do not forget to check your div ID
    var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
    chart.draw(data, barchart_options);
}

function wage_per_country(jsontable){
    google.charts.load('43', {'packages':['corechart']});
    var data = new google.visualization.DataTable(jsontable);
    var barchart_options =
        {
            title: 'Average Wage per Country',
            width: 600,
            height: 600,
            legend: 'none'
        };
    var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

    chart.draw(data, barchart_options);
}

function platform_popularity(jsontable) {
    google.charts.load('43', {'packages':['corechart']});
    var data = new google.visualization.DataTable(jsontable);
    var piechart_options =
        {
            title: 'Average Platform Popularity',
            width: 600,
            height: 600,
            legend: 'none'
        };
    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

    chart.draw(data, piechart_options);
}
function rating_vs_wage(jsontable){
    google.charts.load('43', {'packages':['corechart']});
    var data = new google.visualization.DataTable(jsontable);
    var piechart_options =
        {
            title: 'Hours Looking vs Hours Working',
            hAxis: {title: 'hours looking', minValue: 0, maxValue: 100},
            vAxis: {title: 'hours working', minValue: 0, maxValue: 100},
            width: 600,
            height: 600,
            legend: 'none'
        };
    var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));

    chart.draw(data, piechart_options);
}

function platform_by_rating(jsontable){
    google.charts.load('43', {'packages':['corechart']});
    var data = new google.visualization.DataTable(jsontable);
    var piechart_options =
        {
            title: 'Platform by Average Rating',
            width: 600,
            height: 600,
            legend: 'none'
        };
    var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

    chart.draw(data, piechart_options);
}

function drawBasic() {

    google.charts.load('current', {packages: ['corechart', 'bar']});

    var data = google.visualization.arrayToDataTable([
        ['City', '2010 Population',],
        ['New York City, NY', 8175000],
        ['Los Angeles, CA', 3792000],
        ['Chicago, IL', 2695000],
        ['Houston, TX', 2099000],
        ['Philadelphia, PA', 1526000]
    ]);

    var options = {
        title: 'Population of Largest U.S. Cities',
        chartArea: {width: '50%'},
        hAxis: {
            title: 'Total Population',
            minValue: 0
        },
        vAxis: {
            title: 'City'
        }
    };

    var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

    chart.draw(data, options);
}

//
// function gender_vs_wage(jsontable){
//     var data = new google.visualization.DataTable(jsontable);
//     var piechart_options =
//     {
//         title: 'Barchart',
//         width: 600,
//         height: 600,
//         legend: 'none'
//     };
//     var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
//
//     chart.draw(data, piechart_options);
// }