<?/** @var \app\models\Cart $cart
 * @var \app\models\Cart $productsFromCartArray; $productCount; $productSumm; $summBasket
 */?>
<form action="/order/delProductFromBasket" method="post">
  <p>Это корзина</p>
    <?php foreach ($productsFromCartArray as $products): ?>
  <h3><?=$products->title?></h3>
  <h3>Количество: <?=$productCount[$products->id]?></h3>
  <h3>Цена: $<?=$productSumm[$products->id]?></h3>
  <button type="submit" name="delProduct" value="<?=$products->id?>">
    Удалить товар
  </button>
    <? endforeach; ?>
  <h2>Сумма: <?=$summBasket?></h2>
</form>

<form action="/order/addOrder" method="post">

  <button type="submit" name="checkoutbtn" value="checkout">
    Оформить заказ
  </button>
  <a href="/product">Назад</a>
</form>
