<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&family=Urbanist:wght@100;400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0d1d40c7c3.js" crossorigin="anonymous"></script>
    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../instyle.css">


    <style>
        .user-pic {
            width: 80px;
            border-radius: 20%;
            cursor: pointer;
            margin-left: 30px;
        }

        .sub-menu-wrap {
            position: absolute;
            top: 100%;
            right: 10%;
            width: 320px;
            max-height: 0px;
            overflow: hidden;
            transition: max-height 0.5s;
            z-index: 9999;
        }

        .sub-menu-wrap.open-menu {
            max-height: 400px;
        }

        .sub-menu {
            background: white;
            padding: 20px;
            margin: 10px;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-info h3 {
            font-weight: 500;
        }

        .user-info img {
            width: 80px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .sub-menu hr {
            border: 0;
            height: 1px;
            width: 100%;
            background: #ccc;
            margin: 15px 0 10px;
        }

        .sub-menu-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: black;
            margin: 12px 0;
        }

        .sub-menu-link p {
            width: 100%;
        }

        .sub-menu-link img {
            width: 40px;
            background: #e5e5e5;
            border-radius: 50%;
            padding: 8px;
            margin-right: 15px;
        }

        .sub-menu-link span {
            font-size: 22px;
        }

        .sub-menu-link:hover span {
            transform: translateX(5px);
        }

        .sub-menu-link:hover p {
            font-weight: 600;
        }
    </style>
</head>

<body>
    <header class="header">
        <nav class="nav container">
            <div class="nav__data">
                <a href="index.php" class="nav__logo">
                    <i class="ri-code-s-slash-line"></i> PORTAL
                </a>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-line nav__toggle-menu"></i>
                    <i class="ri-close-line nav__toggle-close"></i>
                </div>
            </div>

            <!--=============== NAV MENU ===============-->
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li>
                        <a href="index.php" class="nav__link">Home</a>
                    </li>

                    <!--=============== DROPDOWN 1 ===============-->
                    <li class="dropdown__item">
                        <div class="nav__link dropdown__button">
                            Discover <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>

                        <div class="dropdown__container">
                            <div class="dropdown__content">
                                <div class="dropdown__group">
                                    <div class="dropdown__icon">
                                        <i class="ri-flashlight-line"></i>
                                    </div>
                                    <a href="events.php">
                                        <span class="dropdown__title">Events
                                        </span>
                                    </a>


                                    <ul class="dropdown__list">
                                        <li>
                                            <?php
                                            $id = 1;
                                            echo
                                            '<a class="dropdown__link" href="viewEvent.php?id=' . $id . '"> Technical</a>'
                                            ?>

                                        </li>
                                        <li>
                                            <?php
                                            $id = 2;
                                            echo
                                            '<a class="dropdown__link" href="viewEvent.php?id=' . $id . '"> Gaming</a>'
                                            ?>

                                        </li>
                                        <li>
                                            <?php
                                            $id = 3;
                                            echo
                                            '<a class="dropdown__link" href="viewEvent.php?id=' . $id . '"> On-Stage</a>'
                                            ?>

                                        </li>
                                    </ul>
                                </div>



                                <div class="dropdown__group">
                                    <div class="dropdown__icon">
                                        <i class="ri-book-mark-line"></i>
                                    </div>
                                    <a href="course.php">
                                        <span class="dropdown__title">Courses</span>
                                    </a>


                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">Web development</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Applications development</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">UI/UX design</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Informatic security</a>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                        </div>
                    </li>

                    <!--=============== DROPDOWN 2 ===============-->





                    <li class="dropdown__item">
                        <div class="nav__link dropdown__button">
                            About <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>

                        <div class="dropdown__container">
                            <div class="dropdown__content">
                                <div class="dropdown__group">
                                    <div class="dropdown__icon">
                                        <i class="ri-community-line"></i>
                                    </div>

                                    <span class="dropdown__title">About us</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">About us</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Support</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Contact us</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="dropdown__group">
                                    <div class="dropdown__icon">
                                        <i class="ri-shield-line"></i>
                                    </div>

                                    <span class="dropdown__title">Safety and quality</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">Cookie settings</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Privacy Policy</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php if (isset($_SESSION['username'])) { ?>
                    <li class="dropdown__item">
                        <div class="user-info">
                            <img src="<?php echo isset($_SESSION['image']); ?>" class="user-pic" alt="" onclick="toggleMenu()">

                            <h2><?php echo $_SESSION['username']; ?></h2>
                        </div>
                        <div class="sub-menu-wrap" id="subMenu">
                            <div class="sub-menu">
                                <div class="user-info">
                                    <img src="<?php echo isset($_SESSION['image']); ?>" class="user-pic" alt="" onclick="toggleMenu()">

                                    <h2><?php echo $_SESSION['username']; ?></h2>
                                </div>
                                <hr>
                                <a id=profile href="" class="sub-menu-link">
                                    <img src="../images/profile.png" alt="">
                                    <p>Edit Profile</p>
                                    <hid id=hid><?php echo $_SESSION['username'] ?></hid>
                                    </p>
                                    <span><i class="ri-arrow-right-s-line"></i></span>
                                </a>
                                <script>
                                    document.getElementById("profile").setAttribute("href", "../userprofile.php?usn=" + document.getElementById("hid").innerHTML);
                                </script>
                                <a href="" class="sub-menu-link">
                                    <img src="../images/setting.png" alt="">
                                    <p>Setting</p>
                                    <span><i class="ri-arrow-right-s-line"></i></span>
                                </a>
                                <a href="logout.php" class="sub-menu-link">
                                    <img src="../images/logout.png" alt="">
                                    <p>Logout</p>
                                    <span><i class="ri-arrow-right-s-line"></i></span>
                                </a>
                            </div>
                        </div>
                    </li>
                <?php } else { ?>
                    <li>
                        <a href="../login_form.php" class="nav__link">Login</a>
                    </li>
                <?php } ?>
                </ul>
            </div>
        </nav>
    </header>
    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }
    </script>
    <script src="../main.js"></script>
</body>

</html>