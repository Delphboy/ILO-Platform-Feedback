<?php
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
    $query = "INSERT INTO review(platform, wage, currency, hours_spent_working, hours_spent_looking, gender, age, rating, country,rating_pay, rating_conditions,rating_description,comment) VALUES(:platform, :wage, :CurrencySign, :timeworking, :timelooking, :gender, :age, :rating, :country, 7,7,7,'steve');";
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

if (isset($_POST['captcha-submit'])) {
	
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$privatekey = "6LdtaEEUAAAAAIpHKMtXx2Tsf_zTcsHRlYDWGlK-";

	$response = file_get_contents ($url . "?secretkey=" . $privatekey . "&response=" . $_POST['g-captcha-response'] . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
	$data = json_decode ($response);

	if (isset($data->success) AND $data->success == true) {
		//true?
		header ('Location: index.php?CaptchaPass=True');
	}
	else {
		header ('Location: index.php?CaptchaFail=True');
	}

if(isset($_GET['CaptchaPass'])){
	echo "<div class=\"form-check\">Message Sent</div>";
}
if(isset($_GET['CaptchaFail']))
{
	echo "<div class=\"form-check\">Captcha Failed</div>";
}

require_once('Views/index.phtml');

