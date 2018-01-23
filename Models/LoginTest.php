<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 19/01/2018
 * Time: 16:06
 */

use PHPunit\Framework\TestCase;

require_once('Login.php');

class LoginTest extends TestCase
{
    //Tests if the user can login using a predefined entry in the database
    public function testSignInSuccess()
    {
        $login = new Login();
        $this->assertTrue($login->signIn('hello@hello.com', 'hello'));
    }

    //Tests if the user cannot login using fake details
    public function testSignInFailure()
    {
        $login = new Login();
        $this->assertFalse($login->signIn('fail@fail.com', 'fail'));
    }
}
