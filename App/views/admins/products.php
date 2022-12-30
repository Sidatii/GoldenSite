<?php require APPROOT . '/views/inc/header.php'; ?>

<center class="m-4 mx-auto">
<div class="container">
<?php  foreach($data['category'] as $item) : ?>
    <a class="btn btn-light" href="<?php echo URLROOT . 'admins/products/' . $item->IDC; ?>"><?php echo $item->CatName?></a>
<?php endforeach ;?>
</div>
    <section class="product">
    <div class="product-container">
        <?php  foreach($data['products'] as $item) : ?>
        <div class="product-card">
            <div class="product-image">
                <span class="discount-tag">50% off</span>
                <img src="<?php echo URLROOT .'Public'. $item->img; ?>" class="product-thumb" alt="">
                <button class="card-btn">add to wishlist</button>
            </div>
            <div class="product-info">
                <h2 class="product-brand"><?php echo $item->ProductName; ?></h2>
                <p class="product-short-description"><?php echo $item->Discription; ?></p>
                <span class="price"><?php echo $item->Price; ?> Dh</span><span class="actual-price"><?php echo $item->Price * 2; ?> Dh</span>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
</center>
<?php require APPROOT . '/views/inc/footer.php'; ?>