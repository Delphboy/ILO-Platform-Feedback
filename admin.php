<?php
require_once('Models/Admin.php');
require_once('Models/Graph.php');

session_start();

$view = new stdClass();
$model = new Admin();
$gr = new Graph();

// Check for the country selection
if (isset($_POST['table-submit'])) {
    $_SESSION['country-selection-admin'] = $_POST['country-selection-admin'];
    $query = $_POST['country-selection-admin'];
    $tableToDisplay = $model->createTable($query);

    if ($tableToDisplay != "") {
        $view->table = $tableToDisplay;
    }
}

if (isset($_POST['GraphSubmit']))
    $_SESSION['def_graphs'] = $_POST['def_graphs'];
    switch ($_POST['def_graphs']) {
        case "PlatformVSWage":
            $view->grdata = $gr->platform_vs_wage();
            break;
    }
//    $platform_vs_wage = $gr->platform_vs_wage();
////print_r($platform_vs_wage);
//    $wage_per_country = $gr->wage_per_country();
//    $platform_popularity = $gr->platform_popularity();
//    $rating_vs_wage = $gr->rating_vs_wage();
//    $platform_by_rating = $gr->platform_by_rating();


if ($_SESSION['isSignedIn']) {
    require_once('Views/admin.phtml');
} else {
    header('Location: login.php');
}