<?php

require("../includes/init.php");
require "../includes/category.php";
require "../includes/product.php";

$categories = Category::find_all();

if (isset($_POST['submit'])) {

    $product = new Product();
    $product->name = trim($_POST['name']);
    $product->description = trim($_POST['description']);
    $product->price = trim($_POST['price']);
    $product->category_id = trim($_POST['category_id']);
    $product->set_file($_FILES['file_upload']);


    if ($product->save()) {
        redirect("products.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include "commons/header.php"; ?>

<body>

<div id="wrapper">

    <?php include "commons/nav-side.php"; ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Create Product
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control" name="name" required placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <input type="text" class="form-control" name="description" required placeholder="Enter description">
                            </div>
                            <div class="form-group">
                                <label>Product Price</label>
                                <input type="number" class="form-control" name="price" required placeholder="Enter price">
                            </div>
                            <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" name="file_upload" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_id" class="form-control" required>
                                    <option value="" selected>Select Cateogory</option>
                                    <?php foreach ($categories as $category) {
                                        echo '<option value="' . $category->id . '">' . $category->name . '</option>';
                                    } ?>
                                </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#wrapper -->
<?php include "commons/footer.php"; ?>

</body>

</html>
