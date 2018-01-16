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
    $password = $_POST['psw'];
    $admin = '1';

    $dbHandle = database::Instance();
    $query  ="INSERT INTO user(password, email, isAdministrator) VALUES (:psw, :email, :admin)";
    $dbHandle->query($query);

    $dbHandle->bind(':email', $email);
    $dbHandle->bind(':psw', $password);
    $dbHandle->bind(':admin', $admin);
    $dbHandle->execute();
}

