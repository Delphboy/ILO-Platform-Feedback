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

    /**
     * Take the output of an SQL query and turn it into a table body (<tr> and <td>)
     * @param $data
     * @return string - HTML string to go between <table></table> tags
     */
    function generateTableBody($data)
    {
//        $this->ILODatabase->query($statement);
//        $data = $this->ILODatabase->resultSet();
        $rowCount = sizeof($data); //No of rows

        $output = "";

        // Remove undefined offest error
        if($data == null)
            $colCount = 16;
        else
            $colCount = sizeof($data[0]);

        for($rowNum = 0; $rowNum < $rowCount; $rowNum++)
        {
            $output = $output . '<tr>';
            for($colNum = 0; $colNum < ($colCount/2); $colNum++)
            {
                $output = $output . '<td>' . $data[$rowNum][$colNum] . '</td>';
            }
            $output = $output . '</tr>';
        }

        return $output;
    }

}