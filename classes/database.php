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
    private $host = "den1.mysql3.gear.host";
    private $dbName = "gr2";
    private $user = "gr2";
    private $pass = "gr0up2t357db!";

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
        $this->statement = $this->db->prepare($query);

    }

    /** Executes the prepared query
     * @return the executed statement
     */
    public function execute(){
        return $this->statement->execute();
    }

    /** Executes the last prepared query and returns all the rows of the results
     * @return array of arrays of data (each array is a row of data)
     */
    public function resultset(){
        $this->execute();
        return $this->statement->fetchAll();
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
    /**
     * Executes the last prepared query and returns a single row of the results
     * @return a single row of the results from the last prepared query
     */
    //public function single(){
    //   $this->execute();
    //    return $this->statement->fetch();
    //}
}