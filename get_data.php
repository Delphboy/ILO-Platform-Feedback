<?php

$view = new stdClass();
$gr = new Graph();
switch ($_POST['def-graphs'])
    {
        case "PlatformVSWage":
            $view->grdata = $gr->platform_vs_wage(); break;
    }
//    $platform_vs_wage = $gr->platform_vs_wage();
////print_r($platform_vs_wage);
//    $wage_per_country = $gr->wage_per_country();
//    $platform_popularity = $gr->platform_popularity();
//    $rating_vs_wage = $gr->rating_vs_wage();
//    $platform_by_rating = $gr->platform_by_rating();
