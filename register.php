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
    $admin = '1';

    $dbHandle = database::Instance();
    $query = "INSERT INTO gr2.user(password, email, isAdministrator) 
              VALUES (:psw, :email, :admin)";
    $dbHandle->query($query);

    $dbHandle->bind(':psw', $password);
    $dbHandle->bind(':email', $email);
    $dbHandle->bind(':admin', $admin);
    $dbHandle->execute();

}

