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
        print_r($data);
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

    /**
     * Take a 2D array, representing a table of results that is
     * returned after an SQL query
     * @param $results
     */
    public function convertResultsToJSON($results)
    {
        $JSONString = "[";

        if($results == null)
            $lastRow = 0;
        else
            $lastRow = sizeof($results);


        for($row = 0; $row < $lastRow; $row++)
        {
            $JSONString = $JSONString . "[";

            if($results == null)
                $lastCol = 0;
            else
                $lastCol = sizeof($results[$row]);


            for($colCount = 0; $colCount < ($lastCol / 2); $colCount++)
            {
                $value = $results[$row][$colCount];
                $JSONString = $JSONString . "'$value', ";
            }

            $JSONString = $JSONString . "]";
        }
        $JSONString = $JSONString . "]";

        return $JSONString;
    }

    /**
     * Take a 2D array that's been outputted by an SQL query and convert it to
     * a CSV string
     * @param $results
     * @return string
     */
    public function convertResultsToCSV($results)
    {
        $CSVString = "\"idno\",\"platform\",\"wage\",\"currency\",\"hours_spent_working\",\"hours_spent_looking\",\"gender\",\"age\",\"rating\",\"country\",\"rating_pay\",\"rating_conditions\",\"rating_description\",\"comment\",\"rejection\",\"socialSecurity\"\n";

        if($results == null)
            $lastRow = 0;
        else
            $lastRow = sizeof($results);


        for($row = 0; $row < $lastRow; $row++)
        {
            if($results == null)
                $lastCol = 0;
            else
                $lastCol = sizeof($results[$row]);

            for($colCount = 0; $colCount < ($lastCol / 2); $colCount++)
            {
                $value = $results[$row][$colCount];
                $CSVString = $CSVString . "\"$value\",";
            }
            $CSVString = $CSVString . "\n";
        }
        return $CSVString;
    }


    /**
     * Take a string of CSV data and write it to a file in the root
     * directory of the server. This will override any data already
     * in the file
     * @param $CSVString
     */
    public function writeCSVFile($CSVString)
    {
        $file = 'data.csv';
        file_put_contents($file, $CSVString);
    }


    /**
     * Hardcoded currency conversion algorithm
     * @param $currency
     * @param $value
     * @return float
     */
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