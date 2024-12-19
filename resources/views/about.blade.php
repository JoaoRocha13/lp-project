<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>About</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
</head>
<body class="sub_page">
  <div class="hero_area">
    <!-- Header Section -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('images/icon.png') }}" alt="" style="width: 75px; height: 50px;">
            <span>Bigode Grosso FC</span>
          </a>
          <div class="profile_button-container d-flex align-items-center">
            @if(auth()->check())
              @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin') }}">
                  <button id="admin-tools-button" class="btn btn-secondary mr-2">Admin Tools</button>
                </a>
              @endif
              <a href="{{ route('profile') }}">
                <button id="profile-button" class="profile-button">
                  <img src="{{ asset('images/profile.png') }}" alt="">
                </button>
              </a>
            @else
              <a href="{{ route('registo') }}">
                <button id="profile-button" class="profile-button">
                  <img src="{{ asset('images/profile.png') }}" alt="">
                </button>
              </a>
            @endif
          </div>
          <div class="cart_button-container">
            <button id="cart-button" class="cart-button">
              <img src="{{ asset('images/cart-icon.png') }}" alt="">
            </button>
          </div>
        </nav>
      </div>
    </header>

    <!-- Cart Slideout -->
    <div id="cart-slideout" class="cart-slideout">
      <div class="cart-header">
        <h4>Your Cart</h4>
        <button id="close-cart" class="close-cart">&times;</button>
      </div>
      <div class="cart-items">
        <div class="cart-item">
          <div class="cart-item-image">
            <img src="{{ asset('images/product1-jpg') }}" alt="Product">
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
      </div>
      <div class="cart-footer">
        <form action="{{ route('checkout') }}" method="GET">
          <button type="submit" class="checkout-btn">Checkout</button>
        </form>
      </div>
    </div>

    <!-- Slider Section -->
    <section class="slider_section position-relative">
      <div class="container">
        <div class="custom_nav2">
          <nav class="navbar navbar-expand-lg custom_nav-container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('store') }}">Store</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </section>
  </div>

  <!-- Service Section -->
  <section class="service_section layout_padding" style="display: flex; gap: 20px; align-items: flex-start;">
    <div class="container" style="display: flex; flex-wrap: wrap;">
      <div class="left_side" style="flex: 1; text-align: center;">
        <img src="{{ asset('images/campo.jpg') }}" alt="Field" style="max-width: 100%; height: auto; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
      </div>
      <div class="right_side" style="flex: 1; background: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h2 style="text-align: center;">History of Previous Games</h2>
        @foreach($previousGames as $game)
          <div class="game_record" style="display: flex; align-items: center; margin-bottom: 20px; padding: 15px; background: #fff; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
            <div style="flex: 1; text-align: center;">
              @if($game->team_a_logo)
                <img src="{{ asset('storage/images/' . $game->team_a_logo) }}" alt="Team A Logo" style="width: 70px; height: 70px; border-radius: 50%;">
              @endif
              <p>{{ $game->team_a }}</p>
            </div>
            <div style="flex: 1; text-align: center; font-size: 18px;">
              <p>{{ $game->score_a }} - {{ $game->score_b }}</p>
              <p style="font-size: 14px;">Date: {{ $game->game_date }}</p>
            </div>
            <div style="flex: 1; text-align: center;">
              @if($game->team_b_logo)
                <img src="{{ asset('storage/images/' . $game->team_b_logo) }}" alt="Team B Logo" style="width: 70px; height: 70px; border-radius: 50%;">
              @endif
              <p>{{ $game->team_b }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Updates Section -->
  <section id="updatesSection" class="updates_section layout_padding" style="background: #f9f9f9; padding: 40px 20px;">
    <div class="container">
      <div class="heading_container">
        <h2 style="text-align: center;">Latest Updates</h2>
      </div>
      <div class="news_grid" style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
        @foreach($news as $update)
          <div class="news_card" style="width: 300px; background: #fff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); overflow: hidden;">
            @if($update->image)
              <div class="news_image" style="height: 180px;">
                <img src="{{ asset('storage/images/' . $update->image) }}" alt="News Image" style="width: 100%; height: 100%; object-fit: contain;">
              </div>
            @else
              <div class="news_image_placeholder" style="height: 180px; background: #ddd; display: flex; align-items: center; justify-content: center;">
                <span>No Image Available</span>
              </div>
            @endif
            <div class="news_content" style="padding: 15px;">
              <h4>{{ $update->title }}</h4>
              <p>{{ Str::limit($update->description, 100, '...') }}</p>
              <p>Date: {{ \Carbon\Carbon::parse($update->date)->format('F d, Y') }}</p>
            </div>
          </div>
        @endforeach
      </div>
      @if($news->isEmpty())
        <p style="text-align: center;">No updates available at the moment.</p>
      @endif
    </div>
  </section>

  <!-- Info Section -->
  <section class="info_section layout_padding2-top">
    <div class="col-md-3">
      <h6>Contact Us</h6>
      <div class="info_link-box">
        <a href="">
          <img src="images/mail-white.png" alt="">
          <span>bigodegrossofc@gmail.com</span>
        </a>
      </div>
      <div class="info_social" style="display: flex; gap: 10px;">
        <a href="https://www.facebook.com/bigodegrossoFctatui/">
          <img src="{{ asset('images/facebook-logo-button.png') }}" alt="Facebook" style="width: 30px; height: 30px;">
        </a>
        <a href="https://www.instagram.com/bigodegrosso.fc/">
          <img src="{{ asset('images/instagram.png') }}" alt="Instagram" style="width: 30px; height: 30px;">
        </a>
      </div>
    </div>
  </section>

  <!-- Scripts -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const cartButton = document.getElementById('cart-button');
      const cartSlideout = document.getElementById('cart-slideout');
      const closeCartButton = document.getElementById('close-cart');
      cartButton.addEventListener('click', function () {
        cartSlideout.classList.add('open');
      });
      closeCartButton.addEventListener('click', function () {
        cartSlideout.classList.remove('open');
      });
    });
  </script>
</body>

</html>
