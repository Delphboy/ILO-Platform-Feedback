<?php
require_once('Models/Graph.php');
require_once('Models/Admin.php');


$gr = new Graph();
$model = new Admin();

$grdata = null;

if (isset($_POST['def_graphs']))
    $query = $_POST['def_graphs'];

    $grdata = $gr->platform_vs_wage($query);
    echo "<script type=\"text/javascript\">platform_by_rating('$grdata');</script>";

//    switch ($_POST['def_graphs']) {
//        case "PlatformVSWage":
//            $grdata = $gr->platform_vs_wage();
//            echo "<script type=\"text/javascript\">platform_vs_wage('$grdata');</script>";
//            break;
//        case "WagePerCountry" :
//            $grdata = $gr->wage_per_country();
//            echo "<script type=\"text/javascript\">wage_per_country('$grdata');</script>";
//            break;
//        case "PlatformPopularity" :
//            $grdata = $gr->platform_popularity();
//            echo "<script type=\"text/javascript\">platform_popularity('$grdata');</script>";
//            break;
//        case "RatingVSWage" :
//            $grdata = $gr->rating_vs_wage();
//            echo "<script type=\"text/javascript\">rating_vs_wage('$grdata');</script>";
//            break;
//        case "PlatformByRating" :
//            $grdata = $gr->platform_by_rating();
//            echo "<script type=\"text/javascript\">platform_by_rating('$grdata');</script>";
//            break;
//    }



if (isset($_POST['country-selection-admin'])){
    $query = $_POST['country-selection-admin'];
    $tableToDisplay = $model->createTable($query);

    if ($tableToDisplay != "") {
        $table = $tableToDisplay;
        echo "$table";
    }
}
//echo "<p>This is text</p>";
