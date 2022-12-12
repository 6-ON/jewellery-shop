<?php

use app\core\Application;

?>
<!doctype html>
<html lang="en">

<head>
    <title>Contact Us</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Poppins:400,600,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <style>
        .container form input {
            height: 50px;
        }

        .container form textarea {
            min-height: 300px;
            resize: none;
        }

        .form-container {
            background: rgba(251, 181, 52, 0.2);
            backdrop-filter: blur(13px);
            border-radius: 20px;
        }

        .about-container {
            background-color: white;
            border-radius: 20px;
            box-shadow: 0px 4px 25px rgba(0, 0, 0, 0.25);
            gap: 50px;
        }

        .price_container .box {
            scale: 0.8;
        }

        @media (max-width:768px) {
            .price_container .box {
                scale: 0.95;
            }
        }
    </style>
</head>

<body>
    <div class="hero_img overflow-hidden">
        <img src="images/hero-bg.png" class="main-bg">
        <img src="images/design-1.png" alt="">
    </div>
    <!-- header section strats -->
    <header class="header_section mb-4">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="index.html">
                    <img src="images/logo.svg" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                        <ul class="navbar-nav  ">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/gallery"> Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/about"> About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/contact"> Contact Us</a>
                            </li>
                            <?php if (Application::isGuest()) { ?>

                                <li class="nav-item ">
                                    <a class="nav-link" href="/login">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/register">Register</a>
                                </li>

                            <?php } else { ?>

                                <li class="nav-item">
                                    <a class="nav-link" href="/dashboard"><?= Application::$app->user->getDisplayName()  ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/logout">Logout</a>
                                </li>

                            <?php } ?>
                        </ul>

                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- header section strats -->

    {{content}}

    <!-- info section -->
    <section class="info_section ">
        <div class="container-fluid">
            <div class="info_container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="info_logo">
                            <a href="">
                                <img src="images/logo.svg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info_contact">
                            <a href="">
                                <img src="images/location.png" alt="">
                                <span>
                                    Address
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info_contact">
                            <a href="">
                                <img src="images/phone.png" alt="">
                                <span>
                                    +01 1234567890
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info_contact">
                            <a href="">
                                <img src="images/mail.png" alt="">
                                <span>
                                    demo@gmail.com
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="info_form">
                    <div class="d-flex justify-content-center">
                        <h5 class="info_heading">
                            Newsletter
                        </h5>
                    </div>
                    <form action="">
                        <div class="email_box">
                            <label for="email2">Enter Your Email</label>
                            <input type="text" id="email2">
                        </div>
                        <div>
                            <button>
                                subscribe
                            </button>
                        </div>
                    </form>
                </div>
                <div class="info_social">
                    <div class="d-flex justify-content-center">
                        <h5 class="info_heading">
                            Follow Us
                        </h5>
                    </div>
                    <div class="social_box">
                        <a href="">
                            <img src="images/fb.png" alt="">
                        </a>
                        <a href="">
                            <img src="images/twitter.png" alt="">
                        </a>
                        <a href="">
                            <img src="images/linkedin.png" alt="">
                        </a>
                        <a href="">
                            <img src="images/insta.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end info_section -->
    <!-- footer section -->
    <section class="container-fluid footer_section">
        <p>
            &copy; <span id="displayYear"></span> All Rights Reserved
        </p>
    </section>
    <!-- footer section -->

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>