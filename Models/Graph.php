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

    function fetchData(){
        $conn = database::Instance();
        $conn->query('SELECT platform, AVG(wage) FROM review GROUP BY platform');
        $result = $conn->resultset();

        echo 'Attempt to create arrays';

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
            echo '<br>';
            print_r($r['AVG(wage)']);

            // the following line will be used to slice the Pie chart

            // Values of each slice
            $temp[] = array('v' => (string) $r['platform']);
            $plat = (string)$r['platform'];
            $temp[] = array('v' => (real) $r['AVG(wage)']);
            $wage = (real)$r['AVG(wage)'];
            echo "<p> $wage</p>";

            $rows[] = array('c' => $temp);
        }

        $table['rows'] = $rows;

        // convert data into JSON format
        $jsonTable = json_encode($table);
        print_r($jsonTable);
        return $jsonTable;

    }
}