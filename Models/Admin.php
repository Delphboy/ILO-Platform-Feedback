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
    private $SQLQuery;

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
        $rowCount = sizeof($data);

        $output = "";
        $output = $output . "<table id='myTable' class='table table-striped col-md-5 col-xs-12'>";

        for($i = 0; $i < $rowCount; $i++)
        {
            $row = $data[$i];
            $output = $output . "<tr>";
            for($j = 0; $j < sizeof($row[$i]); $j++)
            {
                $output = $output . "<td>" . $row[$j] . "</td>";
            }
            $output = $output . "</tr>";
        }
        $output = $output . "</table>";

        return $output;
    }

}