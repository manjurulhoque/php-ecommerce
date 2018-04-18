<?php include "includes/init.php"; ?>
<?php
$categories = Category::find_all();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>PHP e-shop</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/flexslider.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="../js/html5shiv.js"></script>
    <script src="../js/respond.min.js"></script>
    <![endif]-->

</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> 14536356</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> email@email.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="logo pull-left">
                        <a href="index.php">
                            <img src="images/home/logo.PNG" alt="" class="img-responsive"/>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 search_box pull-right">
                    <form action="index.php" method="post">
                        <input type="text" placeholder="Search" name="filter"/>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom navbar navbar-inverse">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header navbar-default">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index.php">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <?php foreach ($categories as $category) {
                                        echo '<li><a href="">' . $category->name . '</a></li>';
                                    } ?>
                                </ul>
                            </li>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="cart.php">Cart <span class="badge"></span></a></li>
                            <li><a href="blog.php">Blog</a></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <?php if (!$session->is_signed_in()): ?>
                                <li><a href="signup.php">Sign Up</a></li>
                                <li><a href="login.php">Login</a></li>
                            <?php else: ?>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <?php $user = $session->get_user();
                                        echo $user->username;
                                        ?>
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="logout.php">Logout</a></li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
    