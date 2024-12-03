<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Energym</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis:400,600,700|Poppins:400,600,700&display=swap"
    rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <!-- Botão do carrinho no header -->
<header class="header_section">
  <div class="container">
    <nav class="navbar navbar-expand-lg custom_nav-container">
      <a class="navbar-brand" href="index.html">
        <img src="images/icon.png" alt="" style="width: 75px; height: 50px;" />
        <span>
          Bigode Grosso FC
        </span>
      </a>
      <div class="profile_button-container">
        <a href="registo.html">
          <button id="profile-button" class="profile-button">
            <img src="images/profile.png" alt="" />
          </button>
        </a>
      </div>
    <!-- Botão do carrinho -->
      <div class="cart_button-container">
        <button id="cart-button" class="cart-button">
          <img src="images/cart-icon.png" alt="" />
        </button>
      </div>
    </nav>
  </div>
</header>

<!-- Slide-out do carrinho -->
<div id="cart-slideout" class="cart-slideout">
  <div class="cart-header">
    <h4>Your Cart</h4>
    <button id="close-cart" class="close-cart">&times;</button>
  </div>
  <div class="cart-items">
    <!-- Exemplo de item no carrinho -->
    <div class="cart-item">
      <div class="cart-item-image">
        <img src="images/product1.jpg" alt="Product" />
      </div>
      <div class="cart-item-details">
        <h5>Product Name</h5>
        <p>$20.00</p>
        <div class="cart-item-controls">
          <button class="quantity-btn decrease">-</button>
          <span class="quantity">1</span>
          <button class="quantity-btn increase">+</button>
        </div>
      </div>
    </div>
    <!-- Mais itens aqui -->
  </div>
  <div class="cart-footer">
    <button class="checkout-btn">Checkout</button>
  </div>
</div>

    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div class="container">
        <div class="custom_nav2">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div class="d-flex  flex-column flex-lg-row align-items-center">
                <ul class="navbar-nav  ">
                  <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="store.html">Store</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- service section -->

  <!-- Service Section -->
<section class="service_section layout_padding" style="display: flex; gap: 20px; align-items: flex-start;">
  <div class="container" style="display: flex; flex-wrap: wrap;">
    <!-- Left Side: Image of the Field -->
    <div class="left_side" style="flex: 1; text-align: center;">
      <img src="images/campo.jpg" alt="Field" style="max-width: 100%; height: auto; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
    </div>

    <!-- Right Side: History of Previous Games -->
    <div class="right_side" style="flex: 1; background: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
      <h2 style="margin-bottom: 20px; color: #333; font-family: 'Poppins', sans-serif;">History of Previous Games</h2>

      <!-- Game 1 -->
      <div class="game_record" style="margin-bottom: 15px; padding: 15px; background: #fff; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <p style="margin: 0; font-size: 16px; font-weight: bold; color: #555;">Team A 2 - 1 Team B</p>
        <p style="margin: 0; font-size: 14px; color: #777;">Date: November 15, 2024</p>
      </div>

      <!-- Game 2 -->
      <div class="game_record" style="margin-bottom: 15px; padding: 15px; background: #fff; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <p style="margin: 0; font-size: 16px; font-weight: bold; color: #555;">Team C 3 - 0 Team D</p>
        <p style="margin: 0; font-size: 14px; color: #777;">Date: November 10, 2024</p>
      </div>

      <!-- Game 3 -->
      <div class="game_record" style="margin-bottom: 15px; padding: 15px; background: #fff; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <p style="margin: 0; font-size: 16px; font-weight: bold; color: #555;">Team E 1 - 1 Team F</p>
        <p style="margin: 0; font-size: 14px; color: #777;">Date: November 5, 2024</p>
      </div>

      <!-- Placeholder for Adding More Games -->
      <p style="margin-top: 20px; font-size: 14px; color: #999; text-align: center;">More games will be added by the admin.</p>
    </div>
  </div>
</section>
  <!-- end service section -->
   <!-- Updates Section -->
