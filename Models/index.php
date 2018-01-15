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

    public function newReview($query)
    {
        $host="den1.mysql3.gear.host";
        $dbName="gr2";
        $user = "gr2";
        $pass = 'gr0up2t357db!';

        $dbHandle = database::Instance();
        //$newQuery = $dbHandle->query($query);
        $dbHandle->execute();
    }
}