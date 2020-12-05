<?php
    session_start();
    if(isset($_SESSION['username'])){
        header('Location: signIn.php');
        exit();
    }
    require_once("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $error = '';
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['fullname']) && isset($_POST['dateofbirth']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password-confirmation'])) {

            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $phone = $_POST['phone'];
            $dateofbirth = $_POST['dateofbirth'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            $result = signUp($username, $password, $fullname, $dateofbirth, $email, $phone);

            if($result['code'] == 0){
                $error = 'SIGN UP SUCCESSFUL';
                header('Location: signIn.php');
                exit();
            }
            else if($result['code'] == 1){
                $error = 'This email is already exists';
            }
            else if($result['code'] == 3){
                $error = 'This username is already exists';
            }
            else{
                $error = 'An error occured. Please try again later';
            }
        }
     ?>
    <div class="main">
        <form action="signUp.php" method="POST" class="form" id="form-1">
            <h3 class="heading">SIGN UP</h3>
            <p class="desc">Welcome to google classroom ❤️</p>

            <p class="space"></p>

            <div class="form-group-parent">
                <div class="form-group">
                    <label for="fullname" class="form-label">Fullname</label>
                    <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Enter your fullname">
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username">
                    <span class="form-message"></span>
                </div>
            </div>

            <div class="form-group-parent">
                <div class="phone_dateofbirth">
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone number">
                        <span class="form-message"></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="dateofbirth" class="form-label">Date Of Birth</label>
                        <input type="text" name="dateofbirth" class="form-control" id="dateofbirth" placeholder="Ex: 20/11/2000">
                        <span class="form-message"></span>
                    </div>
                </div>
    
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                    <span class="form-message"></span>
                </div>
            </div>

            <div class="form-group-parent">
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Ex: abc@gmail.com">
                    <span class="form-message"></span>
                </div>
    
                <div class="form-group">
                    <label for="password-confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password-confirmation" class="form-control" id="password-confirmation" placeholder="Enter your password again">
                    <span class="form-message"></span>
                </div>
            </div>

            <button class="form-submit" name = "signup_btn">Sign up</button>
        </form>
    </div>

    <script src="main.js"></script>
</body>
</html>