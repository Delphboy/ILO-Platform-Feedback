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

    //A test to see if the database connects to its source
    public function testConnection()
    {
        $test = database::Instance();
        $this->assertNotNull($test);
    }

    //A test to see if the query that is generated is genuine, if true is returned then the query is genuine
    public function testQuery()
    {
        $query = "SELECT * FROM reviews";
        $test = database::Instance();
        $this->assertTrue($test->query($query));
    }

    //A test to see if the resultSet() method returns what we need - therefore should return not null
    public function testResultSet()
    {
        $test = database::Instance();
        $this->assertNotNull($test->resultSet());
    }

    //A test to see if the database closes - therefore should return null
    public function testClosingDB()
    {
        $test = database::Instance();
        $this->assertTrue($test->resetConnection());
    }


}
