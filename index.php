<?php
require_once('Models/Index.php');
require_once('Models/database.php');
$survey = new index();

if(isset($_POST['submit'])){
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$privatekey = "6LfwdUEUAAAAAH5VxW0dyFQpBYR1hFBeA3q0l1A0";
	
	$response = file_get_contents ($url."?secret=".$privatekey."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
	
	$data = json_decode ($response);
	
	if(isset($data->success) AND $data->success==true)
	{
		$platform = $_POST['platform'];
		$timelooking = $_POST['timelooking'];
		$timeworking = $_POST['timeworking'];
		$currencySign = $_POST['CurrencySign'];
		$wage = $_POST['wage'];
		$gender = $_POST['gender'];
		$age = $_POST['age'];
		$country = $_POST['country'];
		$rating = $_POST['rating'];
		$pay = $_POST['ratingPay'];
		$conditions = $_POST['ratingConditions'];
		$description = $_POST['ratingDesc'];
		$comment = $_POST['comment'];
		$rejection = $_POST['rejection'];
		
		$survey->newReview($platform, $timelooking, $timeworking, $currencySign, $wage, $gender, $age, $country, $rating, $pay, $conditions, $description, $comment, $rejection );

		require_once('Views/success.phtml');
	}
	else{

	echo '<script language = "javascript">';
	echo 'alert("Please complete the captcha")';
	echo '</script>';

	}
}
require_once('Views/index.phtml');