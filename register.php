<?php
require_once('Models/Register.php');



$view = new stdClass();
$view->pageTitle = 'Registration Page';

$reg = new Register();

if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = password_hash(htmlentities($_POST['psw']), PASSWORD_BCRYPT);

    $reg->addNewUser($email, $password);
}

require_once('Views/register.phtml');