<?php
require_once('Models/Graph.php');

$gr = new Graph();

$grdata = null;


    switch ($_POST['def_graphs']) {
        case "PlatformVSWage":
            $grdata = $gr->platform_vs_wage();
            echo "<script type=\"text/javascript\">platform_vs_wage('$grdata');</script>";
            break;

}
//echo "<p>This is text</p>";
