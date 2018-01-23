<?php
require_once('Models/Register.php');
require_once ('Models/database.php');
require_once('Views/register.phtml');


$view = new stdClass();
$view->pageTitle = 'Registration Page';

spl_autoload_register(function($class)
{
    include 'Models/' . $class . '.php';
});

if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = password_hash(htmlentities($_POST['psw']), PASSWORD_BCRYPT);
    echo "<h1>$password</h1>";
    $admin = '1';

    $register = new Register();
    $register->addNewUser($email, $password, $admin);
}

