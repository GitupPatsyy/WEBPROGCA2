<?php

/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 * Date: 24/11/2015
 * Time: 12:55 PM
 */
class Connection
{

    private static $connection = NULL;

    public static function getInstance()
    {
        if (Connection::$connection === NULL) {
            // connect to the database local
            $host = "localhost";
            $database = "CA1-TourBusMassacre";
            $username = "rorypb";
            $password = "root";

            // connection for college database
//            $host = "daneel";
//            $database = "N00143233playground";
//            $username = "N00143233";
//            $password = "N00143233";

            $dsn = "mysql:host=" . $host . ";dbname=" . $database;
            Connection::$connection = new PDO($dsn, $username, $password);
            if (!Connection::$connection) {
                die("Could not connect to database");
            }
        }

        return Connection::$connection;
    }
}