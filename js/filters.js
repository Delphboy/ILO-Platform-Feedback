/**
 * Created by stc567 on 1/15/18.
 */

/**
 * TABLE FILTERS
 */
function updateTable()
{

}

function searchByPlatform() {

    // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById("platformInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("tableToDisplay");
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
 * Take the wage condition from the field
 * Remove spaces
 * first character is the condition (=<>)
 * remaining characters should be numeric and used for condition
 */
function searchByWage()
{
    var conditionString = document.getElementById("wageInput");
    var condition = conditionString.get(0);
    var value = conditionString.substring(0);
    switch (condition)
    {
        case '=':
            alert(value + '=');
            break;
        case '<':
            alert(value + '<');
            break;
        case '>':
            alert(value + '>');
            break;
        default:
            alert('Unrecognised search condition');
            break;
    }
}

/**
 * CHART FILTERS
 */


function initialize() {
    var opts = {sendMethod: 'auto'};
    // Replace the data source URL on next line with your data source URL.
    var query = new google.visualization.Query("csv?url=/data.csv", opts);
    // Optional request to return only column C and the sum of column B, grouped by C members.
    query.setQuery('select gender, rating');

    // Send the query with a callback function.
    query.send(handleQueryResponse);
}

function handleQueryResponse(response) {
    if (response.isError()) {
        alert('Error in query: ' + response.getMessage() + ' ' + response.getDetailedMessage());
        return;
    }
    var data = response.getDataTable();
    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    chart.draw(data, {width: 400, height: 240, is3D: true});
}

// function makeBarChart(CSVTable, column1, column2)
// {
//     google.charts.load('43', {'packages': ['corechart']});
//     google.charts.setOnLoadCallback(function () {
//         var data = new google.visualization.DataTable(CSVTable);
//         var barchart_options =
//             {
//                 title: 'Bar Chart',
//                 width: 600,
//                 height: 600,
//                 legend: 'none'
//             };
//
//         // Instantiate and draw our chart, passing in some options.
//         // Do not forget to check your div ID
//         var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
//         chart.draw(data, barchart_options);
//     })
// }
//
function platform_vs_wage(jsontable){
    google.charts.load('43', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(function () {
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
    })
}
//
// function wage_per_country(jsontable) {
//     google.charts.load('43', {'packages': ['corechart']});
//     google.charts.setOnLoadCallback(function () {
//         var data = new google.visualization.DataTable(jsontable);
//         var barchart_options =
//         {
//             title: 'Average Wage per Country',
//             width: 600,
//             height: 600,
//             legend: 'none'
//         };
//         var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
//
//         chart.draw(data, barchart_options);
//     })
// }
//
// function platform_popularity(jsontable) {
//     google.charts.load('43', {'packages': ['corechart']});
//     var data = new google.visualization.DataTable(jsontable);
//     var piechart_options =
//     {
//         title: 'Average Platform Popularity',
//         width: 600,
//         height: 600,
//         legend: 'none'
//     };
//     var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
//
//     chart.draw(data, piechart_options);
// }
// function rating_vs_wage(jsontable) {
//     google.charts.load('43', {'packages': ['corechart']});
//     var data = new google.visualization.DataTable(jsontable);
//     var piechart_options =
//     {
//         title: 'Hours Looking vs Hours Working',
//         hAxis: {title: 'hours looking', minValue: 0, maxValue: 100},
//         vAxis: {title: 'hours working', minValue: 0, maxValue: 100},
//         width: 600,
//         height: 600,
//         legend: 'none'
//     };
//     var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));
//
//     chart.draw(data, piechart_options);
// }
//
// function platform_by_rating(jsontable) {
//     google.charts.load('43', {'packages': ['corechart']});
//     var data = new google.visualization.DataTable(jsontable);
//     var piechart_options =
//     {
//         title: 'Platform by Average Rating',
//         width: 600,
//         height: 600,
//         legend: 'none'
//     };
//     var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
//
//     chart.draw(data, piechart_options);
// }
//
// function drawBasic() {
//     google.charts.load('current', {packages: ['corechart', 'bar']});
//     google.charts.setOnLoadCallback(function () {
//         var data = google.visualization.arrayToDataTable([
//             ['City', '2010 Population',],
//             ['New York City, NY', 8175000],
//             ['Los Angeles, CA', 3792000],
//             ['Chicago, IL', 2695000],
//             ['Houston, TX', 2099000],
//             ['Philadelphia, PA', 1526000]
//         ]);
//
//         var options = {
//             title: 'Population of Largest U.S. Cities',
//             chartArea: {width: '50%'},
//             hAxis: {
//                 title: 'Total Population',
//                 minValue: 0
//             },
//             vAxis: {
//                 title: 'City'
//             }
//         };
//
//         var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
//
//         chart.draw(data, options);
//     })
//
//
// }

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