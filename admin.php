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

if(isset($_POST['click']))
{
    $model->setQuery($_POST['click']);
    $model->executeQuery();
}
