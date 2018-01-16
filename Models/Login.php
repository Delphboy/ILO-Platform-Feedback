<?php
require_once ('database.php');
/**
 * Created by Henry Senior
 * Date: 1/15/18
 * Time: 12:52 PM
 *
 * A class to model how the login page should connect to the database in order to authenticate a user
 */
class Login
{
    /**
     * Login constructor.
     */
    function __construct()
    {

    }

    /**
     * Search the database for an email and password
     * @param $email
     * @param $password
     * @return bool
     *      true if the user's data matches the search result
     *      false if the user's data doesn't match the results
     */
    function signIn($email, $password)
    {
        $dbConnection = database::Instance();
        $testQuery = "SELECT email, password FROM Users WHERE email LIKE :email;";
        $dbConnection->query($testQuery);
        $dbConnection->bind(':email', $email);
        $dbConnection->execute();
        $row = $dbConnection->resultSet();
        echo 'Email: ' . $row[0] . " Password: " .$row[1];
        if(($row[0] == $email) && ($row[1] == $password))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}