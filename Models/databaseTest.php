<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 19/01/2018
 * Time: 12:04
 */

use PHPunit\Framework\TestCase;

require_once('database.php');

class databaseTest extends TestCase
{

    public function testInstance()
    {
        $test = database::Instance();
        $this->ass;
    }
}
