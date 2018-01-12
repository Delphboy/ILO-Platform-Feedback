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
        $dbHandle = database::Instance();
        $dbHandle->query("INSERT INTO user('email', 'password') VALUES (\'$email\', \'$password\');");
//        $dbHandle->bind(':Email', $email);
//        $dbHandle->bind(':Password', $password);
        $dbHandle->execute();
        $dbHandle->resetConnection();
        $dbHandle = NULL;
    }
}