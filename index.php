<?php
include "commons/header.php";

$products = Product::find_all();

$categories = Category::find_all();

?>

<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="left-sidebar">
                <h2>Category</h2>
                <div class="list-group">
                    <?php foreach ($categories as $category) {
                        echo '<a href="category.php?filter=' . $category->name . '" class="list-group-item">' . $category->name . '</a>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="col-sm-9 padding-right">

            <div class="features_items">
                <div>

                    <section class="slider">
                        <div class="flexslider">
                            <img src="admin/images/front.jpg" alt=""/>
                        </div>
                    </section>
                    <div class="clearfix"></div>

                </div>

                <h2 class="title text-center">Latest Products</h2>

                <?php

                if ($products) {
                    foreach ($products as $product) {

                        echo '<ul class="col-sm-4">';
                        echo '<div class="product-image-wrapper">
					<div class="single-products">
					<div class="productinfo text-center">
					<a href="product-details.php?prodid=' . $product->id . '" rel="bookmark" title="' . $product->name . '">
					    <img src="admin/' . $product->image_path() . '" alt="' . $product->name . '" title="' . $product->name . '" width="150" height="150" />
					</a>
					
					<h2>
					    <a href="product-details.php?prodid=' . $product->id . '" rel="bookmark" title="' . $product->name . '">' . $product->name . '</a>
					</h2>
                    <h2>$' . $product->price . '</h2>
                    <p>Category: ' . $product->category_id . '</p>
					
					<a href="product-details.php?prodid=' . $product->id . '" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Details</a>
					</div>';
                        echo '</ul>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
include "commons/footer.php";
?>
