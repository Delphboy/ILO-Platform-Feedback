<?php
session_start();
require_once('Models/Admin.php');
require_once('Models/Graph.php');



$view = new stdClass();
$model = new Admin();
$gr = new Graph();

// Generate the table based on filters
if (isset($_POST['table-submit'])) {
    $db = database::Instance();
    $country = $_POST['country-selection-admin'];
    $platform = $_POST['platform-selection-admin'];
    $gender = $_POST['gender-selection-admin'];

    //build query based on search values
//    echo "<h1>$country $platform $gender</h1>";

    $queryString = "SELECT * FROM review WHERE TRUE"; //true included so all other statements can start with AND

    // build query
    if($country != "none") $queryString = $queryString . " AND country LIKE '"
        . $country ."'";
    if($platform != "none") $queryString = $queryString . " AND platform LIKE '" . $platform . "'";
    if($gender != "none") $queryString = $queryString . " AND gender LIKE '".
        $gender."'";
$_SESSION['where_clause'] = 'WHERE TRUE';
    if($country != "none") $_SESSION['where_clause'] =  $_SESSION['where_clause'] . " AND country LIKE '"
        . $country ."'";
    if ($platform != "none") $_SESSION['where_clause'] = $_SESSION['where_clause'] . " AND platform LIKE '" . $platform . "'";
    if ($gender != "none") $_SESSION['where_clause'] = $_SESSION['where_clause'] .
        " AND platform LIKE '" . $gender . "'";
//    $wherecl = $_SESSION['where_clause'];
//    echo "$wherecl";




    //set query
    $db->query($queryString);
    //bind values
//    if($country != "none") $db->bind(':country', $country);
//    if($platform != "none") $db->bind(':platform', $platform);
//    if($gender != "none") $db->bind(':gender', $gender);

    //store results
    $results = $db->resultSet();
    $tableToDisplay = $model->generateTableBody($results);

    if ($tableToDisplay != "")
    {
        $_SESSION['table'] = $tableToDisplay;
        $_SESSION['tableResults'] = $results;
        $view->table = $tableToDisplay;
    }
}

if(isset($_POST['graphSubmit']))
{
    $xAxis = $_POST['var1'];
    $yAxis = $_POST['var2'];
    $chartType = $_POST['chart'];
    if(isset($_SESSION['tableResults']))
    {
        $results = $_SESSION['tableResults'];
        $CSVString = $gr->convertResultsToCSV($results);
        $_SESSION['resultsJSON'] = $CSVString;
        $gr->writeCSVFile($CSVString);
        $view->graph = $chartType;
    }
}


// Check the session, ensuring the user has access to the page
if ($_SESSION['isSignedIn']) {
    require_once('Views/admin.phtml');
} else {
    header('Location: login.php');
}