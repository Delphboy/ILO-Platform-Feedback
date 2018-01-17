<?php

/**
 * Created by PhpStorm.
 * User: stc567
 * Date: 1/16/18
 * Time: 10:29 AM
 */
require_once('database.php');


class Graph
{
    private $conn;
    function __construct()
    {
        $this->conn = database::Instance();
    }

    function platform_vs_wage(){
        $this->conn = database::Instance();
        $this->conn->query('SELECT platform, AVG(wage)  FROM review GROUP BY platform');
        $this->result = $this->conn->resultSet();

        //echo 'Attempt to create arrays';

        $rows = array();
        $table = array();
        $table['cols'] = array(

            // Labels for your chart, these represent the column titles.
            /*
                note that one column is in "string" format and another one is in "number" format
                as pie chart only required "numbers" for calculating percentage
                and string will be used for Slice title
            */

            array('label' => 'platform', 'type' => 'string'),
            array('label' => 'avg wage', 'type' => 'number')
        );
        /* Extract the information from $result */
        foreach($result as $r) {

            $temp = array();
            //print_r($r);
//            print_r($r['platform']);
            //echo '<br>';
//            print_r($r['AVG(wage)']);

            // the following line will be used to slice the Pie chart

            // Values of each slice
            $temp[] = array('v' => (string) $r['platform']);

            $temp[] = array('v' => (real) $r['AVG(wage)']);
            $plat = (string)$r['platform'];
            $wage = (real)$r['AVG(wage)'];
            //echo "<p> $wage</p>";

            $rows[] = array('c' => $temp);
        }

        $table['rows'] = $rows;

        // convert data into JSON format
        $jsonTable = json_encode($table);
        //print_r($jsonTable);
        return $jsonTable;
    }

    function wage_per_country(){
        $this->conn = database::Instance();
        $this->conn->query('SELECT country, AVG(wage) FROM review GROUP BY country');
        $result = $this->conn->resultSet();

        $rows = array();
        $table = array();
        $table['cols'] = array(

            array('label' => 'country', 'type' => 'string'),
            array('label' => 'avg wage', 'type' => 'number')
        );

        foreach($result as $r) {

            $temp = array();


            // the following line will be used to slice the Pie chart

            // Values of each slice
            $temp[] = array('v' => (string) $r['country']);
            $temp[] = array('v' => (real) $r['AVG(wage)']);

            $rows[] = array('c' => $temp);
        }
        $table['rows'] = $rows;
        $jsonTable = json_encode($table);
        return $jsonTable;
    }

    function platform_popularity(){
        $this->conn = database::Instance();
        $this->conn->query('SELECT platform, count(platform) FROM review GROUP BY platform');
        $result = $this->conn->resultSet();

        $rows = array();
        $table = array();
        $table['cols'] = array(

            array('label' => 'platform', 'type' => 'string'),
            array('label' => 'percentage', 'type' => 'number')
        );

        foreach($result as $r) {

            $temp = array();


            // the following line will be used to slice the Pie chart

            // Values of each slice
            $temp[] = array('v' => (string) $r['platform']);
            $temp[] = array('v' => (real) $r['count(platform)']);

            $rows[] = array('c' => $temp);
        }
        $table['rows'] = $rows;
        $jsonTable = json_encode($table);
        return $jsonTable;
    }

    function rating_vs_wage(){
        $this->conn = database::Instance();
        $this->conn->query('SELECT hours_spent_looking, hours_spent_working FROM review');
        $result = $this->conn->resultSet();
        $rows = array();
        $table = array();
        $table['cols'] = array(

            array('label' => 'time looking', 'type' => 'number'),
            array('label' => 'time working', 'type' => 'number')
        );

        foreach($result as $r) {

            $temp = array();

            // the following line will be used to slice the Pie chart

            // Values of each slice
            $temp[] = array('v' => (int) $r['hours_spent_looking']);
            $temp[] = array('v' => (int) $r['hours_spent_working']);


            $rows[] = array('c' => $temp);
        }
        $table['rows'] = $rows;
        $jsonTable = json_encode($table);
        return $jsonTable;
    }

    function platform_by_rating(){
        $this->conn = database::Instance();
        $this->conn->query('SELECT platform, AVG(rating) FROM review GROUP BY platform');
        $result = $this->conn->resultSet();

        $rows = array();
        $table = array();
        $table['cols'] = array(

            array('label' => 'platform', 'type' => 'string'),
            array('label' => 'average rating', 'type' => 'number')
        );

        foreach($result as $r) {

            $temp = array();

            $temp[] = array('v' => (string) $r['platform']);
            $temp[] = array('v' => (real) $r['AVG(rating)']);

            $rows[] = array('c' => $temp);
        }
        $table['rows'] = $rows;
        $jsonTable = json_encode($table);
        return $jsonTable;
    }

    function gender_vs_wage(){
        $this->conn = database::Instance();
        $this->conn->query('SELECT wage, AVG(wage) as food1, null as Food2
    where gender = :female;

    UNION ALL

        SELECT Anganbadi_ID, null as food1, food as Food2
    where Month = 10');
        $this->conn->bind(':female',"F");
        $result = $this->conn->resultSet();

        $rows = array();
        $table = array();
        $table['cols'] = array(

            array('label' => 'platform', 'type' => 'string'),
            array('label' => 'average rating', 'type' => 'number')
        );

        foreach($result as $r) {

            $temp = array();

            $temp[] = array('v' => (string) $r['platform']);
            $temp[] = array('v' => (real) $r['AVG(rating)']);

            $rows[] = array('c' => $temp);
        }
        $table['rows'] = $rows;
        $jsonTable = json_encode($table);
        return $jsonTable;
    }



    function returnUSD($currency, $value){
        $output = $value;
        switch ($currency){
            case "GBP" :
                $output = $value*1.38; break;
            case "EUR" :
                $output = $value*1.13; break;
            case "YEN" :
                $output = $value*152.32; break;
        }
        return $output;
    }
}