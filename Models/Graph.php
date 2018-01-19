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

    function getData($statement){
        $this->conn->query($statement);
        $data = $this->conn->resultSet();
        return $data;
    }

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

//    function rating_vs_wage($statement){
//        $result = $this->getData($statement);
//        $rows = array();
//        $table = array();
//        $table['cols'] = array(
//
//            array('label' => 'wage', 'type' => 'number'),
//            array('label' => 'rating', 'type' => 'number')
//        );
//
//        foreach($result as $r) {
//
//            $temp = array();
//
//            // the following line will be used to slice the Pie chart
//
//            // Values of each slice
//            $temp[] = array('v' => (int) $r['wage']);
//            $temp[] = array('v' => (int) $r['rating']);
//
//
//            $rows[] = array('c' => $temp);
//        }
//        $table['rows'] = $rows;
//        $jsonTable = json_encode($table);
//        return $jsonTable;
//    }


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