<?php
require_once('Models/Admin.php');
require_once('Models/Graph.php');

$view = new stdClass();
$model = new Admin();
$gr = new Graph();

// Check for the country selection
if (isset($_POST['table-submit'])) {
    $query = $_POST['country-selection-admin'];
    $tableToDisplay = $model->createTable($query);

    if ($tableToDisplay != "") {
        $view->table = $tableToDisplay;
    }
}


switch ($_POST['def-graphs']) {
    case "PlatformVSWage":
        $view->grdata = $gr->platform_vs_wage();
        break;
}


session_start();
if ($_SESSION['isSignedIn']) {
    require_once('Views/admin.phtml');
} else {
    header('Location: login.php');
}