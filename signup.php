<?php
include "includes/init.php";

if ($session->is_signed_in()) {
    redirect("index.php");
}

if (isset($_POST['submit'])) {

    $user = new User();
    $user->first_name = trim($_POST['first_name']);
    $user->last_name = trim($_POST['last_name']);
    $user->username = trim($_POST['username']);
    $user->password = trim($_POST['password']);

    if ($user->save_user()) {
        redirect("login.php");
    }
}

?>

<?php include "commons/header.php"; ?>

<section id="form">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-sm-offset-2">
                <div class="login-form">

                    <div class="error"></div>

                    <h2>Signup here</h2>
                    <form method="post" action="">
                        <input type="text" class="form-control" name="first_name" placeholder="first name"
                               id="first_name" required/>
                        <input type="text" class="form-control" name="last_name" placeholder="last name"
                               id="second_name" required/>
                        <input type="text" class="form-control" name="username" placeholder="username" id="username"
                               required/>
                        <input type="password" class="form-control" name="password" placeholder="password" id="password"
                               required/>
                        <button type="submit" name="submit" class="btn btn-default" id="signup">Register!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
include "commons/footer.php";
?>
