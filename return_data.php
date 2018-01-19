<?php
require_once('Models/Graph.php');
require_once('Models/Admin.php');


$gr = new Graph();
$model = new Admin();

$grdata = null;

if (isset($_POST['var1']) && isset($_POST['var2']))
    //$query = $_POST['def_graphs'];
    if (isset($_POST['var3']) && $_POST['var3'] != ""){
        $query = 'SELECT ' . $_POST['var1'] . ', ' . $_POST['var2']. ', ' . $_POST['var3'] . ' FROM review ' . $_POST['group'];
        $grdata = $gr->getJson3fields($query, $_POST['var1'], $_POST['var2'], $_POST['var3']);
    }
    else {
        $query = 'SELECT ' . $_POST['var1'] . ', ' . $_POST['var2'] . ' FROM review ' . $_POST['group'];
        $grdata = $gr->getJson2fields($query, $_POST['var1'], $_POST['var2']);
    }

    echo "<h3>$query</h3>";


    echo "<p>$grdata</p>";
    if ($_POST['chart'] == 'barchart'){
        echo "<script type=\"text/javascript\">drawBarChart('$grdata');</script>";
    }
    elseif ($_POST['chart'] == 'piechart'){
        echo "<script type=\"text/javascript\">drawPieChart('$grdata');</script>";
    }
    elseif ($_POST['chart'] == 'areachart'){
        echo "<script type=\"text/javascript\">drawAreaChart('$grdata');</script>";
    }


if (isset($_POST['country-selection-admin'])){
    $query = $_POST['country-selection-admin'];
    $tableToDisplay = $model->createTable($query);

    if ($tableToDisplay != "") {
        $table = $tableToDisplay;
        echo "$table";
    }
}
//echo "<p>This is text</p>";
