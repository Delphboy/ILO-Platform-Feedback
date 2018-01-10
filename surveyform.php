<?php

require($_SERVER['DOCUMENT_ROOT'] . '/classes/database.php');

$dbHandle = database::Instance();
$view = new stdClass();
$view->pageTitle = 'Survey Form';

if (isset($_POST['submit']))
{
    $view->result = 'Inseting data';

    $platform = $_POST['platform'];
    $timelooking = $_POST['timelooking'];
    $timeworking = $_POST['timeworking'];
    $wage = $_POST['wage'];

    $dbHandle->query("INSERT INTO review (platform, hours_spent_looking, hours_spent_working, wageData) 
                      VALUES (:platform, :timelooking, :timeworking, :wage);");
    $dbHandle->bind(':platform',$platform);
    $dbHandle->bind(':timelooking',$timelooking);
    $dbHandle->bind(':timeworking',$timeworking);
    $dbHandle->bind(':wage',$wage);

    $dbHandle->execute();
}
require_once('Views/surveyform.phtml');