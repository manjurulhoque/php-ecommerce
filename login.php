<?php
include "includes/init.php";

if ($session->is_signed_in()) {
    redirect("index.php");
}

if (isset($_POST['submit'])) {

    $username = trim( $_POST['username'] );
    $password = trim( $_POST['password'] );

    $user = User::verify_user($username, $password);

    if ($user) {
        $session->login($user);
        redirect("index.php");
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

                    <h2>Login here</h2>
                    <form method="post" action="">
                        <input type="text" class="form-control" name="username" placeholder="username" id="username"
                               required/>
                        <input type="password" class="form-control" name="password" placeholder="password" id="password"
                               required/>
                        <button type="submit" name="submit" class="btn btn-default">Login!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include "commons/footer.php"; ?>
