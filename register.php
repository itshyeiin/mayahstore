<?php
include '../mayahstore/db.php';
require '../mayahstore/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start(); // Start the session to store OTP and email.

$errorEmail = '';
$errorMobile = '';
$error = ''; // General error message initialization.
$successMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    $stmtEmail = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $stmtEmail->bind_param("s", $email);
    $stmtEmail->execute();
    $stmtEmail->store_result();
    
    if ($stmtEmail->num_rows > 0) {
        $errorEmail = "This email is already registered. Please use a different email.";
    }

    $stmtMobile = $conn->prepare("SELECT mobile FROM users WHERE mobile = ?");
    $stmtMobile->bind_param("s", $mobile);
    $stmtMobile->execute();
    $stmtMobile->store_result();

    if ($stmtMobile->num_rows > 0) {
        $errorMobile = "This mobile number is already used. Please use a different mobile number.";
    }

    if (empty($errorEmail) && empty($errorMobile)) {
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
        $otp = rand(100000, 999999);  // Generate a 6-digit OTP

        $insertStmt = $conn->prepare("INSERT INTO users (name, email, mobile, address, password) VALUES (?, ?, ?, ?, ?)");
        $insertStmt->bind_param("sssss", $name, $email, $mobile, $address, $passwordHashed);
        if ($insertStmt->execute()) {
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'anthonyjr.lapada@gmail.com';  // Your Gmail address
                $mail->Password = 'gcjewzojhnxdkheo';  // Your Gmail password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('anthonyjr.lapada@gmail.com', 'Mayah Store');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Verify your email';
                $mail->Body    = 'Your OTP for registration is: ' . $otp;

                $mail->send();
                $successMessage = 'OTP has been sent to your email. Please verify to continue.';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            $insertStmt->close();

            $_SESSION['otp'] = $otp;
            $_SESSION['email'] = $email;  // Store email to check against during OTP verification

            header('Location: otp.php');
            exit;
        } else {
            $error = "Error inserting user data.";
        }
    }

    $stmtEmail->close();
    $stmtMobile->close();
    $conn->close();
}
?>

<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--=============== FAVICON ===============-->
      <link rel="shortcut icon" href="assets/img/MAYAH-STORE-LOGO.jpg" type="image/x-icon">

      <!--=============== REMIXICONS ===============-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">

      <!--=============== BOXICONS ===============-->
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="assets/css/register.css">

      <title>Mayah Store Official</title>
   </head>
   <body>
      <!--==================== HEADER ====================-->
      <header class="header" id="header">
         <nav class="nav container">
            <a href="#" class="nav__logo">
                <img src="assets/img/MAYAH-STORE-LOGO.jpg" alt="" class="nav__logo-img">
                Mayah Store
            </a>

            <div class="nav__menu" id="nav-menu">
               <ul class="nav__list">
                  <li class="nav__item">
                     <a href="#" class="nav__link active-link">Home</a>
                  </li>

                  <li class="nav__item">
                     <a href="#" class="nav__link">About Us</a>
                  </li>

                  <li class="nav__item">
                     <a href="#" class="nav__link">Products</a>
                  </li>

                  <li class="nav__item">
                     <a href="#" class="nav__link"></a>
                  </li>
               </ul>

               <!-- Close button -->
               <div class="nav__close" id="nav-close">
                  <i class="ri-close-line"></i>
               </div>
            </div>

            <div class="nav__actions">
               <!-- Search button -->
               <i class="ri-search-line nav__search" id="search-btn"></i>

               <!-- Login/Register button -->
               <i class="ri-user-line nav__login" id="login-btn"></i>

               <!-- Toggle button -->
               <div class="nav__toggle" id="nav-toggle">
                  <i class="ri-menu-line"></i>
               </div>
            </div>
         </nav>
      </header>

      <!--==================== SEARCH ====================-->
      <div class="search" id="search">
         <form action="" class="search__form">
            <i class="ri-search-line search__icon"></i>
            <input type="search" placeholder="What are you looking for?" class="search__input">
         </form>

         <i class="ri-close-line search__close" id="search-close"></i>
      </div>

      <!--==================== LOGIN/REGISTER ====================-->
