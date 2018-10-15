<?php

namespace app\models;

class Product extends Model
{
    public $id;
    public $title;
    public $price;
    public $photo;

public function getTableName()
{
    return 'goodsData';
}
}