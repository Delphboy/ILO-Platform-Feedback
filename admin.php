<?php
session_start();
require_once('Views/template/headerAdmin.phtml');
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
if(isset($_POST['submit']))
{
    $model->setQuery($_POST['country-selection']);
    $model->executeQuery();
}
