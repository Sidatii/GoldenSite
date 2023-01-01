<?php require APPROOT . '/views/inc/header.php'; ?>


<center><a class="btn btn-success m-4" href="<?php echo URLROOT . 'admins/addCategory'; ?>">Add product</a></center>
<div class="container">
    <?php flash('cat_updated'); ?>
    <?php flash('cat_added'); ?>
    <?php flash('cat_deleted'); ?>
<table class="table">
<thead>
    <tr>
        <th class="text-center">#</th>
        <th >Category</th>
        <th class="text-right">Actions</th>
    </tr>
</thead>
<tbody>
    <?php foreach($data['categories'] as $cat) :?>
    <tr>
        <td class="text-center"><?php echo $cat->IDC;?></td>
        <td><?php echo $cat->CatName ;?></td>
        <td class="td-actions text-right">
            <a href="<?php echo URLROOT . 'admins/updateCategoryPage/'. $cat->IDC ;?>"><button type="button" rel="tooltip" class="btn btn-success btn-round btn-just-icon btn-sm" data-original-title="" title="">
                <i class="fa-regular fa-pen-to-square"></i>
            </button></a>
            <a href="<?php echo URLROOT . 'admins/deleteCategory/'. $cat->IDC ;?>"><button type="button" rel="tooltip" class="btn btn-danger btn-round btn-just-icon btn-sm" data-original-title="" title="">
                <i class="fa-solid fa-xmark"></i>
            </button></a>
        </td>
    </tr>
    <?php endforeach;?>
</tbody>
    
</table>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
