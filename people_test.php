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
    <div class="home-app home-app-people">
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
                    <a href="http://localhost:8088/Project_web/detailClass.php?token=<?=$token?>" class="header__list-center-item-link">Stream</a>
                </li>
                <li class="header__list-center-item">
                    <a href="" class="header__list-center-item-link">Classwork</a>
                </li>
                <li class="header__list-center-item">
                    <a href="http://localhost:8088/Project_web/people.php?token=<?=$token?>" class="header__list-center-item-link">People</a>
                </li>
            </ul>

            <ul class="header__list-right">
                <li class="header__list-right-item">
                    <img src="https://img.icons8.com/material/24/000000/circled-menu.png" class="header__list-right-item-img">
                </li>
                <li class="header__list-right-item header__list-right-item-name"><?= $fullname_user ?>
                    <div class="header__list-right-item-logout">
                        <span class="header__list-right-item-name-logout">Log out</span>
                    </div>
                </li>
            </ul>
        </header>
        <?php 
            $result = load_data_user_people($token);
            if(!empty($result)){
                while ($row = $result->fetch_assoc()) {
                    # code...
                    $permisson = $row['permisson'];
                    $people_fullname = $row['hoten'];
         ?>
       <div class="app-container-detail">
            <div class="grid grid-detailClass">
                <div class="grid__row-detail-member">
                    <div class="app-container-body-detail">
                        <div class="body-detail-students-heading">
                            <h2 class="body-detail-member-title">Teachers</h2>
                            <div class="body-detail-student-quantity">
                                <i class="fas fa-user-plus body-detail-student-icon-add"></i>
                            </div>
                        </div>
                        <hr class="body-detail-separator-classmate">
                        <ul class="body-detail-teachers-list">
                            <?php 
                                if ($permisson == 1 || $permisson == 0) {
                                    # code...
                                    echo<<<EOT
                                    <li class="body-detail-teachers-item">
                                        <div class="body-detail-teachers-item-name">$people_fullname</div>
                                        <div class="body-detail-teachers-item-icon"><i class="fas fa-user-minus"></i></div>
                                    </li>
                                    EOT;
                                }
                             ?>    
                        </ul>

                        <div class="body-detail-students-heading">
                            <h2 class="body-detail-member-title">Classmates</h2>
                            <div class="body-detail-student-quantity">
                                <span class="body-detail-student-quantity-title">students</span>
                                <i class="fas fa-user-plus body-detail-student-icon-add"></i>
                            </div>
                        </div>
                        <hr class="body-detail-separator-classmate">
                        <ul class="body-detail-students-list">
                            <?php 
                                if ($permisson == 2) {
                                    # code...
                                    echo<<<EOT
                                    <li class="body-detail-students-item">
                                        <div class="body-detail-students-item-name">$people_fullname</div>
                                        <div class="body-detail-students-item-icon"><i class="fas fa-user-minus"></i></div>
                                    </li>
                                    EOT;
                                }
                            }
                        }
                             ?>  
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal list class -->
    <div class="modal-list-class">
        <div class="modal-list-class-body">
            <a href="" class="modal-list-class-title">
                <i class="fas fa-home" class="modal-list-class-title-icon"></i>
                <h5 class="modal-list-class-title-heading">Classes</h5>
            </a>

            <hr class="body-detail-separator-list">

            <div class="form-group form-group-search">
                <label for="searchClass" class="form-label">Search</label>
                <input type="text" name="searchClass" class="form-control" id="searchClass" placeholder="Search...">
                <span class="form-message"></span>
            </div>

            <h4 class="modal-list-class-name">Enrolled</h4>
            <ul class="modal-list-class-body-list">
                <li class="modal-list-class-body-item">
                    <h4 class="modal-list-class-body-item-class">HK1_2020_503040_Phân tích và thiết kế giải thuật_N02_1</h4>
                    <h5 class="modal-list-class-body-item-name">Trịnh Hùng Cường</h5>
                </li>
                <li class="modal-list-class-body-item">
                    <h4 class="modal-list-class-body-item-class">HK1_2020_503040_Phân tích và thiết kế giải thuật_N02_1</h4>
                    <h5 class="modal-list-class-body-item-name">Trịnh Hùng Cường</h5>
                </li>
            </ul>
            
        </div>
    </div>
    
    <div class="modal__list"> </div>

    <script src="main.js"></script>
</body>
</html>