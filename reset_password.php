<?php 
    require_once("db.php");
?>
<DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

    $error = '';
    $email = '';
    $pass = '';
    $pass_confirm = '';

    $display_email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);

    if(isset($_GET['email']) && isset($_GET['token'])){
        $email = $_GET['email'];
        $token = $_GET['token'];

        if(filter_var($email,FILTER_SANITIZE_EMAIL) === false){
            $error = 'This isnt a valid email';
        }
        else if(strlen($token) != 32){
            $error = 'This isnt a valid token';
        }
        else{

            if (isset($_POST['pass']) && isset($_POST['pass-confirm'])) {

                $pass = $_POST['pass'];
                $pass_confirm = $_POST['pass-confirm'];

                if (empty($pass)) {
                    $error = 'Please enter your password';
                }
                else if (strlen($pass) < 6) {
                    $error = 'Password must have at least 6 characters';
                }
                else if ($pass != $pass_confirm) {
                    $error = 'Password does not match';
                }
                else {
                    $result = update_new_password($email,$pass);
                    if($result['code'] == 0){
                        header('Location: signIn.php');
                        exit();
                    }
                }
            }
            else {
                $error = 'Enter your new password.';
            }
        }
    }
    else{
        $error = 'Invalid email or token!!!';
    }
?>
<div class="main-forgot">
    <form novalidate method="post" action="" class="form" id="form-reset">
        <h3 class="heading">RESET PASSWORD</h3>
        <br>
        <br>

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input readonly value="<?= $display_email ?>" name="email" id="email" type="text" class="form-control" placeholder="Email address">
        </div>
        <div class="form-group">
            <label for="pass" class="form-label">Password</label>
            <input  value="<?= $pass?>" name="pass" required class="form-control" type="password" placeholder="Password" id="pass">
            <div class="invalid-feedback">Password is not valid.</div>
        </div>
        <div class="form-group">
            <label for="pass2" class="form-label">Confirm Password</label>
            <input value="<?= $pass_confirm?>" name="pass-confirm" required class="form-control" type="password" placeholder="Confirm Password" id="pass2">
            <div class="invalid-feedback">Password is not valid.</div>
        </div>
        <div class="form-group">
            <?php
                if (!empty($error)) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            ?>
            <button class="btn btn-success px-5 form-submit">Change password</button>
        </div>
    </form>
</div>

</body>
</html>
