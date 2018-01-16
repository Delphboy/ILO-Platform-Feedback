<?php
session_start();
require_once('Views/template/headerAdmin.phtml');
var_dump($_SESSION);
if($_SESSION['isSignedIn'])
{
    require_once('Views/admin.phtml');
}
//else
//{
//    header('Location: login.php');
//}
