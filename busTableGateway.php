<?php

/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 
 **/
class busTableGateway {

    private $connection;

    public function __construct($conn) {
        $this->connection = $conn;
    }

    public function getBuses() {
        $sqlQuery = "SELECT * FROM Bus";

        $statement = $this->connection->prepare($sqlQuery);
        $exec = $statement->execute();

        if (!$exec) {
            die("Could not get Buses");
        }

        return $statement;
    }

    public function getBusByID($busID) {
        $sqlQuery = "SELECT * FROM Bus WHERE busID = :busID";

        $statement = $this->connection->prepare($sqlQuery);
        $parameters = array("busID" => $busID);

        $exec = $statement->execute($parameters);

        if (!$exec) {
            die("Could not get Buses");
        }

        return $statement;
    }

    public function insertBus($bus) {
        $sqlQuery = "INSERT INTO Bus(regNum, busMake, busModel, engineSize, dateBought, dateNextService, garageID)" .
                "VALUES (:regNum, :busMake, :busModel, :engineSize, dateBought, :dateNextService, :garageID";

        $statement = $this->connection->prepare($sqlQuery);
        $parameters = array(
            "regNum" => $bus->getReg(),
            "busMake" => $bus->getMake(),
            "busModel" => $bus->getModel(),
            "engineSize" => $bus->getSize(),
            "dateBought" => $bus->getBought(),
            "dateNextService" => $bus->getService(),
            "garageID" => $bus->getGarageId()
        );

        echo "<pre>";
        print_r($parameters);
        print_r($bus);
        echo "</pre>";

        $exec = $statement->execute($parameters);

        if (!$exec) {
            die("Could not insert bus");
        }


        $id = $this->connection->lastInsertId();

        return $id;
    }

    public function removeBus($id) {
        $sqlQuery = "DELETE FROM Bus WHERE busID= :busID";

        $statement = $this->connection->prepare($sqlQuery);
        $parameters = array(
            "busID" => $id
        );

        $status = $statement->execute($parameters);

        if (!$status) {
            die("Could not delete the bus");
        }
    }

    public function updateBus($b) {

        $sqlQuery = "UPDATE Bus SET " .
                "regNum = :reg, " .
                "busMake = :make, " .
                "busModel = :model, " .
                "engineSize = :engine, " .
                "dateBought = :bought, " .
                "dateNextService = :nextservice," .
                "garageID = :garageid, " .
                " WHERE busID = :id";
        $statement = $this->connection->prepare($sqlQuery);
        $parameters = array(
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

        $status = $statement->execute($parameters);

        if (!$status) {
            die("Could not update bus");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

}

