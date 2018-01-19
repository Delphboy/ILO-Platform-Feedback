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

function drawBarChart(jsontable) {
    google.charts.load('43', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(function () {
        var data = new google.visualization.DataTable(jsontable);
        var barchart_options =
        {
            title: '',
            width: 600,
            height: 600,
            legend: 'none'
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, barchart_options);
    })
}

function drawPieChart(jsontable) {
    google.charts.load('43', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(function () {
        var data = new google.visualization.DataTable(jsontable);
        var barchart_options =
        {
            title: '',
            width: 600,
            height: 600,
            legend: 'none'
        };
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, barchart_options);
    })
}


function wage_per_country(jsontable) {
    google.charts.load('43', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(function () {
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
    })
}


function rating_vs_wage(jsontable) {
    google.charts.load('43', {'packages': ['corechart']});
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