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
echo 'I am a var dump <br/>';
var_dump($_POST['table-submit']);
// Check for the country selection

if(isset($_POST['table-submit']))
{
    //listen for submission
    // if it's submitted then:
    // grab query -> execute -> return table with values
    // display values in DIV
    $query = $_POST['country-selection-admin'];
    $tableToDisplay = $model->createTable($query);
    echo '';
    echo $tableToDisplay;
}