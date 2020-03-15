<?php

class Car
{
    Private $id;
    Private $brand;
    Private $model;
    Private $year;
    Private $transmission;
    Private $pricePerDay;
    Private $picture;
    Private $numberOfDoors;
    Private $bodyType;
    Private $photoLink;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }

    public function getPricePerDay()
    {
        return $this->pricePerDay;
    }

    public function setPricePerDay($pricePerDay)
    {
        $this->pricePerDay = $pricePerDay;
    }

    public function getTransmission()
    {
        return $this->transmission;
    }

    public function setTransmission($transmission)
    {
        $this->transmission = $transmission;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    public function getNumberOfDoors()
    {
        return $this->numberOfDoors;
    }

    public function setNumberOfDoors($numberOfDoors)
    {
        $this->numberOfDoors = $numberOfDoors;
    }

    public function getBodyType()
    {
        return $this->bodyType;
    }

    public function setBodyType($bodyType)
    {
        $this->bodyType = $bodyType;
    }

    public function getPhotoLink()
    {
        return $this->photoLink;
    }

    public function setPhotoLink($photoLink)
    {
        $this->photoLink = $photoLink;
    }
}
