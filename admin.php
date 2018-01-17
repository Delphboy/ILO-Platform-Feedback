<?php
session_start();
require_once ('Models/Admin.php');

$model = new Admin();

if($_SESSION['isSignedIn'])
{
    require_once('Views/admin.phtml');
}
else
{
    header('Location: login.php');
}

// Check for the country selection
if(isset($_POST['table-submit']))
{
    //listen for submission
    // if it's submitted then:
    // grab query -> execute -> return table with values
    // display values in DIV
    $query = $_POST['country-selection'];
    $tableToDisplay = $model->createTable($query);
    echo $tableToDisplay;
}
