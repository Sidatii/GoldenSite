<?php require APPROOT . '/views/inc/header.php'; ?>

<form class="container" style="max-width: 500px; background-color: gainsboro; padding: 15px; border-radius: 10px;" method="POST" action="<?php echo URLROOT . 'admins/insertProduct';?>"  enctype="multipart/form-data">
<a class="btn btn-light" href="<?php echo URLROOT . 'admins/products/1'; ?>">Back</a>
<center><H3>Add product</H3></center>

  <div class="form-group">
    <label>Product name</label>
    <input class="form-control" type="text" name="productName" required>
  </div>
  <div class="form-group">
    <label>Product discription</label>
    <textarea class="form-control" name="productDiscription" id="" style="height: 100px;" required></textarea>
  </div>
  <div class="form-group">
    <label>Product image</label>
    <input class="form-control p-0" type="file" name="productImage" accept="image/*" required>
  </div>
  <div class="form-group ">
    <label>Product Quantity</label>
    <input class="form-control p-0" type="number" name="productQuantity" required>
  </div>
  <div class="form-group">
    <label>Product Price</label>
    <input class="form-control p-0" type="float" name="productPrice" required>
  </div>
  <div class="form-group">
  <label>Product Category</label>
    <select class="form-control" name="IDC" id="">
        <?php foreach($data['category'] as $category) : ?>
            <option value="<?php echo $category->IDC;?>">
                <?php echo $category->CatName;?>
            </option>
        <?php endforeach;?>
    </select>
  </div>
  <button type="submit" class="btn btn-warning">Submit</button>
</form>



<?php require APPROOT . '/views/inc/footer.php'; ?>
