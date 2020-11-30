<?php
    session_start();
    require_once("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
        $data = $_SESSION['data'];
        $fullname = $data['hoten'];

        if(isset($_POST['classname']) && isset($_POST['subject']) && isset($_POST['classroom']) && isset($_POST['chooseImage'])){

            $classname = $_POST['classname'];
            $subject = $_POST['subject'];
            $classroom = $_POST['classroom'];
            $chooseImage = $_POST['chooseImage'];
            $email = $data['email'];

            $result = add_class($classname, $subject, $classroom, $email, $chooseImage);

            if($result['code'] == 0){
                $msg = $result['error'];
            }
            else{
                $msg = $result['error'];
            }
            header("Location: home.php");
            exit();
        }
     ?>

     <!-- xu li join_class -->
     <?php 
        if(isset($_POST['classcode'])){

            $token = $_POST['classcode'];
            $email = $data['email'];
            $result = join_class($email, $token);
            
            if($result['code'] == 0){
                $msg = $result['msg'];
            }
            else{
                $msg = $result['error'];
            }
        }
      ?>
    <div class="home-app">
        <header class="header-home">
            <ul class="header__list-left">
                <li class="header__list-left-item">
                    <i class="fas fa-bars"></i>
                </li>
                <li class="header__list-left-item">
                    <img src="https://www.gstatic.com/images/branding/googlelogo/svg/googlelogo_clr_74x24px.svg" alt="" class="header__left-item-img">
                </li>
            </ul>

            <ul class="header__list-right">
                <li class="header__list-right-item">
                    <div class="header__plus">
                        <i class="fas fa-plus header__right-item-plus"></i>

                        <ul class="header__plus-list">
                            <li class="header__plus-item header__plus-item-add">Add class</li>
                            <li class="header__plus-item header__plus-item-join">Join class</li>
                        </ul>
                    </div>
                </li>
                <li class="header__list-right-item">
                    <img src="https://img.icons8.com/material/24/000000/circled-menu.png" class="header__list-right-item-img">
                </li>
                <li class="header__list-right-item header__list-right-item-name"><?= $fullname ?></li>
            </ul>
        </header>
        <div class="app-container">
            <div class="grid">
                <div class="grid__row">
                    <!-- Đổ dữ liệu vào từng khung -->
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
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                        <div class="card-item">
                                            <div class="card-item-img"></div>
                                            <div class="card-body">
                                                <a href="" class="card-body-icon">
                                                    <i class="far fa-address-book"></i>
                                                </a>
                                                <a href="" class="card-body-icon">
                                                    <i class="far fa-folder-open"></i>
                                                </a>
                                            </div>

                                            <div class="card-item-label">
                                                <a href="http://localhost:8088/Project_web/detailClass.php?token=$token" class="card-item-label-link">
                                                    <h4 class="card-item-label-course">$classname</h4>
                                                </a>
                                                <span class="card-item-label-name">$fullname</span>
                                            </div>

                                            <div class="card-item-options">
                                                <i class="fas fa-ellipsis-v"></i>

                                                <ul class="card-item-dropdown">
                                                    <li class="card-item-dropdown-item card-item-dropdown-item-modify">Modify</li>
                                                    <li class="card-item-dropdown-item card-item-dropdown-item-remove">Remove</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                EOT;
                            }
                        }
                        if(isset($_POST['btnYes'])){
                            $result = delete_class($token);
                            if(!$result){
                                echo'error';
                            }
                            unset($_POST);
                            header("Location: home.php");
                            exit();
                        }
                     ?>
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

                    <form action="" method="POST" id="form-add">
                        <h3 class="auth-form__heading">ADD CLASS</h3>

                        <div class="auth-form__form">
                            <div class="form-group">
                                <label for="classname" class="form-label">Classname</label>
                                <input type="text" name="classname" class="form-control" id="classname" placeholder="Enter your classname">
                                <span class="form-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject title">
                                <span class="form-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="classroom" class="form-label">Classroom</label>
                                <input type="text" name="classroom" class="form-control" id="classroom" placeholder="Classroom">
                                <span class="form-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="chooseImage" class="form-label">Images</label>
                                <select name="chooseImage" id="chooseImage" class="form-control">
                                    <option value="images/img_violin2.jpg">Image violin</option>
                                    <option value="images/img_learnlanguage.jpg">Image learn language</option>
                                    <option value="images/img_breakfast.jpg">Image breakfast</option>
                                </select>
                            </div>
                        </div>

                        <div class="auth-form__controls">
                            <button type="button" class="btn-form-add-class btn-back">Back</button>
                            <button class="btn-form-add-class">Add</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="auth-form">
                <div class="auth-form__container">

                    <form action="" method="POST" id="form-join">
                        <h3 class="auth-form__heading">JOIN CLASS</h3>

                        <div class="auth-form__form">
                            <div class="form-group">
                                <label for="classcode" class="form-label">Classname</label>
                                <input type="text" name="classcode" class="form-control" id="classcode" placeholder="Class code">
                                <span class="form-message"></span>
                            </div>
                        </div>

                        <div class="auth-form__controls">
                            <button type="button" class="btn-form-add-class btn-back">Back</button>
                            <button class="btn-form-add-class">Join</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="auth-form-dialog">
                <div class="auth-form__container auth-form__container-remove">

                    <form action="" method="POST" id="form-remove">
                        <div class="auth-form-text">
                            <i class="far fa-question-circle"></i>
                            <h4 class="auth-form__text-question">Are you sure you want to delete this class?</h4>
                        </div>

                        <div class="auth-form__controls">
                            <button class="btn-form-remove-class" name="btnYes">Yes</button>
                            <button type="button" class="btn-form-remove-class btn-back">No</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Form modify -->
            <div class="auth-form">
                <div class="auth-form__container">

                    <form action="" method="POST" id="form-modify">
                        <h3 class="auth-form__heading">MODIFY CLASS</h3>

                        <div class="auth-form__form">
                            <div class="form-group">
                                <label for="classname" class="form-label">Classname</label>
                                <input type="text" name="classname" class="form-control" id="classname" placeholder="Enter your classname">
                                <span class="form-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject title">
                                <span class="form-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="classroom" class="form-label">Classroom</label>
                                <input type="text" name="classroom" class="form-control" id="classroom" placeholder="Classroom">
                                <span class="form-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="chooseImage" class="form-label">Images</label>
                                <select name="chooseImage" id="chooseImage" class="form-control">
                                    <option value="images/img_violin2.jpg">Image violin</option>
                                    <option value="images/img_learnlanguage.jpg">Image learn language</option>
                                    <option value="images/img_breakfast.jpg">Image breakfast</option>
                                </select>
                            </div>
                        </div>

                        <div class="auth-form__controls">
                            <button type="button" class="btn-form-add-class btn-back">Back</button>
                            <button class="btn-form-add-class">Modify</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="main.js"></script>
</body>
</html>