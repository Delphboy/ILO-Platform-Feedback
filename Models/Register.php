<?php
//require('../Models/database.php');
/**
 * Created by Henry Senior
 * User: stc765
 * Date: 1/10/18
 * Time: 10:30 AM
 */
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
        $host="den1.mysql3.gear.host";
        $dbName="gr2";
        $user = "gr2";
        $pass = 'gr0up2t357db!';

        $dbHandle = database::Instance();
        $query  ="INSERT INTO gr2.user(email, password, isAdministrator) VALUES (:email, :pass, '1')";
        $dbHandle->query($query);
        $dbHandle->bind(':email', $email);
        $dbHandle->bind(':pass', $password);
        $dbHandle->execute();
        $dbHandle->resetConnection();
        $dbHandle = NULL;

//        try {
//            $conn = new PDO("mysql:host=$host;dbname=$dbName", $user, $pass);
//            // set the PDO error mode to exception
//            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            $sql = "INSERT INTO gr2.user (email, password, isAdministrator) VALUES (':email', ':password', '1')";
//            $conn->prepare($sql);
//            // use exec() because no results are returned
//            $conn->exec($sql);
//            echo "New record created successfully";
//        }
//        catch(PDOException $e)
//        {
//            echo $sql . "<br>" . $e->getMessage();
//        }
//
//        $conn = null;

    }
}