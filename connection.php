<?php

/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 * Date: 24/11/2015
 * Time: 12:55 PM
 */
class Connection {

    private static $connection = NULL; //initialise the connection to null

    public static function getInstance() { //get an instance of the connection
        if (Connection::$connection === NULL) { //if the connection is null
            // connect to the database local using the credentials
            $host = "localhost";
            $database = "CA1-TourBusMassacre";
            $username = "rorypb";
            $password = "root";

            // connection for college database
//            $host = "daneel";
//            $database = "N00143233playground";
//            $username = "N00143233";
//            $password = "N00143233";

            $dsn = "mysql:host=" . $host . ";dbname=" . $database; //url for connection
            Connection::$connection = new PDO($dsn, $username, $password); //Connection is made with the variables above
            if (!Connection::$connection) { //if there is no connection 
                die("Could not connect to database"); //die
            }
        }

        return Connection::$connection; //return the connection from the credentials above
    }

}
