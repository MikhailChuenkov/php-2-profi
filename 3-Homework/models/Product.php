<?php

namespace app\models;

class Product extends Model
{
    public $id;
    public $title;
    public $price;
    public $photo;

    //public $product = new Product();


    public function getTableName()
{
    return 'goodsData';
}
}