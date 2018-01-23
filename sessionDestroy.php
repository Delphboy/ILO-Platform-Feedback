<?php
/**
 * Created by PhpStorm.
 * User: HPS19
 * Date: 23/01/2018
 * Time: 21:15
 */
session_start();
session_destroy();
header('Location: /index.php');