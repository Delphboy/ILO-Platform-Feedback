<?php

/**
 * Created by PhpStorm.
 * User: stc567
 * Date: 1/16/18
 * Time: 10:29 AM
 */
require ('database.php');


class Graph
{

    function __construct()
    {
        $conn = database::Instance();
    }

    function platform_vs_wage(){
        $conn = database::Instance();
        $conn->query('SELECT platform, AVG(wage) FROM review GROUP BY platform');
        $result = $conn->resultset();

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
            print_r($r['platform']);
            //echo '<br>';
            print_r($r['AVG(wage)']);

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
        $conn = database::Instance();
        $conn->query('SELECT country, AVG(wage) FROM review GROUP BY country');
        $result = $conn->resultset();

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
        $conn = database::Instance();
        $conn->query('SELECT platform, count(platform) FROM review GROUP BY platform');
        $result = $conn->resultset();

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
        $conn = database::Instance();
        $conn->query('SELECT time_spent_looking, time_spent_working FROM review');
        $result = $conn->resultset();

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
            $temp[] = array('v' => (int) $r['time_spent_looking']);
            $temp[] = array('v' => (int) $r['time_spent_working']);
            $var1 = (int) $r['time_spent_looking'];
            $var2 = (int) $r['time_spent_working'];
            echo "<p> $var1 $var2</p>";


            $rows[] = array('c' => $temp);
        }
        $table['rows'] = $rows;
        $jsonTable = json_encode($table);
        return $jsonTable;
    }

    function platform_by_rating(){
        $conn = database::Instance();
        $conn->query('SELECT platform, AVG(rating) FROM review GROUP BY platform');
        $result = $conn->resultset();

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