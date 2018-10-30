<?php


namespace app\models\repositories;


use app\models\Product;

class ProductRepository extends Repository
{
    public function getTableName()
    {
        return 'goodsData';
    }

    public function getEntityClass()
    {
        return Product::class;
    }

    public function getProductByIds(array $ids){
        $in = implode(", ", $ids);
        var_dump($in);
        return $this->find("SELECT * FROM goodsData WHERE id IN ({$in})", []);
    }

}