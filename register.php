<?php

$view = new stdClass();
$view->pageTitle = 'Registration Page';

spl_autoload_register(function($class)
{
    include 'Models/' . $class . '.php';
});


if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwd_repeat = $_POST['pwd-repeat'];
    
}

require_once('Views/registration.phtml');

