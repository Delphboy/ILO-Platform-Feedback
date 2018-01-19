<?php
/**
 * Created by PhpStorm.
 * User: HPS19
 * Date: 18/01/2018
 * Time: 20:03
 */

use PHPUnit\Framework\TestCase;
require_once ('Admin.php');
class AdminTest extends TestCase
{
    public function testAdminConstructor()
    {
        $admin = new Admin();
        $this->assertNotEquals(null, $admin);
    }
}
