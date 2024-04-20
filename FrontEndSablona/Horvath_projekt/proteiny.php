<?php
require_once 'panel.php'; 

$manager = new ProductManager();
$products = $manager->listProducts(); // Fetch 

include '../../parts/header.php';
?>

<div class="medzeraaa"></div>

<div class="sectionn">
    <section class="shopbox">
        <h2 class="section-title">Products</h2>
        <div class="shop-content">
            <?php foreach ($products as $product): ?>
                <div class="product-box">
                    <img src="data:image/jpeg;base64,<?= base64_encode($product['picture']) ?>" 
                         alt="<?= htmlspecialchars($product['name']) ?>" class="product-img">
                    <h2 class="product-title"><?= htmlspecialchars($product['name']) ?></h2>
                    <form action="add_to_cart.php" method="post">
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <input type="image" id="kosikkk" src="img/kosik.png" class="add-cart" alt="Add to cart">
                    </form>
                    <span class="price"><?= htmlspecialchars(number_format($product['price'], 2)) ?>€</span>
                    <p class="product-text"><?= htmlspecialchars($product['description']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>

<div class="medzera"></div>

<?php include '../../parts/footer.php'; ?>
