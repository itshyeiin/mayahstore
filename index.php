<?php include 'db.php'; // Include your DB connection ?>
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
      <link rel="stylesheet" href="assets/css/styles.css">

      <title>Mayah Store Official</title>
   </head>
   <body>
      <!--==================== HEADER ====================-->
      <header class="header" id="header">
         <nav class="nav container">
            <a href="index.php" class="nav__logo">
                <img src="assets/img/MAYAH-STORE-LOGO.jpg" alt="" class="nav__logo-img">
                Mayah Store
            </a>

            <div class="nav__menu" id="nav-menu">
               <ul class="nav__list">
                  <li class="nav__item">
                     <a href="#home" class="nav__link active-link">Home</a>
                  </li>

                  <li class="nav__item">
                     <a href="#about" class="nav__link">About Us</a>
                  </li>

                  <li class="nav__item">
                     <a href="#products" class="nav__link">Products</a>
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

               <!-- Login button -->
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
      <div class="login" id="login">
         <form action="" class="login__form">
            <button type="button" class="login__button">
                <a href="register.php">
                    Register
                </a>
            </button>

            <button type="button" class="login__button" >
                <a href="login.php">
                    Log In
                </a>
            </button>
         </form>

         <i class="ri-close-line login__close" id="login-close"></i>
      </div>

      <!--==================== MAIN ====================-->
      <main class="main">
         <!--==================== HOME ====================-->
         <section class="home section" id="home">
            <div class="home__container container grid">
                <div class="home__data">
                    <h1 class="home__title">SHOP <br> WITH NO <br> LIMITS</h1>

                    <p class="home__description">
                        We got everything for your schooling needs!,
                        From essential supplies to the latest gadgets, 
                        our extensive collection ensures you're well-prepared and set for success. 
                    </p>

                    <div class="home__buttons">
                        <a href="#products" class="button-1 button__ghost">Buy Now</a>
                    </div>
                </div>

                <div class="home__images">
                    <div class="home__circle">
                        <div class="home__subcircle"></div>
                    </div>

                    <img src="assets/img/BISCUITS-1.png" alt="" class="home__img">

                    <img src="assets/img/BISCUITS-1.png" alt="" class="home__chips-1">
                    <img src="assets/img/BISCUITS-2.png" alt="" class="home__chips-2">
                    <img src="assets/img/BISCUITS-3.png" alt="" class="home__chips-3">
                    <img src="assets/img/DRINKS-1.png" alt="" class="home__tomato-1">
                    <img src="assets/img/DRINKS-2.png" alt="" class="home__tomato-2">
                    <img src="assets/img/DRINKS-3.png" alt="" class="home__leaf">
                </div>
            </div>
         </section>

         <!--==================== ABOUT ====================-->
         <section class="about section" id="about">
            <div class="about__container container grid">
                <div class="about__images">
                    <img src="assets/img/MAYAH.jpg" alt="" class="about__img">
                </div>
                
                <div class="about__data">
                    <h1 class="about__title">About Us</h1>

                    <p class="about__description">
                        At <span class="about__maya">Mayah Store</span>, we understand that preparation is the key to success. 
                        That's why we offer a comprehensive selection of products tailored to meet all your academic and personal needs. 
                        From basic school supplies like notebooks and pens to advanced tech gadgets that keep you ahead of the curve, 
                        our inventory is carefully curated to enhance your educational experience. 
                        Dive into our extensive collection of high-quality items, including eco-friendly stationery, 
                        innovative study aids, and the latest electronic devices, 
                        all designed to support and inspire your journey towards academic excellence and personal growth. 
                        Whether you're gearing up for a new school year or tackling everyday challenges, 
                        <span class="about__maya">Mayah Store</span> is your trusted partner in achieving success and exceeding your goals.
                    </p>
                </div>
            </div>
         </section>

         <!--==================== PRODUCTS ====================-->
         <section class="products section" id="products">
            <div class="products__container container">
                <h2 class="home__title section__title">
                    Choose our delicious and best products
                </h2>

                <ul class="products__filters">
                    <li class="products__item products__line active-product" data-filter=".delicacies">
                        <h3 class="products__title">Biscuits</h3>
                        <span class="products__stock">3 Products</span>
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
                    <!-- BISCUITS/DELICACIES -->
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

                    <!-- SCHOOL -->
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
      
      <!--=============== SCROLL REVEAL ANIMATION ===============-->
      <script src="assets/js/scrollreveal.min.js "></script>
            
      <!--=============== MIXITUP FILTER ===============-->
      <script src="assets/js/mixitup.min.js "></script>

      <!--=============== MAIN JS ===============-->
      <script src="assets/js/main.js"></script>
    </body>
</html>
