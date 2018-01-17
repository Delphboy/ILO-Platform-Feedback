<?php
$view = new stdClass();
require_once ('Models/Admin.php');
require_once ('Models/Graph.php');

try
{
    $model = new Admin();
    $gr = new Graph();
}catch (Error $error)
{
    echo $error->getMessage();
}



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




if(isset($_POST['GraphSubmit']))
{
    $view->grdata = "<p>this is data</p>";
    echo '<h1>Henry is Okay i guess</h1>';
    switch ($_POST['def-graphs'])
    {
        case "PlatformVSWage":
            echo "<h2>attempt to set stuff</h2>";
            //echo $view->grdata;
            echo "<h2>above is our precious data</h2>";
//            $jsontable =  $this->gr->platform_vs_wage();
            echo $this->gr->platform_vs_wage();
            print_r($jsontable);
//            $view->grdata;
              break;
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
else
{
    echo '<h1>Henry Sucks</h1>';
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