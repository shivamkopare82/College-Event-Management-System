<?php
require 'conn.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM events,event_info ef,student_coordinator s,staff_coordinator st WHERE type_id = $id and ef.event_id=events.event_id and s.event_id=events.event_id and st.event_id=events.event_id  ");
?>


<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Document</title>
    <title></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&family=Urbanist:wght@100;400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0d1d40c7c3.js" crossorigin="anonymous"></script>
    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="instyle.css">
       <link rel="stylesheet" href="css/style4.css"> 
    <!-- <link rel="stylesheet" href="css/bootstrap.css">   -->
      <link rel="stylesheet" href="css/event.css">  
   
    
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

                                    <span class="dropdown__title">Events
                                    </span>

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

                                    <span class="dropdown__title">Courses</span>

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
                    <li class="username">
                        <span class="nav__link" style="margin-bottom:8px; font-size: x-large;"><i class="fa-duotone fa-user fa-xl"></i></span>
                        <span class="nav__link" style="margin-bottom:8px; font-size: x-large;"><?php echo $_SESSION['username']; ?></span>

                    </li>
                    <li>
                        <a href="logout.php" class="nav__link">Logout</a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a href="login_form.php" class="nav__link">Login</a>
                    </li>
                <?php } ?>

                </ul>
            </div>
        </nav>
    </header>
    <script src="../main.js"></script>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <br>
    <div class="content"><!--body content holder-->
        <div class="container">
            <div class="col-md-12"><!--body content title holder with 12 grid columns-->


            </div>


            <?php
            if (mysqli_num_rows($result) > 0) {

                $i = 0;
                while ($row = mysqli_fetch_array($result)) {

                    include 'event.php';

                    $i++;
                }
            ?>
                <div class="container">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>
            <?php } ?>
            <a class="btn " href="index.php" style="margin-top: 20px; margin-left: 10px"> Back</a>




        </div><!--body content div-->


        <?php require 'utils/footer.php'; ?><!--footer content. file found in utils folder-->
</body>

</html>