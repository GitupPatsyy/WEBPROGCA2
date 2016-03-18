<?php

/**
 * Created by IntelliJ IDEA.
 * User: rorypb
 * Date: 01/12/2015
 * Time: 12:03 PM
 */
class Bus {

//private class variables
    private $id;
    private $reg;
    private $make;
    private $model;
    private $enginesize;
    private $bought;
    private $service;
    private $garageid;

    //default constructor for the bus object
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

//get method for id
    public function getId() {
        return $this->id;
    }

//get method for reg
    public function getReg() {
        return $this->reg;
    }

//get method for make
    public function getMake() {
        return $this->make;
    }

//get method for model
    public function getModel() {
        return $this->model;
    }

//get method for enginesize
    public function getSize() {
        return $this->enginesize;
    }

//get method for date bought
    public function getBought() {
        return $this->bought;
    }

//get method for service date
    public function getService() {
        return $this->service;
    }

//get method for garage id
    public function getGarageId() {
        return $this->garageid;
    }

}
