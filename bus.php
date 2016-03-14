<?php

/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 * Date: 01/12/2015
 * Time: 12:03 PM
 */
class Garage {

    private $id;
    private $reg;
    private $make;
    private $model;
    private $enginesize;
    private $bought;
    private $service;
    private $garageid;

    public function __construct($id, $r, $m, $md, $eng, $bought, $service, $gid) {
        $this->id = $id;
        $this->reg = $r;
        $this->make = $m;
        $this->model = $md;
        $this->enginesize = $eng;
        $this->bought = $bought;
        $this->service = $service;
        $this->garageid = $gid;
    }

    public function getId() {
        return $this->id;
    }

    public function getReg(){
        return $this->reg;
    }

    public function getMake() {
        return $this->make;
    }

    public function getModel() {
        return $this->model;
    }

    public function getSize() {
        return $this->enginesize;
    }

    public function getBought() {
        return $this->bought;
    }

    public function getService() {
        return $this->service;
    }

    public function getGarageId() {
        return $this->garageid;
    }


}
