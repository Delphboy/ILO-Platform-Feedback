<?php
$view = new stdClass();
$view->pageTitle = 'Calculator';
spl_autoload_register(function($class) {
    include 'tests/' . $class . '.php';
});
if(isset($_POST['submit']))
{
    $calculator = new Calculator($_POST['number1'],$_POST['number2'], $_POST['operation']);
    //var_dump($_POST[number1],$_POST[number2],$_POST[operation]);
    echo "<br>";
    $result = $calculator->calculate();
    if (!$result)
    {
        $view->result = 'Not a valid number.';
    }
    else
    {
        $view->result = 'Calculating '. $_POST['number1'] . ' '.
            $_POST['operation'] .' '. $_POST['number2'] . ' is ' . $result . '.';
    }
}
require_once('Views/calculator.phtml');