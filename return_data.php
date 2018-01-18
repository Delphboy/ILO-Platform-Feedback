<?php
require_once('Models/Graph.php');

$gr = new Graph();

$grdata = $gr->platform_vs_wage();
//echo "<p>This is text</p>";
echo "<script type=\"text/javascript\">platform_vs_wage('$grdata');</script>";