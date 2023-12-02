<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&family=Urbanist:wght@100;400&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/0d1d40c7c3.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/0d1d40c7c3.js" crossorigin="anonymous"></script>
<!--=============== REMIXICONS ===============-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

<!--=============== CSS ===============-->
<link rel="stylesheet" href="instyle.css">
<style>
    .hero-image {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("images/cs031.jpg");

        /* Set a specific height */
        height: 90%;

        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }

    /* Place text in the middle of the image */
    .hero-text {
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    body {


        place-content: center;
        min-height: 100vh;

        margin: 0;
    }

    main {
        display: grid;
        gap: 3rem;

        padding: 5rem 2rem;
        width: min(95%, 75rem);
        margin-inline: auto;
    }

    .info-box {
        border-radius: 0.5rem;
        box-shadow: 2rem 3rem 2rem -2rem hsla(221, 7%, 45%, 0.492);
        background-color: var(--bg-card);
    }

    .info-box img {
        width: 100%;
        object-fit: cover;
        aspect-ratio: 3/2;
        border-radius: 0.5rem 0.5rem 0 0;
        transition: all 0.5s ease-in-out;
    }

    .image-top img {
        object-position: 50% 40%;
    }

    .image-bottom img {
        object-position: 50% 100%;
    }

    .info-box img:hover {
        border-radius: 0.5rem 0.5rem 0 0;
        border: 1rem solid transparent;
        background: linear-gradient(black, black) padding-box,
            linear-gradient(45deg, #3bccc0, #c86feb) border-box;
    }

    .flow {
        padding: 2rem 3rem;
    }

    h1 {
        font-weight: var(--fw-500);
        font-size: var(--fs-700);
    }

    span {
        font-size: var(--fs-600);
        font-weight: var(--fw-600);
        text-transform: uppercase;
        margin: 0.5rem 0.5rem 0 0;
    }

    .paragraph {
        font-size: var(--fs-550);
        line-height: 1.5;
        margin: 1.5rem 0;
    }


    @media (min-width: 53em) {
        main {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    .nav__menu ul.nav__list li.username {
        margin-right: 10px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;

    }


    #user_symbol {
        margin-right: 5px;

    }

    html {
        scroll-behavior: smooth;
    }

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
<title>HOME</title>
</head>

<body>
    <!--=============== HEADER ===============-->

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
                        <img src="<?php echo isset($_SESSION['image']); ?>" class="user-pic" alt="" onclick="toggleMenu()">


                        <div class="sub-menu-wrap" id="subMenu">
                            <div class="sub-menu">
                                <div class="user-info">
                                    <img src="<?php echo isset($_SESSION['image']); ?>" class="user-pic" alt="" onclick="toggleMenu()">

                                    <h2><?php echo $_SESSION['username']; ?></h2>
                                </div>
                                <hr>
                                <a id=profile href="" class="sub-menu-link">
                                    <img src="images/profile.png" alt="">
                                    <p>Edit Profile</p>
                                    <hid id=hid><?php echo $_SESSION['username'] ?></hid>
                                    </p>
                                    <span><i class="ri-arrow-right-s-line"></i></span>
                                </a>
                                <script>
                                    document.getElementById("profile").setAttribute("href", "userprofile.php?usn=" + document.getElementById("hid").innerHTML);
                                </script>
                                <a href="" class="sub-menu-link">
                                    <img src="images/setting.png" alt="">
                                    <p>Setting</p>
                                    <span><i class="ri-arrow-right-s-line"></i></span>
                                </a>
                                <a href="logout.php" class="sub-menu-link">
                                    <img src="images/logout.png" alt="">
                                    <p>Logout</p>
                                    <span><i class="ri-arrow-right-s-line"></i></span>
                                </a>
                            </div>
                        </div>
                    </li>
                <?php } else { ?>
                    <li>
                        <a href="login_form.php" class="nav__link">Login</a>
                    </li>
                <?php } ?>
            </div>
            </div>
            </li>
            </ul>

            </div>
        </nav>
    </header>
    <hr>
    <hr>
    <hr>


    <div class="hero-image">
        <div class="hero-text">
            <h1><b>EXPLORE THE EVENTS</b></h1>
            <p>....</p>
            <a id="event" href="">
            <button class="btn"><p style="font-size:large; padding-top:10px;">VIEW ALL</p></button>
                <hid id="hid"><?php  $_SESSION['username']  ?></hid>
            </a>
            <script>
                document.getElementById("event").setAttribute("href","events.php?usn=" + document.getElementById("hid").innerHTML);
            </script>
            </div>
    </div>
    <br>
    <br>
    <div class="d-flex justify-content-center">
    <div class="card mb-" style="max-width: 1050px; box-shadow: 0px 16px 18px rgba(0, 0, 0, 0.1);">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="images/eye.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">TECH FEST</h5>
                    <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p class="card-text"><small class="text-body-secondary">Lorem Ipsum is simply dummy text of the printing and typesetting industry</small></p>
                    <a href="eventp.php" class="btn btn-primary" style="border-color: #FFB30E; font-size:large">VISIT</a>
                </div>
            </div>
        </div>
    </div>
</div><!-- events -->
    <main>
        <article class="info-box">
            <div class="image-top">
                <img src="images/technical.png" alt="unsplash">
            </div>
            <div class="flow">
                <h1>Lorem ipsum dolor sit amet consectetur.</h1>
                <div>
                    <span style="color:#6abecd;"><B>TECHNICAL</B></span>
                </div>
                <p class="paragraph">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum totam blanditiis facere rerum excepturi odio, corrupti recusandae aliquam distinctio sed libero amet velit eius. Repudiandae.
                </p>
                <?php $id = 1;
                echo
                '<a class="btn"  href="viewEvent.php?id=' . $id . '" style="font-size:large;"> View Technical Events</a>'
                ?>

            </div>
        </article>

        <article class="info-box">
            <div>
                <img src="images/game.jpeg" alt="default">
            </div>
            <div class="flow">
                <h1>Lorem, ipsum dolor.</h1>
                <div>
                    <span style="color: #cf6390;"><b>GAMING</b></span>
                </div>
                <p class="paragraph">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum pariatur numquam mollitia nisi ducimus dolorum voluptatibus repudiandae explicabo maxime doloribus.
                </p>
                <?php
                $id = 2;
                echo
                '<a class="btn" href="viewEvent.php?id=' . $id . '"style="font-size:large;"> View Gaming Events</a>'
                ?>

            </div>
        </article>

        <article class="info-box">
            <div>
                <img src="images/download.jpeg" alt="default">
            </div>
            <div class="flow">
                <h1>Lorem, ipsum dolor.</h1>
                <div>
                    <span style="color: #6abecd;"><b>ON-STAGE</b></span>

                    <p class="paragraph">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui assumenda tempore, aspernatur quia voluptas recusandae?
                    </p>
                    <?php
                    $id = 3;
                    echo
                    '<a class="btn" href="viewEvent.php?id=' . $id . '"style="font-size:large;"> View On-Stage Events</a>'
                    ?>

                </div>
        </article>

        <article class="info-box">
            <div>
                <img src="images/offstage.JPG" alt="default">
            </div>
            <div class="flow">
                <h1>Lorem, ipsum dolor.</h1>
                <div>
                    <span style="color: #6abecd;"><B>OFF-STAGE</B></span>
                </div>
                <p class="paragraph">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae dolore ratione saepe ea cumque nemo?
                </p>
                <?php
                $id = 4;
                echo
                '<a class="btn" href="viewEvent.php?id=' . $id . '" style="font-size:large;"> View Off-Stage Events</a>'
                ?>

            </div>
        </article>

    </main>
    <a href="events.php" class="btn" style="margin-left:220px ; font-size:large;">VIEW ALL</a>
    <br>
    <br>


    <!--========== FOOTER ==========-->
    <div class="pg-footer">
        <footer class="footer">
            <svg class="footer-wave-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 100" preserveAspectRatio="none">
                <path class="footer-wave-path">
                </path>
            </svg>
            <div class="footer-content">
                <div class="footer-content-column">
                    <div class="footer-logo">
                        <a class="footer-logo-link" href="#">
                            <span class="hidden-link-text">LOGO</span>
                            <h1>LOGO</h1>
                        </a>
                    </div>
                    <div class="footer-menu">
                        <h2 class="footer-menu-name"> Get Started</h2>
                        <ul id="menu-get-started" class="footer-menu-list">
                            <li class="menu-item menu-item-type-post_type menu-item-object-product">
                                <a href="#">Start</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-product">
                                <a href="#">Lorem, ipsum.</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-product">
                                <a href="#">Lorem, ipsum dolor.</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-content-column">
                    <div class="footer-menu">
                        <h2 class="footer-menu-name"> Lorem.</h2>
                        <ul id="menu-company" class="footer-menu-list">
                            <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                <a href="#">Contact</a>
                            </li>
                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category">
                                <a href="#">News</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                <a href="#">Lorem.</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-menu">
                        <h2 class="footer-menu-name"> Legal</h2>
                        <ul id="menu-legal" class="footer-menu-list">
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-privacy-policy menu-item-170434">
                                <a href="#">Privacy Notice</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                <a href="#">Terms of Use</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-content-column">
                    <div class="footer-menu">
                        <h2 class="footer-menu-name"> Quick Links</h2>
                        <ul id="menu-quick-links" class="footer-menu-list">
                            <li class="menu-item menu-item-type-custom menu-item-object-custom">
                                <a target="_blank" rel="noopener noreferrer" href="#">Support Center</a>
                            </li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom">
                                <a target="_blank" rel="noopener noreferrer" href="#">Service Status</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                <a href="#">Security</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                <a href="#">Blog</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type_archive menu-item-object-customer">
                                <a href="#">Customers</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                <a href="#">Reviews</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-content-column">
                    <div class="footer-call-to-action">
                        <h2 class="footer-call-to-action-title"> Let's Chat</h2>
                        <p class="footer-call-to-action-description"> Have a support question?</p>
                        <a class="footer-call-to-action-button button" href="#" target="_self"> <b>Get in Touch</b> </a>
                    </div>
                    <div class="footer-call-to-action">
                        <h2 class="footer-call-to-action-title"> You Call Us</h2>
                        <p class="footer-call-to-action-link-wrapper"> <a class="footer-call-to-action-link" href="tel:0124-64XXXX" target="_self"> 0124-64XXXX </a></p>
                    </div>
                </div>
                <div>
                    <i class="fa-brands fa-twitter fa-2xl" style="color: #2da9d2;" id="icons"></i>
                    <i class="fa-brands fa-instagram fa-2xl" style="color: #e82181;" id="icons"></i>
                    <i class="fa-brands fa-youtube fa-2xl" style="color: #fa0000;" id="icons"></i>

                </div>
            </div>
            <div class="footer-copyright">
                <div class="footer-copyright-wrapper">
                    <p class="footer-copyright-text">
                        <a class="footer-copyright-link" href="#" target="_self"> <b>©2020. | All rights reserved.</b> </a>
                    </p>
                </div>
            </div>
        </footer>
    </div>
    <!--=============== MAIN JS ===============-->
    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }
    </script>
    <script src="main.js"></script>
</body>

</html>