<section id="updatesSection" class="updates_section layout_padding" style="background: #f9f9f9; padding: 40px 20px; border-top: 2px solid #ddd;">
  <div class="container">
    <div class="heading_container">
      <h2 style="text-align: center; margin-bottom: 30px; color: #333; font-family: 'Poppins', sans-serif;">Latest Updates</h2>
    </div>

    <!-- Update 1 -->
    <div class="update_item" style="margin-bottom: 20px; padding: 20px; background: #fff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
      <h4 style="margin: 0; color: #555;">🎉 New Player Signed: John Doe</h4>
      <p style="margin: 5px 0; font-size: 14px; color: #777;">Position: Midfielder</p>
      <p style="margin: 5px 0; font-size: 14px; color: #777;">Date: November 20, 2024</p>
    </div>

    <!-- Update 2 -->
    <div class="update_item" style="margin-bottom: 20px; padding: 20px; background: #fff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
      <h4 style="margin: 0; color: #555;">🚑 Player Injury: Jane Smith</h4>
      <p style="margin: 5px 0; font-size: 14px; color: #777;">Injury: Sprained Ankle</p>
      <p style="margin: 5px 0; font-size: 14px; color: #777;">Date: November 18, 2024</p>
    </div>

    <!-- Update 3 -->
    <div class="update_item" style="margin-bottom: 20px; padding: 20px; background: #fff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
      <h4 style="margin: 0; color: #555;">🏆 Title Won: Regional Championship</h4>
      <p style="margin: 5px 0; font-size: 14px; color: #777;">Score: Team A 3 - 2 Team B</p>
      <p style="margin: 5px 0; font-size: 14px; color: #777;">Date: November 10, 2024</p>
    </div>

    <!-- Placeholder for More Updates -->
    <p style="margin-top: 20px; text-align: center; font-size: 14px; color: #999;">More updates will be added by the admin.</p>
  </div>
</section>

  <!-- info section -->

  <section class="info_section layout_padding2-top">
    <div class="container">
      <div class="info_form">
        <h4>
          Our Newsletter
        </h4>
        <form action="">
          <input type="text" placeholder="Enter your email">
          <div class="d-flex justify-content-end">
            <button>
              subscribe
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h6>
            About Energym
          </h6>
          <p>
            consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
            minim veniam, quis nostrud exercitation u
          </p>
        </div>
        <div class="col-md-2 offset-md-1">
          <h6>
            Menus
          </h6>
          <ul>
            <li class=" active">
              <a class="" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="">
              <a class="" href="about.html">About </a>
            </li>
            <li class="">
              <a class="" href="service.html">Services </a>
            </li>
            <li class="">
              <a class="" href="#contactSection">Contact Us</a>
            </li>
            <li class="">
              <a class="" href="#">Login</a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6>
            Useful Links
          </h6>
          <ul>
            <li>
              <a href="">
                Adipiscing
              </a>
            </li>
            <li>
              <a href="">
                Elit, sed
              </a>
            </li>
            <li>
              <a href="">
                do Eiusmod
              </a>
            </li>
            <li>
              <a href="">
                Tempor
              </a>
            </li>
            <li>
              <a href="">
                incididunt
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6>
            Contact Us
          </h6>
          <div class="info_link-box">
            <a href="">
              <img src="images/location-white.png" alt="">
              <span> No.123, loram ipusm</span>
            </a>
            <a href="">
              <img src="images/call-white.png" alt="">
              <span>+01 12345678901</span>
            </a>
            <a href="">
              <img src="images/mail-white.png" alt="">
              <span> demo123@gmail.com</span>
            </a>
          </div>
          <div class="info_social">
            <div>
              <a href="">
                <img src="images/facebook-logo-button.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/twitter-logo-button.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/linkedin.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/instagram.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->


  <!-- footer section -->
  <section class="container-fluid footer_section ">
    <p>
      &copy; 2019 All Rights Reserved. Design by
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

  <script>
    function openNav() {
      document.getElementById("myNav").classList.toggle("menu_width");
      document
        .querySelector(".custom_menu-btn")
        .classList.toggle("menu_btn-style");
    }
  </script>
</body>

</html>