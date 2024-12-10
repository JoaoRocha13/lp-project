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

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" /></head>

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
      <div class="profile_button-container d-flex align-items-center">
    @if(auth()->check())
        <!-- Botão Admin Tools -->
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin') }}">
                <button id="admin-tools-button" class="btn btn-secondary mr-2">
                    Admin Tools
                </button>
            </a>
        @endif
        <!-- Usuário logado: Botão de perfil -->
        <a href="{{ route('profile') }}">
            <button id="profile-button" class="profile-button">
                <img src="{{ asset('images/profile.png') }}" alt="" />
            </button>
        </a>
    @else
        <!-- Usuário não logado: Botão de registro -->
        <a href="{{ route('registo') }}">
            <button id="profile-button" class="profile-button">
                <img src="{{ asset('images/profile.png') }}" alt="" />
            </button>
        </a>
    @endif
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
        <img src="{{ asset('images/product1.jpg') }}" alt="Product" />
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
                    <a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
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

  <section class="store_section layout_padding" style="padding: 40px 20px;">
  <div class="container">
    <div class="heading_container" style="text-align: center; margin-bottom: 30px;">
      <h2 style="font-family: 'Poppins', sans-serif; color: #333;">Our Store</h2>
     
    </div>

    <div class="row" style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
      <!-- Product 1 -->
      <div class="col-md-3 product_card" style="background: #fff; border-radius: 10px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">
        <img src="{{ asset('storage/images/product1.jpg') }}" alt="Product 1" style="width: 100%; height: 150px; object-fit: contain; margin-bottom: 10px;">
        <h5 style="color: #555; font-weight: bold; font-size: 18px;">Football Jersey</h5>
        <p style="color: #777; font-size: 14px;">$50.00</p>
        <button class="add_to_cart_btn" data-name="Football Jersey" data-price="50.00" style="padding: 10px 15px; background: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">Add to Cart</button>
      </div>

      <!-- Product 2 -->
      <div class="col-md-3 product_card" style="background: #fff; border-radius: 10px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">
        <img src="{{ asset('storage/images/product2.jpg') }}" alt="Product 2" style="width: 100%; height: 150px; object-fit: contain; margin-bottom: 10px;">
        <h5 style="color: #555; font-weight: bold; font-size: 18px;">Team Cap</h5>
        <p style="color: #777; font-size: 14px;">$20.00</p>
        <button class="add_to_cart_btn" data-name="Team Cap" data-price="20.00" style="padding: 10px 15px; background: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">Add to Cart</button>
      </div>

      <!-- Product 3 -->
      <div class="col-md-3 product_card" style="background: #fff; border-radius: 10px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">
        <img src="{{ asset('storage/images/product3.jpg') }}" alt="Product 3" style="width: 100%; height: 150px; object-fit: contain; margin-bottom: 10px;">
        <h5 style="color: #555; font-weight: bold; font-size: 18px;">Match Ball</h5>
        <p style="color: #777; font-size: 14px;">$30.00</p>
        <button class="add_to_cart_btn" data-name="Match Ball" data-price="30.00" style="padding: 10px 15px; background: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">Add to Cart</button>
      </div>

      <!-- Product 4 -->
      <div class="col-md-3 product_card" style="background: #fff; border-radius: 10px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">
        <img src="{{ asset('storage/images/product4.jpg') }}" alt="Product 4" style="width: 100%; height: 150px; object-fit: contain; margin-bottom: 10px;">
        <h5 style="color: #555; font-weight: bold; font-size: 18px;">Water Bottle</h5>
        <p style="color: #777; font-size: 14px;">$15.00</p>
        <button class="add_to_cart_btn" data-name="Water Bottle" data-price="15.00" style="padding: 10px 15px; background: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">Add to Cart</button>
      </div>
    </div>
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