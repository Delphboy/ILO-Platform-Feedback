<?php
$view = new stdClass();
require_once ('Models/Admin.php');
require ('Models/Graph.php');


$model = new Admin();
$gr = new Graph();
$grdata;

// Check for the country selection
if(isset($_POST['table-submit'])) {
    //listen for submission
    // if it's submitted then:
    // grab query -> execute -> return table with values
    // display values in DIV
    $query = $_POST['country-selection-admin'];
    $tableToDisplay = $model->createTable($query);

    if ($tableToDisplay != "")
    {
//        $view->table = 'table is set yall';
        $view->table = $tableToDisplay;
    }
}




if(isset($_POST['def-graphs']))
{
    switch ($_POST['def-graphs'])
    {
        case "PlatformVSWage":
            $grdata = $this->gr->platform_vs_wage(); break;
//        case "WagePerCountry":
//            $grdata = $this->gr->wage_per_country(); break;
//        case "PlatformPopularity":
//            $grdata = $this->gr->platform_popularity(); break;
//        case "TimeVSTime":
//            $grdata = $this->gr->platform_vs_wage(); break;
    }

//    $platform_vs_wage = $gr->platform_vs_wage();
////print_r($platform_vs_wage);
//    $wage_per_country = $gr->wage_per_country();
//    $platform_popularity = $gr->platform_popularity();
//    $rating_vs_wage = $gr->rating_vs_wage();
//    $platform_by_rating = $gr->platform_by_rating();
}




session_start();
if($_SESSION['isSignedIn'])
{
    require_once('Views/admin.phtml');
}
else
{
    header('Location: login.php');
}