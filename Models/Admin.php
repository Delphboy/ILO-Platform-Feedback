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
        $this->SQLQuery = NULL;
    }

    function setQuery($newQuery)
    {
        $this->SQLQuery = $newQuery;
    }

    function executeQuery()
    {
        if(($this->SQLQuery != "") || ($this->SQLQuery != NULL))
        {
            $this->SQLQuery = $this->ILODatabase->prepare($SQLQuery);
            $this->SQLQuery->execute();
        }
        else
        {

        }
    }

}