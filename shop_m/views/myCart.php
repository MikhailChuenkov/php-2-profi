<form action="" method="post">
  <p>Это корзина</p>
    <?//php foreach ($getProductsFromBasket as $ProductsFromBasket): ?>
  <h3><?//=$ProductsFromBasket['productName']?></h3>
  <h3>Количество: <?//=$ProductsFromBasket['productCount']?></h3>
  <h3>Цена: $<?//=$ProductsFromBasket['productSumm']?></h3>
  <button type="submit" name="delProduct" value="<?//=$ProductsFromBasket['productId']?>">
    Удалить товар
  </button>
    <? //endforeach; ?>
  <h2>Сумма: <?//=$getSummBasket?></h2>
  <a href="myOrder.php">Оформить заказ</a>
</form>