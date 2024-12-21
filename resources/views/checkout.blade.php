<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Checkout</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
  
</head>

<body class="sub_page checkout-page">
  <div class="hero_area">
   <!-- Header Section -->
   <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <!-- Logo e Título -->
          <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('images/icon.png') }}" alt="Logo" style="width: 75px; height: 50px;" />
            <span>Bigode Grosso FC</span>
          </a>

          <!-- Ícones de Perfil e Carrinho -->
          <div class="navbar-icons d-flex align-items-center">
            @if(auth()->check())
              @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin') }}">
                  <button id="admin-tools-button" class="btn btn-secondary me-2">Admin Tools</button>
                </a>
              @endif
              <!-- Botão de Perfil -->
              <a href="{{ route('profile') }}">
                <button id="profile-button" class="profile-button">
                  <img src="{{ auth()->user()->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : asset('images/profile.png') }}" 
                       alt="Profile" 
                       class="rounded-circle" 
                       style="width: 40px; height: 40px; object-fit: cover;">
                </button>
              </a>
            @else
              <!-- Botão de Registro -->
              <a href="{{ route('registo') }}">
                <button id="profile-button" class="profile-button">
                  <img src="{{ asset('images/profile.png') }}" alt="Default Profile Icon">
                </button>
              </a>
            @endif

          </div>
        </nav>
      </div>
    </header>

  <!-- Main Content -->
  <div class="container mt-5">
    <div class="checkout-header text-center">
      <h2>Checkout</h2>
    </div>
    <div class="row">
      <!-- Cart Items -->
      <div class="col-md-6 mb-4">
        <h4>Items in Your Cart</h4>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Item</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Football Jersey</td>
              <td>2</td>
              <td>$50.00</td>
              <td>$100.00</td>
            </tr>
            <tr>
              <td>Match Ticket</td>
              <td>1</td>
              <td>$30.00</td>
              <td>$30.00</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <th colspan="3" class="text-right">Total</th>
              <th>$130.00</th>
            </tr>
          </tfoot>
        </table>
      </div>

      <!-- Checkout Form -->
      <div class="col-md-6">
        <h4>Shipping Address</h4>
        <form>
          <div class="form-group">
            <label for="fullName">Full Name</label>
            <input type="text" class="form-control" id="fullName" placeholder="Enter your full name" required>
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" placeholder="Enter your address" required>
          </div>
          <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" placeholder="Enter your city" required>
          </div>
          <div class="form-group">
            <label for="zip">ZIP Code</label>
            <input type="text" class="form-control" id="zip" placeholder="Enter your ZIP code" required>
          </div>
          <div class="form-group">
            <label for="country">Country</label>
            <input type="text" class="form-control" id="country" placeholder="Enter your country" required>
          </div>

          <h4>Payment Method</h4>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="paymentType" id="creditCard" value="creditCard" checked>
              <label class="form-check-label" for="creditCard">Credit Card</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="paymentType" id="paypal" value="paypal">
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-block mt-3">Confirm Purchase</button>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  
</body>

</html>
