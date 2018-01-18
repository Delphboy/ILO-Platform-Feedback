<?php
require_once('Models/Graph.php');

$gr = new Graph();

$grdata = null;

//if (isset($_POST['GraphSubmit'])){
    switch ($_POST['def_graphs']) {
        case "PlatformVSWage":
            $grdata = $gr->platform_vs_wage();
            break;
//    }
}
//echo "<p>This is text</p>";
echo "<script type=\"text/javascript\">platform_vs_wage('$grdata');</script>";