<?php require APPROOT . '/views/inc/header.php'; ?>

    
  <div class="gallery_intro">
    <div class="gal_title">
      <h6>Discover our</h6>
      <h1 class="gallery_header">GALLERY</h1>
      <p>Dhayby is an international store that provides you with luxerious jewelorries. In our store you can find everything you are looking for. Welcome.</p>
    </div>
    <div class="gal_imag">
      <img src="<?php echo URLROOT . 'Public/images/ring.png';?>" alt="">
    </div>
  </div>

  <!-------------------------------------Products----------------------------------------------------->
  <center class="m-4 mx-auto">
<div class="container">
<?php  foreach($data['category'] as $item) : ?>
    <a class="btn btn-light" href="<?php echo URLROOT . 'pages/gallery/' . $item->IDC; ?>"><?php echo $item->CatName?></a>
<?php endforeach ;?>
</div>
    <section class="product">
    <div class="product-container">
        <?php  foreach($data['products'] as $item) : ?>
        <div class="product-card">
            <div class="product-image">
                <span class="discount-tag">50% off</span>
                <img src="<?php echo URLROOT .'Public/images/'. $item->img; ?>" class="product-thumb" alt="">
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




<!--------------------------------------------------------------------------------------->
<?php require APPROOT . '/views/inc/footer.php'; ?>