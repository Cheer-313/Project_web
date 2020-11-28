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
        }
     ?>
     <?php 
        if(isset($_POST['classcode'])){

            $token = $_POST['classcode'];
            $result = join_class($token);
            
            if($result['code'] == 0){
                $msg = $result['error'];
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
                                <a href="" class="card-item-label-link">
                                    <h4 class="card-item-label-course">HK1_2020_503040_Phân tích và thiết kế giải thuật_N02_1</h4>
                                </a>
                                <span class="card-item-label-name">Trịnh Hùng Cường</span>
                            </div>

                            <div class="card-item-options">
                                <i class="fas fa-ellipsis-v"></i>
                            </div>
                        </div>
                    </div>
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
                                <a href="" class="card-item-label-link">
                                    <h4 class="card-item-label-course">HK1_2020_503040_Phân tích và thiết kế giải thuật_N02_1</h4>
                                </a>
                                <span class="card-item-label-name">Trịnh Hùng Cường</span>
                            </div>

                            <div class="card-item-options">
                                <i class="fas fa-ellipsis-v"></i>
                            </div>
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
        </div>
    </div>

    <script src="main.js"></script>
</body>
</html>