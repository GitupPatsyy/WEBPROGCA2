<?php

/**
 * Created by IntelliJ IDEA.
 * User: rorypb

 * */
class busTableGateway {

    private $connection; //private connection variable

    public function __construct($conn) { //constructor for connection
        $this->connection = $conn;
    }

    public function getBuses() { //get bus method
        $sqlQuery = "SELECT * FROM Bus"; //sql selects all from buses table

        $statement = $this->connection->prepare($sqlQuery); //prepares the sql statment
        $exec = $statement->execute(); //executes the statement

        if (!$exec) {
            die("Could not get Buses");
        }

        return $statement; //returns all the buses from the table
    }

    public function getBusByID($busID) { //get a specific bus by busid
        $sqlQuery = "SELECT * FROM Bus WHERE busID = :busID"; //sql for selecting a bus by a specific bus id

        $statement = $this->connection->prepare($sqlQuery); //prepares the sql statement
        $parameters = array("busID" => $busID); //takes in the busID 

        $exec = $statement->execute($parameters); //executes the statement 

        if (!$exec) { //if there is no busid by that id
            die("Could not get Buses");
        }

        return $statement; //return the bus by the id
    }

    public function insertBus($bus) { //sql insert method
        $sqlQuery = "INSERT INTO Bus(regNum, busMake, busModel, engineSize, dateBought, dateNextService, garageID)" .
                "VALUES (:regNum, :busMake, :busModel, :engineSize, dateBought, :dateNextService, :garageID"; //sql query for inserting the bus object into the database

        $statement = $this->connection->prepare($sqlQuery); //prepares the sql statement 
        $parameters = array(//The parameters that are taken in from the formdata 
            "regNum" => $bus->getReg(),
            "busMake" => $bus->getMake(),
            "busModel" => $bus->getModel(),
            "engineSize" => $bus->getSize(),
            "dateBought" => $bus->getBought(),
            "dateNextService" => $bus->getService(),
            "garageID" => $bus->getGarageId()
        );
//for checking if the parameters array is filled and what values the bus object has 
        echo "<pre>";
        print_r($parameters);
        print_r($bus);
        echo "</pre>";

        $exec = $statement->execute($parameters); //executes the statement

        if (!$exec) { //if all the parameters are not correct 
            die("Could not insert bus");
        }


        $id = $this->connection->lastInsertId(); //

        return $id; //return the id of the new object
    }

    public function removeBus($id) { //sql to delete a bus from the database
        $sqlQuery = "DELETE FROM Bus WHERE busID= :busID"; //sql for delete byt busID

        $statement = $this->connection->prepare($sqlQuery); //prepare the sql statement 
        $parameters = array(//the parameters is the id 
            "busID" => $id
        );

        $status = $statement->execute($parameters); //execute the sql 

        if (!$status) {
            die("Could not delete the bus");
        }
    }

    public function updateBus($b) {//sql query for updating the bus that is selected
        $sqlQuery = "UPDATE Bus SET " . //set the values to the placehodlers
                "regNum = :reg, " .
                "busMake = :make, " .
                "busModel = :model, " .
                "engineSize = :engine, " .
                "dateBought = :bought, " .
                "dateNextService = :nextservice," .
                "garageID = :garageid, " .
                " WHERE busID = :id";
        $statement = $this->connection->prepare($sqlQuery); //prepare the statement 
        $parameters = array(//gets the new values from the formdata
            "reg" => $b->getReg(),
            "make" => $b->getMake(),
            "model" => $b->getModel(),
            "engine" => $b->getSize(),
            "bought" => $b->getBought(),
            "nextservice" => $b->getService(),
            "garageid" => $b->getGarageId(),
            "id" => $b->getId()
        );

//        echo "<pre>";
//        print_r($parameters);
//        print_r($g);
//        echo "</pre>";

        $status = $statement->execute($parameters); //execute the sql query

        if (!$status) { //if any of the params are incorrect
            die("Could not update bus"); //die
        }

        $id = $this->connection->lastInsertId(); //

        return $id;
    }

//Function to get the bus using only the garage id
    public function getBusByGarageId($garageID) {
        $sqlQuery = "SELECT b.* "
                . "FROM Bus b "//assign Bus to b 
                . "WHERE b.garageID = :garageID"; //Select all from buses by garage id where garage id = garageid

        $statement = $this->connection->prepare($sqlQuery); //prepare the sql query

        $params = array(//params of the query is the garage id
            "garageID" => $garageID
        );
        $status = $statement->execute($params); //execute the sql query

        if (!$status) {
            die("Could not retrieve buses");
        }

        return $statement; //return the bus and garage
    }

}
