<?php
require_once('Views/template/headerUser.phtml');
require_once('Views/index.phtml');
require_once('Models/index.php');
require_once('Models/database.php');

$survey = new index();

//If the data has been submitted
if(isset($_POST['submit'])) {
//pull data from database [ IT WORKS! LEAVE IT ALONE!!!! thank you ]
    $platform = $_POST['platform'];
    $timelooking = $_POST['timelooking'];
    $timeworking = $_POST['timeworking'];
    $currencySign = $_POST['CurrencySign'];
    $wage = $_POST['wage'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $country = $_POST['country'];
    $rating = $_POST['rating'];

    $dbHandle = database::Instance();
    $query = "INSERT INTO review(platform, wage, currency, hours_spent_working, hours_spent_looking, gender, age, rating, country) VALUES(:platform, :wage, :CurrencySign, :timeworking, :timelooking, :gender, :age, :rating, :country);";
    $dbHandle->query($query);

    $dbHandle->bind(':platform',$platform);
    $dbHandle->bind(':wage', $wage);
    $dbHandle->bind(':CurrencySign',$currencySign);
    $dbHandle->bind(':timeworking',$timeworking);
    $dbHandle->bind(':timelooking',$timelooking);
    $dbHandle->bind(':gender',$gender);
    $dbHandle->bind(':age',$age);
    $dbHandle->bind(':rating',$rating);
    $dbHandle->bind(':country',$country);
    $dbHandle->execute();
}