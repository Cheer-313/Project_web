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
                        <a href="http://localhost:8088/Project_web/detailClass.php?token= <?=$token?>" class="header__list-center-item-link">Stream</a>
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
                <li class="header__list-right-item header__list-right-item-name"><?= $fullname_user ?></li>
            </ul>
        </header>

        <div class="app-container-detail">
            <div class="grid grid-detailClass">
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
                            <!-- Btn create assignment -->
                            <div class="grid__left-btn-create-assignment">
                                <button class="btn-create-assignment">Create Assignment</button>
                            </div>
                        </div>

                        <div class="grid__right">
                            <div class="grid__right-item grid__right-form-notify">
                                <form action="" method="POST" id="form-notify">
                                    <div class="form-group">
                                        <label for="titleNodify" class="form-label">Title</label>
                                        <input type="text" name="titleNodify" class="form-control" id="titleNodify" placeholder="Enter title">
                                        <span class="form-message"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="content" class="form-label">Content</label>
                                        <textarea name="content" id="content" cols="150" rows="5"></textarea>
                                    </div>

                                    <div class="custom-file">
                                        <label class="form-label" for="customFile">Choose file</label>
                                        <input type="file" class="custom-file-input" id="customFile" name="filename">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="chooseState" class="form-label">State</label>
                                        <select name="cchooseState" id="chooseState" class="form-control">
                                            <option value="">News</option>
                                            <option value="">Document</option>
                                            <option value="">Image</option>
                                        </select>
                                    </div>

                                    <div class="form-button-post">
                                        <button class="btn-form-notify-class">Post</button>
                                    </div>
                                </form>
                            </div>

                            <div class="grid__right-item">
                                <h4 class="grid__right-item-heading">
                                    <div class="grid__right-item-heading-name">Mai Văn Mạnh (author)
                                        <span class="time-post-news">Jan 3</span>
                                    </div>
                                    <div class="grid__right-item-heading-options">
                                        <div class="grid__right-item-heading-options-icon">
                                            <i class="fas fa-ellipsis-v"></i>

                                            <ul class="grid__right-item-heading-dropdown">
                                                <li class="grid__right-dropdown-item grid__right-item-heading-dropdown-modify">Modify</li>
                                                <li class="grid__right-dropdown-item grid__right-item-heading-dropdown-delete">Delete</li>
                                            </ul>
                                        </div>  
                                    </div>
                                </h4>
                                <h5 class="grid__right-item-time grid__right-item-content">
                                    Thầy kiểm tra kết quả submit bài kiểm tra thì thấy có tới 65/71 sinh viên nộp bài. Chỉ có 6 trường hợp chưa nộp, trong số này cũng có thể có một vài trường hợp không đi học từ đầu học kỳ hoặc đã vắng quá số buổi học. Vì vậy kết quả kiểm tra này vẫn sẽ được sử dụng để tính điểm quá trình, kết hợp với cả yếu tố điểm danh hàng tuần.
                                </h5>
                                <div class="grid__right-item-file">
                                    <div class="grid__right-item-file-icon">
                                        <i class="fas fa-file"></i>
                                    </div>
                                    <div class="grid__right-item-file-name">text.txt</div>
                                </div>
                                <br>

                                <div class="people-comment">
                                    <h4 class="grid__right-item-heading">
                                        <div class="grid__right-item-heading-name">Quỳnh Như
                                            <span class="time-post-comment">(Jan 4)</span>
                                        </div>
                                        <div class="grid__right-item-heading-options">
                                            <div class="grid__right-item-heading-options-icon">
                                                <i class="fas fa-ellipsis-v"></i>
    
                                                <ul class="grid__right-item-heading-dropdown">
                                                    <!-- <li class="grid__right-dropdown-item grid__right-item-heading-dropdown-modify">Modify</li> -->
                                                    <li class="grid__right-dropdown-item grid__right-item-heading-dropdown-delete">Delete</li>
                                                </ul>
                                            </div>  
                                        </div>
                                    </h4>
                                    <h5 class="grid__right-item-time grid__right-item-content">
                                        Dạ, ok thầy.
                                    </h5>
                                </div>

                                <hr class="separate-input-comment">
                                <div class="form-group form-group-comment">
                                    <label for="comment" class="form-label form-label-comment">Me:</label>
                                    <input type="text" name="comment" class="form-control" id="comment" placeholder="Add class comment...">
                                    <div class="form-group-comment-icon">
                                        <i class="far fa-paper-plane"></i>
                                    </div>
                                </div>
                            </div>

                            <a href="">
                                <div class="grid__right-item">
                                    <h4 class="grid__right-item-heading">Trịnh Hùng Cường posted a new assignment: Nộp lab 10</h4>
                                    <h5 class="grid__right-item-time">Nov 7</h5>
                                </div>
                            </a>

                            <a href="">
                                <div class="grid__right-item">
                                    <h4 class="grid__right-item-heading">Trịnh Hùng Cường posted a new assignment: Nộp lab 9</h4>
                                    <h5 class="grid__right-item-time">Nov 1</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal layout-->
    <div class="modal__plus">
        <div class="modal__overlay"></div>

        <div class="modal__body">
            <div class="auth-form">
                <div class="auth-form__container">

                    <form action="" method="POST" id="form-assignment">
                        <h3 class="create-assignment-heading">CREATE ASSIGNMENT</h3>

                        <div class="form-group">
                            <label for="titleAssignment" class="form-label">Title</label>
                            <input type="text" name="titleAssignment" class="form-control" id="titleAssignment" placeholder="Enter title">
                            <span class="form-message"></span>
                        </div>

                        <div class="form-group">
                            <label for="content-assignment" class="form-label">Content</label>
                            <textarea name="content-assignment" id="content-assignment" cols="150" rows="5"></textarea>
                        </div>

                        <div class="custom-file">
                            <label class="form-label" for="customFileAssignment">Choose file</label>
                            <input type="file" class="custom-file-input" id="customFileAssignment" name="filenameAssignment">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="dueAssignment" class="form-label">Due</label>
                            <input type="datetime-local" name="dueAssignment" class="form-control" id="dueAssignment">
                            <span class="form-message"></span>
                        </div>

                        <div class="auth-form__controls">
                            <button type="button" class="btn-form-add-class btn-back-assignment">Back</button>
                            <button class="btn-form-add-class">Create</button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>

    <!-- Modal list class -->
    <div class="modal-list-class">
        <div class="modal-list-class-body">
            <div class="modal-list-class-title">
                <i class="fas fa-home" class="modal-list-class-title-icon"></i>
                <h5 class="modal-list-class-title-heading">Classes</h5>
            </div>

            <hr class="body-detail-separator-list">

            <div class="form-group form-group-search">
                <label for="searchClass" class="form-label">Search</label>
                <input type="text" name="searchClass" class="form-control" id="searchClass" placeholder="Search...">
                <span class="form-message"></span>
            </div>

            <h4 class="modal-list-class-name">Enrolled</h4>
            <ul class="modal-list-class-body-list">
                <?php
                $email = $data['email'];
                $result = load_data_home($email,get_permission($email));
                if(!empty($result)){
                    while ($row = $result->fetch_assoc()) {
                        # code...
                        $classname = $row['classname'];
                        $email = $row['email'];
                        $token = $row['token'];
                        $fullname = get_fullname($email);
                        echo <<<EOT

                                            <li class="modal-list-class-body-item">
                                                <h4 class="modal-list-class-body-item-class">$classname</h4>
                                                <h5 class="modal-list-class-body-item-name">$fullname</h5>
                                            </li>
                                         
                                        
                            EOT;
                    }
                }
                ?>

            </ul>

        </div>
    </div>
    <div class="modal__list"> </div>

    <script src="main.js"></script>
</body>
</html>