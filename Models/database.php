<?php

/**
 * Singleton class intended to manage the connection to the database
 * Currently configured to use a local database
 * Database is located in the /images folder in the project directory
 * User: stc567
 * Date: 1/10/18
 * Time: 11:49 AM
 */


final class database
{
    public $db; //PDO object which contains the database
    private $statement; //the current prepared query to be executed by execute()

    //Database details
    //TODO: Enter the details to your database here
    private $host = "";
    private $dbName = "";
    private $user = "";
    private $pass = "";

    private static $inst = NULL;
    /**
     * creates and assigns a PDO object to "db" which is used by all other methods
     */
    private function __construct(){
        $dsn = "mysql:host=".$this->host.";dbname=".$this->dbName;
        $this->db = new PDO($dsn, $this->user, $this->pass);
    }

    /**
     * @return $inst database object instance
     */
    public static function Instance(){
        if (self::$inst == null){
            self::$inst = new database();
        }
        return self::$inst;
    }
    /** Prepares a query for execution
     * @param $query - text of the query to be prepared for execution
     */
    public function query($query){
        $q = $query;
        $this->statement = $this->db->prepare($q);
        if ($this->statement == false){echo 'query not prepared';}
    }

    /** Executes the prepared query
     * @return the executed statement
     */
    public function execute()
    {
        return $this->statement->execute();
    }

    /** Executes the last prepared query and returns all the rows of the results
     * @return array of arrays of data (each array is a row of data)
     */
    public function resultSet()
    {
        $this->execute();
        return $this->statement->fetchAll();
    }

    /**
     * Reset the database
     */
    public function resetConnection()
    {
        $this->db = NULL;
    }

    public function bind($param, $value, $type = null){
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->statement->bindValue($param, $value, $type);
    }

    public function getStatement()
    {
        return $this->statement;
    }
}
