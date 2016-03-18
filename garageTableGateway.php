<?php

/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 * Date: 26/11/2015
 * Time: 3:32 PM
 */
class garageTableGateway {

    private $connection; //private connection fro the table

    public function __construct($conn) {//construct the connection
        $this->connection = $conn; //using the private connection
    }

    public function getGarages() { //sql query to select all garages 
        $sqlQuery = "SELECT * FROM Web_Garage";

        $statement = $this->connection->prepare($sqlQuery); //prepeare the sql 
        $exec = $statement->execute(); //execute it

        if (!$exec) { // if there are none 
            die("Could not get Garages");
        }

        return $statement; //return all the garages
    }

    public function getGarageByID($garageID) { //get garage by an id
        $sqlQuery = "SELECT * FROM Web_Garage WHERE garageID = :garageID";

        $statement = $this->connection->prepare($sqlQuery); //prepare
        $parameters = array("garageID" => $garageID); //params are the garage id

        $exec = $statement->execute($parameters); //execute the statement

        if (!$exec) {
            die("Could not get Garages");
        }

        return $statement; //return the garagebyid
    }

    public function insertGarage($garage) { //insert into te garage table 
        $sqlQuery = "INSERT INTO Web_Garage(garageAddress, phoneNo, managerName, nameofGarage, garageID, dateService, managerEmail, garageURL, overNight)" .
                "VALUES (:garageAddress, :phoneNo, :managerName, :nameofGarage, :garageID, :dateService, :managerEmail, :garageURL, :overNight)"; //values

        $statement = $this->connection->prepare($sqlQuery); //preapre the statemnt
        $parameters = array(//all the params to go make the garage 
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

//        echo "<pre>";
//        print_r($parameters);
//        print_r($garage);
//        echo "</pre>";

        $exec = $statement->execute($parameters); //execute the statememt

        if (!$exec) {
            die("Could not insert garage");
        }


        $id = $this->connection->lastInsertId();

        return $id;
    }

    public function removeGarage($id) { //remove a garae
        $sqlQuery = "DELETE FROM Web_Garage WHERE garageID= :garageID"; //sql 

        $statement = $this->connection->prepare($sqlQuery); //prepare the staemtn
        $parameters = array(
            "garageID" => $id
        );

        $status = $statement->execute($parameters); //execute th estatemt

        if (!$status) {
            die("Could not delete the garage");
        }
    }

    public function updateGarage($g) { //update garage unction works the same as the bus
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

//Function to get the garage using only the bus id
    public function getGarageByGarageId($garageID) { //eft on the garage tbale to the bus tabpe using the id
        $sqlQuery = "SELECT g.* FROM Web_Garage g LEFT JOIN Bus b ON g.garageID = b.garageID WHERE b.busID = :id
";


        $statement = $this->connection->prepare($sqlQuery); //prepeare the sql

        $params = array(
            "id" => $garageID
        );
        $status = $statement->execute($params); //execute the sql

        if (!$status) {
            die("Could not retrieve garages");
        }

        return $statement; //return the garage by the id
    }

}
