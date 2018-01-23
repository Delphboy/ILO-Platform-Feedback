<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 23/01/2018
 * Time: 14:40
 */

use PHPunit\Framework\TestCase;

require_once('Admin.php');

class adminTest extends TestCase
{

    //Test the constructor
    public function testConstruct()
    {
        $admin = new Admin();
        $this->assertTrue($admin->__construct());
    }

    //Test to generate a table body
    public function testTableBody()
    {
        $admin = new Admin();
        $array = array(2);
        $this->assertNotNull($admin->generateTableBody($array));
    }

    //Test to calculate the platform average
    public function testPlatformAverage()
    {
        $platform = 'AMT';
        $admin = new Admin();
        $this->assertNotNull($admin->calculatePlatformAverage($platform));
    }

    //Test to calculate the tuple average
    public function testTupleAverage()
    {
        $admin = new Admin();
        $array = array(214, 'AMT', 6.45, 'USD', 7, 7, 'M', 16, 4, 'IE', 5, 4, 3, '-', 5, 0);
        $this->assertNotNull(($admin->calculateTupleAverage($array)));
    }

    //test to see if extreme tuple
    public function testExtreme()
    {
        $admin = new Admin();
        $array = array(214, 'AMT', 6.45, 'USD', 7, 7, 'M', 16, 4, 'IE', 5, 4, 3, '-', 5, 0);
        $this->assertNotNull($admin->isExtreme($array));
    }
}
