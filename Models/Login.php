<?php

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
     * @param $searchEmail
     * @param $searchPass
     * @return bool
     *      true if the user's data matches the search result
     *      false if the user's data doesn't match the results
     */
    function searchDatabase($searchEmail, $searchPass)
    {
        $dbHandle = database::Instance();
        $query  ="SELECT email, password FROM gr2.user WHERE email = :email;";
        $dbHandle->bind(':email', $searchEmail);
        $result = $dbHandle->resultSet();

        echo $result[0] . " " . $searchEmail . "<br/>";
        echo $result[1] . " " . $searchPass . "<br/>";

        if($result[0] == $searchEmail && $result[1] == $searchPass)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}