<?php

namespace app\models;

interface IModel
{
    public function getOne();
    public function getAll();
    public function getTableName();
}