<?php


namespace models;


class Cart extends Model
{
    public $idUser;
    public function delete(){
        //Удалить товар из корзины
    }

    public function getTableName()
    {
        return 'cart';
    }
}