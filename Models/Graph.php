<?php

/**Class intended to fetch data from MySQL database and encode them in a JSON format
 * Created by Bilyana Neshkova.
 * User: stc567
 * Date: 1/16/18
 * Time: 10:29 AM
 */
require_once('database.php');




class Graph
{
    private $conn;

    /**
     * Graph constructor creating a new object with connection to the database.
     */
    function __construct()
    {
        $this->conn = database::Instance();
    }

    /**
     * @param $statement - SQL statement to be executed
     * @return array - Array of all the records retrieved
     */
    function getData($statement){
        $this->conn->query($statement);
        $data = $this->conn->resultSet();
        return $data;
    }

    /**
     * @param $statement - SQL query to be executed
     * @param $label1 - Selection in field one
     * @param $label2 - Selection in field two
     * @return string - JSON encoded data
     */
    function getJson2fields($statement, $label1, $label2){

        $result = $this->getData($statement);

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

            array('label' => "$label1", 'type' => 'string'),
            array('label' => "$label2", 'type' => 'number')
        );

        /* Extract the information from $result */
        foreach($result as $r) {

            $temp = array();

            // the following line will be used to slice the Pie chart

            // Values of each slice
            $temp[] = array('v' => (string) $r[$label1]);
            $temp[] = array('v' => (real) $r[$label2]);
            $rows[] = array('c' => $temp);
        }

        $table['rows'] = $rows;

        // convert data into JSON format
        $jsonTable = json_encode($table);
        return $jsonTable;
    }

    /**
     * @param $statement - SQL query to be executed
     * @param $label1 - Selection in field one
     * @param $label2 - Selection in field two
     * @param $label3 - Selection in field three
     * @return string - JSON encoded data
     */
    function getJson3fields($statement, $label1, $label2, $label3){
        $result = $this->getData($statement);

        $rows = array();
        $table = array();
        $table['cols'] = array(
            array('label' => "$label1", 'type' => 'string'),
            array('label' => "$label2", 'type' => 'number'),
            array('label' => "$label3", 'type' => 'number')
        );

        foreach($result as $r) {
            $temp = array();
            $temp[] = array('v' => (string) $r[$label1]);
            $temp[] = array('v' => (real) $r[$label2]);
            $temp[] = array('v' => (real) $r[$label3]);
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