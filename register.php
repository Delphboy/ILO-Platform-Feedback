<?php require('Views/template/headerUser.phtml') ?>
<?php

$view = new stdClass();
$view->pageTitle = 'Registration Page';

spl_autoload_register(function($class)
{
    include 'Models/' . $class . '.php';
});

if(isset($_POST['submit']))
{
    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['psw']);
    $reg = new Register();
    $reg->addNewUser($email, $password);
}

require_once('Views/register.phtml');

