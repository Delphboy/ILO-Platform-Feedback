<?php

use PHPunit\Framework\TestCase;

require_once('index.php');

class indexTest extends TestCase
{

    public function testNewReview()
    {
        $index = new index();

        $platform = 'AMT';
        $timelooking = 7;
        $timeworking = 7;
        $currencySign = 'USD';
        $wage = 6.45;
        $gender = 'M';
        $age = 16;
        $country = 'IE';
        $rating = 4;
        $pay = 5;
        $conditions = 4;
        $description = 3;
        $comment = "-";
        $rejection = 5;

        $this->assertTrue($index->newReview($platform, $wage, $currencySign, $timeworking, $timelooking, $gender, $age, $rating, $country, $pay, $conditions, $description, $comment, $rejection));
    }
}
