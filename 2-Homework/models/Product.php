<?php

//namespace models;

class Product extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $producerId;

    protected $tableName = 'products';

}