<?php
/**
 * Created by PhpStorm.
 * User: ChrisLewis-Laptop-i7
 * Date: 15/01/2018
 * Time: 13:12
 */
require_once('database.php');

class index
{
    public function __construct()
    {

    }

    public function newReview($platform, $wage, $currencySign, $timeworking, $timelooking, $gender, $age, $rating, $country, $pay, $conditions, $description, $comment, $rejection)
    {
        $dbHandle = database::Instance();
        $query = "INSERT INTO review(platform, wage, currency, hours_spent_working, hours_spent_looking, gender, age, rating, country, rating_pay, rating_conditions, rating_description, comment, rejection) VALUES(:platform, :wage, :CurrencySign, :timeworking, :timelooking, :gender, :age, :rating, :country, :ratingPay, :ratingConditions, :ratingDesc, :user_comment,:rejection);";
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
        $dbHandle->bind(':ratingPay', $pay);
        $dbHandle->bind(':ratingConditions', $conditions);
        $dbHandle->bind(':ratingDesc', $description);
        $dbHandle->bind(':user_comment', $comment);
        $dbHandle->bind(':rejection', $rejection);
        $dbHandle->execute();
        return true;
    }
}