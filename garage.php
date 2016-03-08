<?php

/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 * Date: 01/12/2015
 * Time: 12:03 PM
 */
class Garage {

    private $address;
    private $phone;
    private $manager_name;
    private $garage_name;
    private $garageID;
    private $service_date;
    private $manager_email;
    private $garage_url;
    private $overnight;

    public function __construct($a, $p, $mn, $gn, $gid, $sd, $me, $gurl, $on) {
        $this->address = $a;
        $this->phone = $p;
        $this->manager_name = $mn;
        $this->garage_name = $gn;
        $this->garageID = $gid;
        $this->service_date = $sd;
        $this->manager_email = $me;
        $this->garage_url = $gurl;
        $this->overnight = $on;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getManagerName() {
        return $this->manager_name;
    }

    public function getGarageName() {
        return $this->garage_name;
    }

    public function getGarageID() {
        return $this->garageID;
    }

    public function getServiceDate() {
        return $this->service_date;
    }

    public function getManagerEmail() {
        return $this->manager_email;
    }

    public function getGarageUrl() {
        return $this->garage_url;
    }

    public function getOvernight() {
        return $this->overnight;
    }

}
