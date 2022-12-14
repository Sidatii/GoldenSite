<?php require APPROOT . '/views/inc/header.php'; ?>

<center class="m-4 mx-auto">
    <a class="btn btn-success m-4" href="<?php echo URLROOT . 'admins/addProduct'; ?>">Add product</a>
    <div class="container" style="max-width: 300px;">
        <?php flash('prd_added'); ?>
        <?php flash('product_deleted'); ?>
        <?php flash('prd_updated'); ?>
    </div>
    <div class="container">
        <?php foreach ($data['category'] as $item) : ?>
            <a class="btn btn-light" href="<?php echo URLROOT . 'admins/products/' . $item->IDC; ?>"><?php echo $item->CatName ?></a>
        <?php endforeach; ?>
    </div>
    <section class="product">
        <div class="product-container">
            <?php foreach ($data['products'] as $item) : ?>
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?php echo URLROOT . 'Public/images/' . $item->img; ?>" class="product-thumb" alt="">
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand"><?php echo $item->ProductName; ?></h2>
                        <p class="product-short-description"><?php echo $item->Discription; ?></p>
                        <span class="price"><?php echo $item->Price; ?> Dh</span>
                    </div>
                    <div class="container">
                        <a href="<?php echo URLROOT . 'admins/updateProductPage/' . $item->ID; ?>" class="btn btn-warning">Edit</a>
                        <a href="<?php echo URLROOT . 'admins/deleteProduct/' . $item->ID; ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</center>
<?php require APPROOT . '/views/inc/footer.php'; ?>