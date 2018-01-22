<?php

session_start();
require_once('Models/Graph.php');
require_once('Models/Admin.php');
$gr = new Graph();
$model = new Admin();
$grdata = null;
if (isset($_POST['var1'])) {
    $cols = explode(', ', $_POST['var1']);
    if (sizeof($cols) == 3)
    {
        $query = 'SELECT ' . $_POST['var1'] . ' FROM review '.$_SESSION['where_clause']
            . " GROUP BY " .
            $cols[0];
        $grdata = $gr->getJson3fields($query, $cols[0], $cols[1], $cols[2]);
    } else {
        $query = 'SELECT ' . $_POST['var1']  . ' FROM review ' .$_SESSION['where_clause']. " GROUP BY ".
            $cols[0];
        $grdata = $gr->getJson2fields($query, $cols[0], $cols[1]);
    }
//    echo "<h3>$query</h3>";
//    echo "<p>$grdata</p>";
    if ($_POST['chart'] == 'barchart') {
        echo "<script type=\"text/javascript\">drawBarChart('$grdata');</script>";
    } elseif ($_POST['chart'] == 'piechart') {
        echo "<script type=\"text/javascript\">drawPieChart('$grdata');</script>";
    } elseif ($_POST['chart'] == 'areachart') {
        echo "<script type=\"text/javascript\">drawAreaChart('$grdata');</script>";
    }
}
if (isset($_POST['country-selection-admin'])){
    $query = $_POST['country-selection-admin'];
    $tableToDisplay = $model->createTable($query);
    if ($tableToDisplay != "") {
        $table = $tableToDisplay;
        echo "$table";
    }
}