<?php


namespace models;


class Cart extends Model
{
    public $idUser;
    public function delete(){
        //Удалить товар из корзины
    }
    protected $tableName = 'cart';
}