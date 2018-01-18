<?php


$gr = new Graph();

switch ($_POST['def_graphs']) {
        case "PlatformVSWage":
            $view->grdata = $gr->platform_vs_wage();
            break;
    }

    echo $view->grdata;