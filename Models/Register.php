<?php
require('../Models/database.php');
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
    function addNewUser($email, $password, $admin)
    {
        $dbHandle = database::Instance();
        $query = "INSERT INTO gr2.user(password, email, isAdministrator) VALUES (:psw, :email, :admin)";
        $dbHandle->query($query);

        $dbHandle->bind(':psw', $password);
        $dbHandle->bind(':email', $email);
        $dbHandle->bind(':admin', $admin);
        $dbHandle->execute();

        return true;
    }
}