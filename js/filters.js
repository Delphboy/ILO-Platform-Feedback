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
        var rowcount = data.getNumberOfRows();
        var barchart_options;
        if (rowcount > 15){
            barchart_options =
        {
            title: '',
            width: 1500,
            chartArea: { left: 20, top: 5, right:20, width: '80%', height: '80%'},
            height: 800,
        };
        }
        else{
            barchart_options =
            {
                title: '',
                width: 800,
                chartArea: {width: '80%', height: '80%'},
                height: 800,
            };
        }
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, barchart_options);
    })
}

function drawPieChart(jsontable) {
    google.charts.load('43', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(function () {
        var data = new google.visualization.DataTable(jsontable);
        var rowcount = data.getNumberOfRows();
        var barchart_options;
        if (rowcount > 15){
            barchart_options =
            {
                title: '',
                width: 1500,
                chartArea: { left: 20, top: 5, right:20, width: '80%', height: '80%'},
                height: 800,
            };
        }
        else{
            barchart_options =
            {
                title: '',
                width: 800,
                chartArea: {width: '80%', height: '80%'},
                height: 800,
            };
        }
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, barchart_options);
    })
}
function drawAreaChart(jsontable) {
    google.charts.load('43', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(function () {
        var data = new google.visualization.DataTable(jsontable);
        var rowcount = data.getNumberOfRows();
        var barchart_options;
        if (rowcount > 15){
            barchart_options =
            {
                title: '',
                width: 1500,
                chartArea: { left: 20, top: 5, right:20, width: '80%', height: '80%'},
                height: 800,
            };
        }
        else{
            barchart_options =
            {
                title: '',
                width: 800,
                chartArea: {width: '80%', height: '80%'},
                height: 800,
            };
        }
        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, barchart_options);
    })
}