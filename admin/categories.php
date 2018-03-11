<?php

require("../includes/init.php");
require "../includes/category.php";

$categories = Category::find_all();

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
                                        <td>@mdo</td>
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
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "commons/footer.php"; ?>

</body>

</html>
