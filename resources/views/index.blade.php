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
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <!-- Botão do carrinho no header -->
<header class="header_section">
  <div class="container">
    <nav class="navbar navbar-expand-lg custom_nav-container">
      <a class="navbar-brand" href="{{ route('index') }}">
        <img src="{{ asset('storage/images/icon.png') }}" alt="" style="width: 75px; height: 50px; " />
        <span>
          Bigode Grosso FC
        </span>
      </a>
      <div class="profile_button-container">
    @if(auth()->check())
        <!-- Usuário logado: Redireciona para o perfil -->
        <a href="{{ route('profile') }}">
            <button id="profile-button" class="profile-button">
                <img src="{{ asset('storage/images/profile.png') }}" alt="" />
            </button>
        </a>
    @else
        <!-- Usuário não logado: Redireciona para a página de registro -->
        <a href="{{ route('registo') }}">
            <button id="profile-button" class="profile-button">
                <img src="{{ asset('storage/images/profile.png') }}" alt="" />
            </button>
        </a>
    @endif
</div>
      <!-- Botão do carrinho -->
      <div class="cart_button-container">
        <button id="cart-button" class="cart-button">
          <img src="{{ asset('storage/images/cart-icon.png') }}" alt="" />
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
        <img src="{{ asset('storage/images/product1.jpg') }}" alt="Product" />
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
    <section class="slider_section position-relative" style="height: calc(100% - 80px); background-image: url('{{ asset('storage/images/bigode.jpg') }}'); background-size: cover;">
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
                    <a class="nav-link" href="#resultSection">Map <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#aboutSection">About </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#serviceSection">Tickets </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#clientsection">Comments</a>
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
      <!-- Showcase Section -->

  </div>


  <!-- about section -->

  <section id="aboutSection" class="about_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
         Bigode Grosso FC
        </h2>
      </div>
      <div class="box">
        <div class="img-box">
          <img src="{{ asset('storage/images/icon.png') }}" alt="">
        </div>
        <div class="detail-box">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis
          </p>
          <a href="{{ route('about') }}">
            Read More
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- end about section -->

  <!-- service section -->

  <!-- Tickets Section -->
<section id="serviceSection" class="tickets_section layout_padding">
  <div class="container">
    <div class="heading_container">
      <h2>
        Available Tickets
      </h2>
    </div>
    <div class="tickets_container">
      <!-- Example Ticket -->
      <div class="ticket_box">
        <div class="ticket_details">
          <h3>Match: Team A vs. Team B</h3>
          <p>Date: December 10, 2024</p>
          <p>Place: Stadium XYZ</p>
          <p>Price: $50.00</p>
        </div>
        <div class="ticket_action">
          <button class="add_to_cart_btn">Add to Cart</button>
        </div>
      </div>
      <!-- More tickets can be added dynamically -->
      <div class="ticket_box">
        <div class="ticket_details">
          <h3>Match: Team C vs. Team D</h3>
          <p>Date: December 15, 2024</p>
          <p>Place: Arena ABC</p>
          <p>Price: $65.00</p>
        </div>
        <div class="ticket_action">
          <button class="add_to_cart_btn">Add to Cart</button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Styles for the Tickets Section -->


  <!-- end service section -->

<!-- result section -->

<section id="resultSection" class="result_section">
  <div class="col-md-6">
    <div class="map_container">
      <div class="map-responsive">
        <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.524402799665!2d-34.9247716902675!3d-8.149800865357298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7aae188fe3e6c31%3A0x856b8e019ffe763!2sCampo%20De%20Futebol%20Dos%20Guararapes!5e0!3m2!1sen!2sus!4v1732291246630!5m2!1sen!2sus"
          width="800" height="300" frameborder="0" style="border:0; width: 100%; height:100%"
          allowfullscreen></iframe>
           
      </div>
    </div>
  </div>
</section>

<!-- end result section -->

  <!-- client section -->
  <section id="clientsection" class="client_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          What Says Our Customers
        </h2>
      </div>
      <div id="carouselExample2Indicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExample2Indicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExample2Indicators" data-slide-to="1"></li>
          <li data-target="#carouselExample2Indicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="box">
              <div class="img-box">
                <img src="{{ asset('storage/images/client.png') }}" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Consectetur
                </h5>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                  dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="img-box">
                <img src="{{ asset('storage/images/client.png') }}" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Consectetur
                </h5>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                  dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="img-box">
                <img src="{{ asset('storage/images/client.png') }}" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Consectetur
                </h5>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                  dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- end client section -->

  


  <!-- contact section -->
  <section id="contactSection" class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          <span>
            Leave a comment
          </span>
        </h2>
      </div>
      <div class="layout_padding2-top">
        <div class="row">
          <div class="col-md-6 ">
            <form action="">
              <div class="contact_form-container">
                <div>
              
                  <div class="mt-5">
                    <input type="text" placeholder="Message" />
                  </div>
                  <div class="mt-5">
                    <button type="submit">
                      Send
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->


  <!-- info section -->

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
          <img src="{{ asset('storage/images/facebook-logo-button.png') }}" alt="Facebook" style="width: 30px; height: 30px;">
          </a>
       </div>
          <div>
          <a href="https://www.instagram.com/bigodegrosso.fc/">
          <img src="{{ asset('storage/images/instagram.png') }}" alt="Instagram" style="width: 30px; height: 30px;">
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