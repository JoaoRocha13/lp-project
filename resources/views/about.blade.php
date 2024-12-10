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

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <!-- Botão do carrinho no header -->
<header class="header_section">
  <div class="container">
    <nav class="navbar navbar-expand-lg custom_nav-container">
      <a class="navbar-brand" href="{{ route('index') }}">
        <img src="{{ asset('images/icon.png') }}" alt="" style="width: 75px; height: 50px;" />
        <span>
          Bigode Grosso FC
        </span>
      </a>
      <div class="profile_button-container">
      <a href="{{ route('registo') }}">
          <button id="profile-button" class="profile-button">
            <img src="{{ asset('images/profile.png') }}" alt="" />
          </button>
        </a>
      </div>
    <!-- Botão do carrinho -->
      <div class="cart_button-container">
        <button id="cart-button" class="cart-button">
          <img src="{{ asset('images/cart-icon.png') }}" alt="" />
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
        <img src="{{ asset('images/product1-jpg') }}" alt="Product" />
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
                    <a class="nav-link" href="{{ route('index') }}">>Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('store') }}">Store</a>
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
      <img src="{{ asset('images/campo.jpg') }}" alt="Field" style="max-width: 100%; height: auto; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
    </div>

    <div class="right_side" style="flex: 1; background: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
  <h2 style="margin-bottom: 20px; color: #333; font-family: 'Poppins', sans-serif;">History of Previous Games</h2>

  <!-- Game 1 -->
  <div class="game_record" style="display: flex; align-items: center; margin-bottom: 15px; padding: 15px; background: #fff; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
    <img src="{{ asset('images/team_a_logo.png') }}" alt="Team A" style="width: 50px; height: 50px; margin-right: 10px;">
    <p style="margin: 0; font-size: 16px; font-weight: bold; color: #555;">Team A 2 - 1 Team B</p>
    <img src="{{ asset('images/team_b_logo.png') }}" alt="Team B" style="width: 50px; height: 50px; margin-left: 10px;">
    <p style="margin-left: auto; font-size: 14px; color: #777;">Date: November 15, 2024</p>
  </div>

  <!-- Game 2 -->
  <div class="game_record" style="display: flex; align-items: center; margin-bottom: 15px; padding: 15px; background: #fff; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
    <img src="{{ asset('images/team_c_logo.png') }}" alt="Team C" style="width: 50px; height: 50px; margin-right: 10px;">
    <p style="margin: 0; font-size: 16px; font-weight: bold; color: #555;">Team C 3 - 0 Team D</p>
    <img src="{{ asset('images/team_d_logo.png') }}" alt="Team D" style="width: 50px; height: 50px; margin-left: 10px;">
    <p style="margin-left: auto; font-size: 14px; color: #777;">Date: November 10, 2024</p>
  </div>

  <!-- Game 3 -->
  <div class="game_record" style="display: flex; align-items: center; margin-bottom: 15px; padding: 15px; background: #fff; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
    <img src="{{ asset('images/team_e_logo.png') }}" alt="Team E" style="width: 50px; height: 50px; margin-right: 10px;">
    <p style="margin: 0; font-size: 16px; font-weight: bold; color: #555;">Team E 1 - 1 Team F</p>
    <img src="{{ asset('images/team_f_logo.png') }}" alt="Team F" style="width: 50px; height: 50px; margin-left: 10px;">
    <p style="margin-left: auto; font-size: 14px; color: #777;">Date: November 5, 2024</p>
  </div>
  
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
        <div class="col-md-3">
          <h6>
            Contact Us
          </h6>
          <div class="info_link-box">
          <a href="">
              <img src="images/mail-white.png" alt="">
              <span> bigodegrossofc@gmail.com</span>
            </a>
          </div>
          <div class="info_social" style="position: relative; top: -20px; display: flex; gap: 10px;">
          <div>
          <a href="https://www.facebook.com/bigodegrossoFctatui/">
          <img src="{{ asset('images/facebook-logo-button.png') }}" alt="Facebook" style="width: 30px; height: 30px;">
          </a>
       </div>
          <div>
          <a href="https://www.instagram.com/bigodegrosso.fc/">
          <img src="{{ asset('images/instagram.png') }}" alt="Instagram" style="width: 30px; height: 30px;">
    </a>
  </div>
</div>
        </div>
      </div>
    </div>
  </section>
  <!-- end info section -->
   


  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

  <script>
  document.addEventListener('DOMContentLoaded', function () {
    const cartButton = document.getElementById('cart-button');
    const cartSlideout = document.getElementById('cart-slideout');
    const closeCartButton = document.getElementById('close-cart');

    // Abre o carrinho
    cartButton.addEventListener('click', function () {
      cartSlideout.classList.add('open');
    });

    // Fecha o carrinho
    closeCartButton.addEventListener('click', function () {
      cartSlideout.classList.remove('open');
    });
  });
</script>
</body>

</html>