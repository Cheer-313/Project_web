<?php
    session_start();
    require_once("db.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>People</title>
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
                <div class="grid__row-detail-member">
                    <div class="app-container-body-detail">
                        <h2 class="body-detail-member-title">Teachers</h2>
                        <hr class="body-detail-separator">
                        <ul class="body-detail-teachers-list">
                            <li class="body-detail-teachers-item">Mai Văn Mạnh</li>
                            <li class="body-detail-teachers-item">Khoa công nghệ thông tin</li>
                        </ul>

                        <div class="body-detail-students-heading">
                            <h2 class="body-detail-member-title">Classmates</h2>
                            <div class="body-detail-student-quantity">
                                4 <span>students</span>
                            </div>
                        </div>
                        <hr class="body-detail-separator-classmate">
                        <ul class="body-detail-students-list">
                            <li class="body-detail-students-item">Trương Minh Hưng</li>
                            <li class="body-detail-students-item">Nguyễn Hoàng Hưng</li>
                            <li class="body-detail-students-item">Nguyễn Trần Quỳnh Như</li>
                            <li class="body-detail-students-item">Phạm Hồng Hải Đăng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>