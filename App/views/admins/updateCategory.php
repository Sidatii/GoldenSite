<?php require APPROOT . '/views/inc/header.php'; ?>

<form class="container" style="max-width: 500px; background-color: gainsboro; padding: 15px; border-radius: 10px;" method="POST" action="<?php echo URLROOT . 'admins/updateCategory/' . $data['idc'];?>"  enctype="multipart/form-data">
<a class="btn btn-light" href="<?php echo URLROOT . 'admins/categories'; ?>">Back</a>
<center><H3>Update Category</H3></center>
  <div class="form-group">
    <label>Category name</label>
    <input class="form-control" type="text" name="CatName" value="<?php echo $data['categories'][0]->CatName;?>" required>
  </div>
  <button type="submit" class="btn btn-warning">Submit</button>
</form>

<?php require APPROOT . '/views/inc/footer.php'; ?>