<?php
require_once('Models/Admin.php');
require_once('Models/Graph.php');



$view = new stdClass();
$model = new Admin();
$gr = new Graph();

$grdata = null;

//if two of the fields are set
if (isset($_POST['var1']) && isset($_POST['var2'])) {
    //and if third field is set as well
    if (isset($_POST['var3']) && $_POST['var3'] != "") {
        $query = 'SELECT ' . $_POST['var1'] . ', ' . $_POST['var2'] . ', ' . $_POST['var3'] . ' FROM review ' . $_POST['group'];
        //look for three columns in the database
        $grdata = $gr->getJson3fields($query, $_POST['var1'], $_POST['var2'], $_POST['var3']);
    } else {
        $query = 'SELECT ' . $_POST['var1'] . ', ' . $_POST['var2'] . ' FROM review ' . $_POST['group'];
        //look for two columns in the database
        $grdata = $gr->getJson2fields($query, $_POST['var1'], $_POST['var2']);
    }

    //echo "<h3>$query</h3>";


    //echo "<p>$grdata</p>";

    //Depending on selection in the form -> generate graph with the above generated data
    if ($_POST['chart'] == 'barchart') {
        echo "<script type=\"text/javascript\">drawBarChart('$grdata');</script>";
    } elseif ($_POST['chart'] == 'piechart') {
        echo "<script type=\"text/javascript\">drawPieChart('$grdata');</script>";
    } elseif ($_POST['chart'] == 'areachart') {
        echo "<script type=\"text/javascript\">drawAreaChart('$grdata');</script>";
    }
}

//if the country selection is set
if (isset($_POST['country-selection-admin'])){
    //get the query from the form
    $query = $_POST['country-selection-admin'];
    //execute query and retrieve HTML table
    $tableToDisplay = $model->createTable($query);

    //echo the table into the div defined in the AJAX call
    if ($tableToDisplay != "") {
        $table = $tableToDisplay;
        echo "$table";
    }
}

session_start();
if ($_SESSION['isSignedIn']) {
    require_once('Views/admin.phtml');
} else {
    header('Location: login.php');
}