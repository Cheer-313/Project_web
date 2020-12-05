<?php
    session_start();
    if(isset($_SESSION['username'])){
        header('Location: home.php');
        exit();
    }
   require_once("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $error = '';
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // echo "$_SESSION['username']";

            $data = login($username, $password);
            if($data){
                $_SESSION['username'] = $username;
                $_SESSION['data'] = $data;
                header('Location: home.php');
                exit();
            }
            else{
                $error = 'Cant login';
            }
        }
    ?>
    <div class="main">
        <form action="" method="POST" class="form" id="form-2">
            <h3 class="heading">SIGN IN</h3>
            <p class="desc">Welcome to google classroom ❤️</p>

            <p class="space"></p>

            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username">
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                <span class="form-message"></span>
            </div>

            <div class="form-group-remember">
                <div class="form-group-remember-left">
                    <input type="checkbox" name="remember" class="form-control" id="remember">
                    <label for="remember" class="form-label">Remember me</label>
                </div>
                <div class="form-group-remember-right">
                    <a href="forgotPass.php" class="forgot-password">Forgot Password?</a>
                </div>
            </div>

            <button class="form-submit">Sign in</button>

            <div class="form-nav-login">Don't have account?
                <a href="signUp.php" class="form-nav-login-link">Sign up here</a>
            </div>
        </form>
    </div>

    <script src="main.js"></script>
</body>
</html>