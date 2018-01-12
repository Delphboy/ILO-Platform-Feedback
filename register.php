<?php

$view = new stdClass();
$view->pageTitle = 'Registration Page';

spl_autoload_register(function($class)
{
    include 'Models/' . $class . '.php';
});


if(isset($_POST['submit']))
{
    $email = $_POST['$email'];
    $password = $_POST['$pwd'];
    $reg = new \SPATApp\App\Model\Register();
    $reg->addNewUser($email, $password);
}

require_once('Views/registration.phtml');

