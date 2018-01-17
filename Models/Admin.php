<?php

/**
 * Created by PhpStorm.
 * User: stc765
 * Date: 1/16/18
 * Time: 4:19 PM
 */
require_once ('Graph.php');
require_once ('database.php');
class Admin
{
    private $ILODatabase;

    /**
     * Admin constructor.
     * Create a connection to the database
     */
    function __construct()
    {
        $this->ILODatabase = database::Instance();
    }

    function createTable($statement)
    {
        $this->ILODatabase->query($statement);
        $data = $this->ILODatabase->resultSet();
        $rowCount = sizeof($data); //No of rows

        $output = "";
        $output = $output . '<table id="myTable" border="1" class="table table-striped col-md-5 col-xs-12">';

        $sizeofrow = sizeof($data[0]); //no of cols
        echo "Size of row is: $sizeofrow <br>";
        print_r($data[0]);


        for($rowno = 0; $rowno < $rowCount; $rowno++)
        {
            $colcount = sizeof($data[$rowno]);
            $output = $output . '<tr>';
            for($colno = 0; $colno < $colcount; $colno++)
            {
                $output = $output . '<td>' . $data[$rowno][$colno] . '</td>';
            }
            $output = $output . '</tr>';
        }
        $output = $output . '</table>';

        return $output;
    }

}