<div class="login show-login" id="login">
    <form action="register.php" method="POST" class="login__form">
        <h2 class="login__title">Register</h2>
        <!-- Display success message if registration was successful -->
        <?php if (!empty($successMessage)) { ?>
            <p style="color: blue;"><?= htmlspecialchars($successMessage) ?></p>
        <?php } ?>        

        <!-- Display error message if there is one -->
        <?php if (!empty($error)) { ?>
            <p style="color: red;"><?= htmlspecialchars($error) ?></p>
        <?php } ?>

        <?php if (!empty($errorMobile)) { ?>
            <p style="color: red;"><?= htmlspecialchars($errorMobile) ?></p>
        <?php } ?>
        
        <div class="login__group">
           <div>
              <label for="name" class="login__label">Name</label>
              <input type="text" placeholder="Write your Name" id="name" name="name" class="login__input" required>
           </div>

           <div>
              <label for="email" class="login__label">Email</label>
              <input type="email" placeholder="Write your email" id="email" name="email" class="login__input" required>
           </div>

           <div>
              <label for="mobile" class="login__label">Mobile Number</label>
              <input type="tel" placeholder="Write your Mobile Number" id="mobile" name="mobile" class="login__input" required>
           </div>

           <div>
              <label for="address" class="login__label">Address</label>
              <input type="text" placeholder="Write your Address" id="address" name="address" class="login__input" required>
           </div>
           
           <div>
              <label for="password" class="login__label">Password</label>
              <input type="password" placeholder="Enter your password" id="password" name="password" class="login__input" required>
           </div>
        </div>

        <div>
           <p class="login__signup">
              Already have an account? <a href="login.php">Sign in</a>
           </p>

           <button type="submit" class="login__button">Register</button>
        </div>
    </form>

    <i class="ri-close-line login__close" id="login-close"></i>
