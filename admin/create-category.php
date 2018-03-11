<?php

require("../includes/init.php");
require "../includes/category.php";

if(isset($_POST['submit'])) {
    $name = trim($_POST['name']);

    $category = new Category();
    $category->name = $name;

    if($category->save()) {
        redirect("index.php");
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
                        Create Category
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input class="form-control" name="name" placeholder="Enter name">
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
