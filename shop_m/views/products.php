<?/** @var \app\models\Product $model
 * @var \app\models\Cart $productsFromCartArray; $productCount; $productSumm; $summBasket
 */?>
<p>Напишите отзыв</p>
<form action="" method="post">
  <textarea name="comment" cols="40" rows="3" placeholder="Напишите что-нибудь"></textarea>
  <button type="submit" name="commentbtn" value="1">Разместить отзыв</button>
  <p>Ваши отзывы:</p>
  <ul>
      <?php //foreach ($getComments as $val) { ?>
        <li><? /*=$val['comment'] */?></li>
      <? //} ?>
  </ul>
</form>
<div id="products">
    <?php foreach ($model as $product): ?>
      <div class="card-product-box">
        <a href="/product/card?id=<?= $product['id'] ?>">
          <img class="card-product-img" src="img/<?=$product['photo'] ?>" alt="product">
          <h2><?= $product['title'] ?></h2>
          <h4>$<?= $product['price'] ?></h4>
        </a>
        <form action="/cart/addProductToBasket" method="post">
          <div class="add-flex">
            <a href="#add" class="add-to-cart">
              <button class="add-to-cart-cont" name="buybtn" value="<?=$product['id']?>">
                <img src="img/Forma 1 copy1.png" alt="cart">
                Add to Cart
              </button>
            </a>
          </div>
        </form>
      </div>
    <? endforeach; ?>
</div>

<p>My office</p>
<h1>Hello!</h1>
<h2>You login: <?//=$getUserById['login']?></h2>
<h2>You password: <?//=$getUserById['password']?></h2>
<form action="/product" method="post">
  <p>Войти в личный кабинет</p>
  <input type="login" name="login" placeholder="Логин">
  <input type="password" name="password" placeholder="Пароль">
  <button type="submit" name="userbtn" value="1">Войти</button>
</form>
<br>
<form action="/product" method="post">
  <p>Зарегистрироваться</p>
  <input type="login" name="loginReg" placeholder="Логин">
  <input type="password" name="passwordReg" placeholder="Пароль">
  <button type="submit" name="userbtnReg" value="1">Регистрация</button>
</form>
<br>
<form action="/product" method="post">
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
  <a href="/order">Оформить заказ</a>
</form>

<form action="" method="post" enctype="multipart/form-data">
  <p>Добавить товар</p>
  <input type="text" name="title">
  <input type="text" name="price">
  <input type="file" name="photo">
  <button type="submit" name="addProduct" value="1">
    Добавить товар
  </button>
</form>