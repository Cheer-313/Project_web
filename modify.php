<?php
session_start();
require_once("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form modify</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
//Modify Class
$token = $_GET['token'];
if(isset($_POST['classnameModify']) && isset($_POST['subjectModify']) && isset($_POST['classroomModify']) && isset($_POST['chooseImageModify'])){
    $classnameModify = $_POST['classnameModify'];
    $subjectModify = $_POST['subjectModify'];
    $classroomModify = $_POST['classroomModify'];
    $chooseImageModify = $_POST['chooseImageModify'];

    $result = modify_class($classnameModify, $subjectModify, $classroomModify, $token, $chooseImageModify);
    if(!$result){
        return false;
    }
    unset($_POST);
    header("Location: home.php");
    exit();

}
?>
<!-- Form modify -->
<div class="main main-form-modify-class">
    <form action="" method="POST" class="form" id="form-modify">
        <h3 class="auth-form__heading">MODIFY CLASS</h3>

        <div class="auth-form__form">
            <div class="form-group">
                <label for="classnameModify" class="form-label">Classname</label>
                <input type="text" name="classnameModify" class="form-control" id="classnameModify" placeholder="Enter your classname">
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="subjectModify" class="form-label">Subject</label>
                <input type="text" name="subjectModify" class="form-control" id="subjectModify" placeholder="Subject title">
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="classroomModify" class="form-label">Classroom</label>
                <input type="text" name="classroomModify" class="form-control" id="classroomModify" placeholder="Classroom">
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="chooseImageModify" class="form-label">Images</label>
                <select name="chooseImageModify" id="chooseImageModify" class="form-control">
                    <option value="images/img_violin2.jpg">Image violin</option>
                    <option value="images/img_learnlanguage.jpg">Image learn language</option>
                    <option value="images/img_breakfast.jpg">Image breakfast</option>
                    <option value="images/Honors.jpg">Image honors</option>
                    <option value="images/img_bookclub.jpg">Image bookclub</option>
                    <option value="images/img_code.jpg">Image code</option>
                    <option value="images/img_concert.jpg">Image concert</option>
                    <option value="images/img_read.jpg">Image read</option>
                    <option value="images/LanguageArts.jpg">Image language arts</option>
                </select>
            </div>
        </div>

        <div class="auth-form__controls">
            <button type="button" class="btn-form-add-class btn-back">Back</button>
            <button type="submit" class="btn-form-add-class" name="btn_modify">Modify</button>
        </div>
    </form>
</div>

<script src="main.js"></script>
</body>