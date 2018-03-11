<?php

require("../../includes/init.php");
require "../../includes/category.php";

if(isset($_POST['category_id'])) {

    $category = Category::find_by_id($_POST['category_id']);

    echo json_encode($category);
}