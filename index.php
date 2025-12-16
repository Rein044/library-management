<?php include "connet.php"; include "login.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Library Management System </title>
    <link rel="stylesheet" type="text/css" href="extend/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="header2 navbar navbar set-radius-zero">
            <a href="index.php">
                <img src="pics/logo.png" class="img" alt="Logo">
            </a>
        </div>
    </div>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="index.php"> HOME </a>
                </li>
                <li>
                    <a href="signup.php"> USER SIGNUP </a>
                </li>
                <li>
                    <a href="admin.php"> ADMIN LOGIN </a>
                </li>
            </ul>
        </nav>
    </header>
    <section>
        <div class="slideshow-container">
            <div class="mySlides slide">
                <img src="pics/1.jpg" style="width:100%">
            </div>
            <div class="mySlides slide">
                <img src="pics/2.jpg" style="width:100%">
            </div>
            <div class="mySlides slide">
                <img src="pics/3.jpg" style="width:100%">
            </div>
            <a class="prev" onclick="plusSlides(-1)"> ❮ </a>
            <a class="next" onclick="plusSlides(1)"> ❯ </a>
        </div>
        <br>
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)">
            </span>
            <span class="dot" onclick="currentSlide(2)">
            </span>
            <span class="dot" onclick="currentSlide(3)">
            </span>
        </div>
        <script>
            let slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
                showSlides((slideIndex += n));
            }

            function currentSlide(n) {
                showSlides((slideIndex = n));
            }

            function showSlides(n) {
                let i;
                let slides = document.getElementsByClassName("mySlides");
                let dots = document.getElementsByClassName("dot");
                if (n > slides.length) {
                    slideIndex = 1;
                }
                if (n < 1) {
                    slideIndex = slides.length;
                }
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
            }
            setInterval(function() {
                plusSlides(1);
            }, 3000);
        </script>
        <div class="login-rectangle">
            <div class="text"> USER LOGIN FORM </div>
        </div>
        <div class="box">
            <img src="pics/c.png" alt="" width="100" height="100" style="margin-left: 140px; margin-top: 20px;">
            <img src="pics/i.png" alt="" width="100" height="100" style="margin-right: 60px; margin-top: 20px;">
            <h1> USER LOGIN FORM </h1>
            <form name="login" action="" method="post">
                <div class="group">
                    <label for="email"> Email: </label>
                    <br>
                    <input class="form-control" type="text" name="email" placeholder="Email" required="">
                </div>
                <div class="group-pass">
                    <label for="pass"> Password: </label>
                    <br>
                    <input class="form-control" type="password" name="pass" id="pass" placeholder="Password" required="">
                    <input type="checkbox" onclick="myFunction()" style="height: 15px; margin-left:-211px; margin-top: 15px;">
                    <h1 style="margin-left: 33px; margin-top: -15px; font-size: 15px;"> Show Password </h1>
                </div>
                <button class="btn" type="submit" name="submit" value="login"> Login </button>
                <p class="tx"> Not registered yet? <a href="signup.php"> Register now </a>
                </p>
            </form>
        </div>
        <script>
            function myFunction() {
                var x = document.getElementById("pass");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
    </section>
    <footer>
        <h1> © My System Online Library Management System </h1>
    </footer>
    </div>
</body>

</html>