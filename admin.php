<?php
//session_start();
require_once ('Models/Admin.php');

$model = new Admin();

echo 'I am a var dump <br/>';
print_r($_POST);
// Check for the country selection

if(isset($_POST['country-selection-admin']))
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





//if($_SESSION['isSignedIn'])
//{
//    require_once('Views/admin.phtml');
//}
//else
//{
//    header('Location: login.php');
//}