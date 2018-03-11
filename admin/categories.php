<?php

require("../includes/init.php");
require "../includes/category.php";

$categories = Category::find_all();

if(isset($_POST['edit'])) {
    $id = trim($_POST['id']);
    $name = trim($_POST['name']);

    $category = new Category();
    $category->id = $id;
    $category->name = $name;

    if($category->save()) {
        redirect("categories.php");
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<?php include "commons/header.php"; ?>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "commons/nav-side.php"; ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        All categories
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($categories as $category) { ?>
                                    <tr>
                                        <td><?= $category->id; ?></td>
                                        <td><?= $category->name; ?></td>
                                        <td>
                                            <span class="btn-group" style="margin-top: 5px">
									            <button class="btn btn-warning btn-xs" data-toggle="modal"
                                                        data-target="#item_edit" data-id="<?= $category->id; ?>">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </button>
                                                <button class="btn btn-danger btn-xs" ; data-toggle="modal"
                                                        data-target="#item_remove">
                                                    <i class="glyphicon glyphicon-remove"></i>
                                                </button>
                                            </span>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="modal fade item_edit" id="item_edit">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a href="#" data-dismiss="modal" class="class pull-right">
                                <span class="glyphicon glyphicon-remove"></span></a>
                            <h3 class="modal-title">Edit Category </h3>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="post" action="">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input class="form-control" id="name" name="name" placeholder="Enter name">
                                </div>
                                <input type="hidden" id="id" name="id">
                                <button type="submit" name="edit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "commons/footer.php"; ?>
<script src="js/custom.js"></script>

</body>

</html>