</div>

      <!--==================== MAIN ====================-->
      <main class="main">
         <!--==================== HOME ====================-->
         
         <!--==================== PRODUCTS ====================-->
         <section class="products section" id="products">
            <div class="products__container container">
                <h2 class="section__title">
                    Choose our delicious and best products
                </h2>

                <ul class="products__filters">
                    <li class="products__item products__line active-product" data-filter=".delicacies">
                        <h3 class="products__title">Biscuits</h3>
                        <span class="products__stock">5 Products</span>
                    </li>

                    <li class="products__item products__line" data-filter=".coffee">
                        <h3 class="products__title">Beverages</h3>
                        <span class="products__stock">3 Products</span>
                    </li>

                    <li class="products__item products__line" data-filter=".cake">
                        <h3 class="products__title">Supplies</h3>
                        <span class="products__stock">2 Products</span>
                    </li>
                </ul>

                <div class="products__content grid">
                    <!-- BISCUITS -->
                    <article class="products__card delicacies">
                        <div class="products__shape">
                            <img src="assets/img/BISCUITS-1.png" alt="" class="products__img">
                        </div>

                        <div class="products__data">
                            <h2 class="products__price">5 Pesos</h2>
                            <h3 class="products__name">Bread Stix</h3>

                            <button class="button products__button">
                                <i class='bx bx-shopping-bag'></i>
                            </button>
                        </div>
                    </article>

                    <article class="products__card delicacies">
                        <div class="products__shape">
                            <img src="assets/img/BISCUITS-2.png" alt="" class="products__img">
                        </div>

                        <div class="products__data">
                            <h2 class="products__price">5 Pesos</h2>
                            <h3 class="products__name">Fita</h3>

                            <button class="button products__button">
                                <i class='bx bx-shopping-bag'></i>
                            </button>
                        </div>
                    </article>

                    <article class="products__card delicacies">
                        <div class="products__shape">
                            <img src="assets/img/BISCUITS-3.png" alt="" class="products__img">
                        </div>

                        <div class="products__data">
                            <h2 class="products__price">5 Pesos</h2>
                            <h3 class="products__name">Hansel</h3>

                            <button class="button products__button">
                                <i class='bx bx-shopping-bag'></i>
                            </button>
                        </div>
                    </article>

                    <!-- DRINKS -->
                    <article class="products__card coffee">
                        <div class="products__shape">
                            <img src="assets/img/DRINKS-1.png" alt="" class="products__img">
                        </div>

                        <div class="products__data">
                            <h2 class="products__price">5 Pesos</h2>
                            <h3 class="products__name">C2 - Green</h3>

                            <button class="button products__button">
                                <i class='bx bx-shopping-bag'></i>
                            </button>
                        </div>
                    </article>

                    <article class="products__card coffee">
                        <div class="products__shape">
                            <img src="assets/img/DRINKS-2.png" alt="" class="products__img">
                        </div>

                        <div class="products__data">
                            <h2 class="products__price">5 Pesos</h2>
                            <h3 class="products__name">C2 - Yellow</h3>

                            <button class="button products__button">
                                <i class='bx bx-shopping-bag'></i>
                            </button>
                        </div>
                    </article>

                    <article class="products__card coffee">
                        <div class="products__shape">
                            <img src="assets/img/DRINKS-3.png" alt="" class="products__img">
                        </div>

                        <div class="products__data">
                            <h2 class="products__price">5 Pesos</h2>
                            <h3 class="products__name">C2 - Red</h3>

                            <button class="button products__button">
                                <i class='bx bx-shopping-bag'></i>
                            </button>
                        </div>
                    </article>

                    <!-- SCHOOL SUPPLIES -->
                    <article class="products__card cake">
                        <div class="products__shape">
                            <img src="assets/img/SCHOOL-SUPPLIES-1.png" alt="" class="products__img">
                        </div>

                        <div class="products__data">
                            <h2 class="products__price">5 Pesos</h2>
                            <h3 class="products__name">Eraser</h3>

                            <button class="button products__button">
                                <i class='bx bx-shopping-bag'></i>
                            </button>
                        </div>
                    </article>

                    <article class="products__card cake">
                        <div class="products__shape">
                            <img src="assets/img/SCHOOL-SUPPLIES-2.png" alt="" class="products__img">
                        </div>

                        <div class="products__data">
                            <h2 class="products__price">5 Pesos</h2>
                            <h3 class="products__name">Pencils</h3>

                            <button class="button products__button">
                                <i class='bx bx-shopping-bag'></i>
                            </button>
                        </div>
                    </article>
                </div>
            </div>
        </section>
      </main>

      <!--==================== FOOTER ====================-->
      <footer class="footer">
            <div class="footer__container container">
                <h1 class="footer__title">
                    <img src=".//assets/img/MAYAH-STORE-LOGO.jpg" alt="Mayah Store">
                    Mayah Store
                </h1>

                <div class="footer__content grid">
                    <div class="footer__data">
                        <p class="footer__description">
                            Subscribe to our newsletter
                        </p>

                        <div class="footer__newsletter">
                            <input type="email" placeholder="Your email address" class="footer__input"> 
                            <button class="footer__button">
                                <i class='bx bx-right-arrow-alt'></i>
                            </button>
                        </div>
                    </div>

                    <div class="footer__data">
                        <h2 class="footer__subtitle">Address</h2>
                        <p class="footer__information">
                            Valenzuela, Philippines
                        </p>
                    </div>

                    <div class="footer__data">
                        <h2 class="footer__subtitle">Contact</h2>
                        <p class="footer__information">
                            0900 000 0000 <br>
                            mayahstore@gmail.com
                        </p>
                    </div>

                    <div class="footer__data">
                        <h2 class="footer__subtitle">Office</h2>
                        <p class="footer__information">
                            Monday - Sunday <br>
                            7am - 12am
                        </p>
                    </div>
                </div>

                <div class="footer__group">
                    <ul class="footer__social">
                        <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                            <i class='bx bxl-instagram' ></i>
                        </a>

                        <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                            <i class='bx bxl-facebook' ></i>
                        </a>

                        <a href="https://www.twitter.com/" target="_blank" class="footer__social-link">
                            <i class='bx bxl-twitter'></i>
                        </a>
                    </ul>

                    <span class="footer__copy">
                        &#169; Mayah Store. All rights reserved 2024
                    </span>
                </div>
            </div>
      </footer>

      <!--=============== SCROLL UP ===============-->
      <a href="#" class="scrollup" id="scroll-up">
        <i class='bx bx-up-arrow-alt' ></i>
      </a>
      
      <!--=============== MIXITUP FILTER ===============-->
      <script src="assets/js/mixitup.min.js "></script>

      <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <!--=============== MAIN JS ===============-->
      <script src="assets/js/login.js"></script>

   </body>
</html>