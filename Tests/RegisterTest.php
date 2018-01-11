<?php

/**
 * Created by PhpStorm.
 * User: stc765
 * Date: 1/10/18
 * Time: 11:31 AM
 */

namespace SPATApp\Tests; //Setup namespace of Test class
use \SPATApp\App\Model\Register; // pull in the model class being testing

class RegisterTest extends \PHPUnit_Framework_TestCase
{
    public function testAddNewUser()
    {
        $registerObject = new Register();
        $result = $registerObject->addNewUser("a@a.com", "password");
        $this->assertEquals("a@a.com", $result);
        $registerObject = NULL;
    }
}
