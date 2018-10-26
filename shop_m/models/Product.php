<?php

namespace app\models;

class Product extends DataEntity
{
    public $id;
    public $title;
    public $price;
    public $photo;


    public static function getTableName()
    {
        return 'goodsData';
    }


}