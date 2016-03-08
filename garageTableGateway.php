<?php

/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 * Date: 26/11/2015
 * Time: 3:32 PM
 */
class garageTableGateway {

    private $connection;

    public function __construct($conn) {
        $this->connection = $conn;
    }

    public function getGarages() {
        $sqlQuery = "SELECT * FROM Web_Garage";

        $statement = $this->connection->prepare($sqlQuery);
        $exec = $statement->execute();

        if (!$exec) {
            die("Could not get Garages");
        }

        return $statement;
    }

    public function getGarageByID($garageID) {
        $sqlQuery = "SELECT * FROM Web_Garage WHERE garageID = :garageID";

        $statement = $this->connection->prepare($sqlQuery);
        $parameters = array("garageID" => $garageID);

        $exec = $statement->execute($parameters);

        if (!$exec) {
            die("Could not get Garages");
        }

        return $statement;
    }

    public function insertGarage($garage) {
        $sqlQuery = "INSERT INTO Web_Garage(garageAddress, phoneNo, managerName, nameofGarage, garageID, dateService, managerEmail, garageURL, overNight)" .
                "VALUES (:garageAddress, :phoneNo, :managerName, :nameofGarage, :garageID, :dateService, :managerEmail, :garageURL, :overNight)";

        $statement = $this->connection->prepare($sqlQuery);
        $parameters = array(
            "garageAddress" => $garage->getAddress(),
            "phoneNo" => $garage->getPhone(),
            "managerName" => $garage->getManagerName(),
            "nameofGarage" => $garage->getGarageName(),
            "garageID" => $garage->getGarageID(),
            "dateService" => $garage->getServiceDate(),
            "managerEmail" => $garage->getManagerEmail(),
            "garageURL" => $garage->getGarageURL(),
            "overNight" => $garage->getOvernight()
        );
        
                        echo "<pre>";
        print_r($parameters);
        print_r($garage);
        echo "</pre>";

        $exec = $statement->execute($parameters);

        if (!$exec) {
            die("Could not insert garage");
        }


        $id = $this->connection->lastInsertId();

        return $id;
    }

    public function removeGarage($id) {
        $sqlQuery = "DELETE FROM Web_Garage WHERE garageID= :garageID";

        $statement = $this->connection->prepare($sqlQuery);
        $parameters = array(
            "garageID" => $id
        );

        $status = $statement->execute($parameters);

        if (!$status) {
            die("Could not delete the garage");
        }
    }

    public function updateGarage($g) {

        $sqlQuery = "UPDATE Web_Garage SET " .
                "garageAddress = :address, " .
                "phoneNo = :phone, " .
                "managerName = :manager_name, " .
                "nameofGarage = :garage_name, " .
                "dateService = :service_date, " .
                "managerEmail = :manager_email," .
                "garageURL = :garage_url, " .
                "overNight = :overnight" .
                " WHERE garageID = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $parameters = array(
            "address" => $g->getAddress(),
            "phone" => $g->getPhone(),
            "manager_name" => $g->getManagerName(),
            "garage_name" => $g->getGarageName(),
            "service_date" => $g->getServiceDate(),
            "manager_email" => $g->getManagerEmail(),
            "garage_url" => $g->getGarageURL(),
            "overnight" => $g->getOvernight(),
            "id" => $g->getGarageID()
        );

//        echo "<pre>";
//        print_r($parameters);
//        print_r($g);
//        echo "</pre>";

        $status = $statement->execute($parameters);

        if (!$status) {
            die("Could not update garage");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

}
