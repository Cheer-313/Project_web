<?php 
    require_once("db.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $email ='';
        $msg = 'Enter your email address';

        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $result = reset_password($email);
            
            if($result['code'] == 0){
                $msg = 'If your email exists in the database, you will receive an email containing the reset password instructions.';
            }
            else{
                $msg = $result['error'];
            }
            
        }
     ?>
    <div class="main-forgot">
        <form action="" method="POST" class="form" id="form-3">
            <h3 class="heading">RESET PASSWORD</h3>

            <p class="space"></p>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Email address">
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <p class="form-mess">
                    <?= $msg ?>
                </p>
            </div>

            <button class="form-submit">Reset password</button>
        </form>
    </div>

    <script src="main.js"></script>
</body>
</html>