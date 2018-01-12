<?php
require('../Models/database.php');
/**
 * Created by Henry Senior
 * User: stc765
 * Date: 1/10/18
 * Time: 10:30 AM
 */
require('');
class Register
{
    /**
     * Register constructor.
     * Create a new blank Register object
     */
    function __construct()
    {
    }

    /**
     * Create a new user, by passing an SQL statement to the PDO
     * @param $email
     * @param $password
     */
    function addNewUser($email, $password)
    {
//        $dbHandle = database::Instance();
//        $query  ="INSERT INTO gr2.user('email', 'password') VALUES (\'$email\', \'$password\')";
//        $dbHandle->query($query);
////        $dbHandle->bind(':Email', $email);
////        $dbHandle->bind(':Password', $password);
//        $dbHandle->execute();
//        $dbHandle->resetConnection();
//        $dbHandle = NULL;

        $host="den1.mysql3.gear.host";
        $dbName="gr2";
        $user = "gr2";
        $pass = 'gr0up2t357db!';

        echo "<p>" . $host . "</p>";
        echo "<p>" . $dbName . "</p>";
        echo "<p>" . $user . "</p>";
        echo "<p>" . $pass . "</p>";

        $dbHandle = new PDO("mysql:host=$host;dbname=$dbName",$user,$pass);
        echo $dbHandle;

        $query  ="INSERT INTO gr2.user('email', 'password', 'isAdmin') VALUES (\'$email\', \'$password\', '1')";
        echo $query;

        $statement = $dbHandle->prepare($query); // prepare PDO statement
        echo $statement;
        $statement->execute();   // execute the PDO statement
        echo $statement;
    }
}