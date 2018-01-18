<?php
require_once('Models/index.php');
require_once('Models/database.php');
$survey = new index();

if(isset($_POST['submit'])){
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$privatekey = "6LfwdUEUAAAAAH5VxW0dyFQpBYR1hFBeA3q0l1A0";
	
	$response = file_get_contents ($url."?secret=".$privatekey."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
	
	$data = json_decode ($response);
	
	if(isset($data->success) AND $data->success==true){
		
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
		//var_dump ($dbHandle);
		$dbHandle->execute();
		
	}else{
	
	echo '<script language = "javascript">';
	echo 'alert("FAIL")';
	echo '</script>';
	
	}
	
}

require_once('Views/index.phtml');

