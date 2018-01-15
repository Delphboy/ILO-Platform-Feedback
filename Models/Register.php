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
        $dbHandle = database::Instance();
        $query  ="INSERT INTO gr2.user(email, password, isAdministrator) VALUES (:email, :pass, '1')";
        $dbHandle->bind(':email', $email);
        $dbHandle->bind(':pass', $password);
        $dbHandle->query($query);
        $dbHandle->execute();
        $dbHandle->resetConnection();
        $dbHandle = NULL;
    }
}