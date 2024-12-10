<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>User Profile</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
</head>

<body class="sub_page profile-page">
  <div class="hero_area">
    <!-- Header Section -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('images/icon.png') }}" alt="" style="width: 75px; height: 50px;" />
            <span>Bigode Grosso FC</span>
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
  <form action="{{ route('checkout') }}" method="GET">
      <button type="submit" class="checkout-btn">Checkout</button>
    </form>

  </div>
</div>
    <!-- End Header Section -->

    <!-- Main Content -->
    <div class="container-fluid">
      <div class="row">
        <!-- Profile Section -->
        <div class="col-md-12">
          <div id="profileContent" class="section-container">
            <h2>User Profile</h2>
            <div class="user-details">
            <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
              <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
              <p><strong>Role:</strong> {{ auth()->user()->role ?? 'Not specified' }}</p>
            </div>

            <!-- Purchase History -->
            <div class="purchase-history mt-4">
              <h3>Purchase History</h3>
              <ul class="nav nav-tabs" id="purchaseTabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pending-tab" data-bs-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="true">Pending Purchases</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="completed-tab" data-bs-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">Completed Purchases</a>
                </li>
              </ul>
              <div class="tab-content" id="purchaseTabsContent">
                <!-- Pending Purchases -->
                <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                  <table class="table table-striped mt-3">
                    <thead>
                      <tr>
                        <th>Purchase ID</th>
                        <th>Items</th>
                        <th>Total Price</th>
                        <th>Date</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Football Jersey</td>
                        <td>$50.00</td>
                        <td>December 1, 2024</td>
                        <td>Pending</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <!-- Completed Purchases -->
                <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                  <table class="table table-striped mt-3">
                    <thead>
                      <tr>
                        <th>Purchase ID</th>
                        <th>Items</th>
                        <th>Total Price</th>
                        <th>Date</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>2</td>
                        <td>Match Ticket</td>
                        <td>$30.00</td>
                        <td>November 15, 2024</td>
                        <td>Completed</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="logout-section mt-4">
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
              </form>
            </div>
            <!-- End Logout Button -->
          </div>
        </div>
      </div>
    </div>
    </div>
      <!-- Logout Button -->
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // Cart Slide-out functionality
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
