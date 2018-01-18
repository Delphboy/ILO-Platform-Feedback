<?php

$gr = new Graph();

$grdata = $gr->platform_vs_wage();

echo "<script type=\"text/javascript\">platform_vs_wage('$grdata');</script>";