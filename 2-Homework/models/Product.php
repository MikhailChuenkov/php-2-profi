<?php

namespace models;

class Product extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $producerId;

public function getTableName()
{
    return 'product';
}
}