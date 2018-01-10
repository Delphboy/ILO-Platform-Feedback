<?php

/**
 * Created by PhpStorm.
 * User: stc765
 * Date: 1/10/18
 * Time: 11:31 AM
 */
include('/Models/Register.php') ;
class RegisterTest extends PHPUnit_Framework_TestCase
{
    private $registerObject;

    protected function setUp()
    {
        $this->registerObject = new Register();
    }

    protected function tearDown()
    {
        $this->registerObject = NULL;
    }

    public function testAddNewUser()
    {
        $result = $this->registerObject->addNewUser("a@a.com", "password");
        $this->assertEquals("a@a.com", $result);
    }
}
