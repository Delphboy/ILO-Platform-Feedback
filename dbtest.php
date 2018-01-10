<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/my-style.css">
</head>
<?php

$view = new stdClass();
$view->pageTitle = 'dbtest';
require_once('Views/dbtest.phtml');