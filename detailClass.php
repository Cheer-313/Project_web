<?php
    session_start();
    require_once("db.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Class</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <?php 
        $data = $_SESSION['data'];
        $fullname_user = $data['hoten'];
        $token = '';
        $fullname= '';
        $classname = '';

        if(isset($_GET['token'])){
            $token = $_GET['token'];
            $result = get_detail_class($token);
            $classname = $result['classname'];
            $fullname = get_fullname($result['email']);
        }
     ?>
    <div class="home-app">
        <header class="header-home">
            <ul class="header__list-left">
                <li class="header__list-left-item">
                    <i class="fas fa-bars"></i>
                </li>
                <li class="header__list-left-item header__list-left-item-inf">
                    <h4 class="header__list-left-class"><?= $classname ?></h4>
                    <h5 class="header__list-left-teacher-name"><?= $fullname ?></h5>
                </li>
            </ul>

            <ul class="header__list-center">
                    <li class="header__list-center-item">
                        <a href="http://localhost:8088/Project_web/detailClass.php?token=$token" class="header__list-center-item-link">Stream</a>
                    </li>
                    <li class="header__list-center-item">
                        <a href="" class="header__list-center-item-link">Classwork</a>
                    </li>
                    <li class="header__list-center-item">
                        <a href="http://localhost:8088/Project_web/people.php?token=$token" class="header__list-center-item-link">People</a>
                    </li>
                </ul>

            <ul class="header__list-right">
                <li class="header__list-right-item">
                    <img src="https://img.icons8.com/material/24/000000/circled-menu.png" class="header__list-right-item-img">
                </li>
                <li class="header__list-right-item header__list-right-item-name"><?= $fullname_user ?></li>
            </ul>
        </header>

        <div class="app-container-detail">
            <div class="grid">
                <div class="grid__row-detail">
                    <div class="app-container-body-detail">
                        <img src="images/img_learnlanguage.jpg" alt="" class="body-detail-img"></img>

                        <div class="body-detail-title">
                            <h2 class="body-detail-title-heading"><?= $classname ?></h2>
                            <h4 class="body-detail-title-desc"><?= $fullname ?></h4>
                            <h4 class="body-detail-title-desc">Classcode: <?= $token ?></h4>
                        </div>
                    </div>

                    <div class="grid__row-detail-body">
                        <div class="grid__left">
                            <div class="grid__left-notify">
                                <h4 class="grid__left-notify-heading">Upcoming</h4>
                                <div class="grid__left-notify-message">Woohoo, no work due soon!</div>
                                <div class="grid__left-notify-view">
                                    <a href="" class="grid__left-notify-link">View all</a>
                                </div>
                            </div>
                        </div>

                        <div class="grid__right">
                            <div class="grid__right-item">
                                <h4 class="grid__right-item-heading">Trịnh Hùng Cường posted a new assignment: Nộp lab 10</h4>
                                <h5 class="grid__right-item-time">Nov 7</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>