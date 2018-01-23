<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 19/01/2018
 * Time: 16:41
 */

use PHPunit\Framework\TestCase;

require_once('Register.php');

class RegisterTest extends TestCase
{

    //Test weather you can add an Admin
    public function testAddNewAdmin()
    {
        $email = "newUnit@test.com";
        $pass = 'unitPassword';
        $admin = 1;

        $register = new Register();
        $this->assertTrue($register->addNewUser($email, $pass, $admin));
    }

    //Test weather you can add a non-admin user
    public function testAddNewUser()
    {
        $email = "NEWphpunit@test_nonAdmin.com";
        $pass = 'NEWphpPassword';
        $admin = 0;

        $register = new Register();
        $this->assertTrue($register->addNewUser($email, $pass, $admin));
    }

}
