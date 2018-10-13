<?php


namespace models;


class Order extends Model
{
    public $idOrder;
    public $idUser;

    protected $tableName = 'order';
}