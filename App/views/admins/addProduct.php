<?php require APPROOT . '/views/inc/header.php'; ?>



<form method="POST"  enctype="multipart/form-data">
    <label>Product name</label>
    <input type="text" name="productName" required>
    <label>Product discription</label>
    <textarea name="productDiscription" id="" style="height: 100px;" required></textarea>
    <label>Product image</label>
    <input type="file" name="productImage" accept="image/*" required>
    <label>Product Quantity</label>
    <input type="number" name="productQuantity" required>
    <label>Product Price</label>
    <input type="float" name="productPrice" required>
    <label>Product Price</label>
    <select name="IDC" id="">
            <option value="<?= $row['IDC'] ?>">
                <?= $row['CatName'] ?>
            </option>
    </select>

    <input type="submit" value="Add product" name="add_product">
</form>

<?php require APPROOT . '/views/inc/footer.php'; ?>
