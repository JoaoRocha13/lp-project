<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Admin Dashboard</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
</head>

<body class="sub_page admin-page">

  <div class="hero_area">
    <!-- header section strats -->
    <!-- Botão do carrinho no header -->
<header class="header_section">
  <div class="container">
    <nav class="navbar navbar-expand-lg custom_nav-container">
      <a class="navbar-brand" href="{{ route('index') }}">
        <img src="{{ asset('storage/images/icon.png') }}" alt="" style="width: 75px; height: 50px;" />
        <span>
          Bigode Grosso FC
        </span>
      </a>
      <div class="profile_button-container">
      <a href="{{ route('registo') }}">
          <button id="profile-button" class="profile-button">
            <img src="{{ asset('storage/images/profile.png') }}" alt="" />
          </button>
        </a>
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

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3" id="adminSidebar">
        <h4>Admin Menu</h4>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="#" id="viewUsersLink">View Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="postGamesLink">Post Previous Games</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="postNewsLink">Post News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="postTicketsLink">Post Tickets</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="postItemsLink">Post Store Items</a>
          </li>
          <li class="nav-item">
        <a class="nav-link" href="#" id="managePurchasesLink">Manage Purchases</a>
  </li>
        </ul>
      </div>

      <!-- Main Content Area -->
      <div class="col-md-9">
        <div id="adminContent">
          <!-- View Users Section -->
          <div id="viewUsersSection" class="section-container">
            <h2>View Users</h2>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>User ID</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Promote to Admin</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>john_doe</td>
                  <td>john@example.com</td>
                  <td>Client</td>
                  <td><button class="btn btn-primary btn-sm">Promote</button></td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Post Previous Games Section -->
          <div id="postGamesSection" class="section-container" style="display: none;">
            <h2>Post Previous Games</h2>
            <form>
              <div class="form-group">
                <label for="teamA">Team A Name</label>
                <input type="text" class="form-control" id="teamA" placeholder="Enter Team A name">
              </div>
              <div class="form-group">
                <label for="teamAImage">Team A Image</label>
                <input type="file" class="form-control-file" id="teamAImage">
              </div>
              <div class="form-group">
                <label for="teamB">Team B Name</label>
                <input type="text" class="form-control" id="teamB" placeholder="Enter Team B name">
              </div>
              <div class="form-group">
                <label for="teamBImage">Team B Image</label>
                <input type="file" class="form-control-file" id="teamBImage">
              </div>
              <div class="form-group">
                <label for="scoreA">Team A Score</label>
                <input type="number" class="form-control" id="scoreA" placeholder="0">
              </div>
              <div class="form-group">
                <label for="scoreB">Team B Score</label>
                <input type="number" class="form-control" id="scoreB" placeholder="0">
              </div>
              <div class="form-group">
                <label for="gameDate">Date</label>
                <input type="date" class="form-control" id="gameDate">
              </div>
              <button type="submit" class="btn btn-primary">Post Game</button>
            </form>
          </div>

          <!-- Post News Section -->
<div id="postNewsSection" class="section-container" style="display: none;">
  <h2>Post News</h2>
  <form>
    <!-- News Title -->
    <div class="form-group">
      <label for="newsTitle">Title</label>
      <input type="text" class="form-control" id="newsTitle" placeholder="Enter news title (e.g., 🎉 New Player Signed: John Doe)">
    </div>
    
    <!-- News Subheading/Details -->
    <div class="form-group">
      <label for="newsDetail">Detail (e.g., Position: Midfielder)</label>
      <input type="text" class="form-control" id="newsDetail" placeholder="Enter additional details (e.g., Position: Midfielder)">
    </div>
    
    <!-- News Date -->
    <div class="form-group">
      <label for="newsDate">Date</label>
      <input type="date" class="form-control" id="newsDate">
    </div>
    
    <button type="submit" class="btn btn-primary">Post News</button>
  </form>
</div>

          <!-- Post Tickets Section -->
          <div id="postTicketsSection" class="section-container" style="display: none;">
            <h2>Post Tickets</h2>
            <form>
              <div class="form-group">
                <label for="ticketMatch">Match</label>
                <input type="text" class="form-control" id="ticketMatch" placeholder="Enter match (e.g., Team C vs. Team D)">
              </div>
              <div class="form-group">
                <label for="ticketDate">Date</label>
                <input type="date" class="form-control" id="ticketDate">
              </div>
              <div class="form-group">
                <label for="ticketPlace">Place</label>
                <input type="text" class="form-control" id="ticketPlace" placeholder="Enter place">
              </div>
              <div class="form-group">
                <label for="ticketPrice">Price</label>
                <input type="number" class="form-control" id="ticketPrice" placeholder="Enter price">
              </div>
              <button type="submit" class="btn btn-primary">Post Ticket</button>
            </form>
          </div>

          <!-- Post Store Items Section -->
          <div id="postItemsSection" class="section-container" style="display: none;">
            <h2>Post Store Items</h2>
            <form>
              <div class="form-group">
                <label for="itemName">Item Name</label>
                <input type="text" class="form-control" id="itemName" placeholder="Enter item name">
              </div>
              <div class="form-group">
                <label for="itemDescription">Description</label>
                <textarea class="form-control" id="itemDescription" rows="3" placeholder="Enter description"></textarea>
              </div>
              <div class="form-group">
                <label for="itemPrice">Price</label>
                <input type="number" class="form-control" id="itemPrice" placeholder="Enter price">
              </div>
              <div class="form-group">
                <label for="itemStock">Stock</label>
                <input type="number" class="form-control" id="itemStock" placeholder="Enter stock quantity">
              </div>
              <div class="form-group">
                <label for="itemImage">Image</label>
                <input type="file" class="form-control-file" id="itemImage">
              </div>
              <button type="submit" class="btn btn-primary">Post Item</button>
            </form>
          </div>
          <div id="managePurchasesSection" class="section-container" style="display: none;">
  <h2>Manage Purchases</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Purchase ID</th>
        <th>Client Name</th>
        <th>Items</th>
        <th>Total Price</th>
        <th>Date</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>John Doe</td>
        <td>Football Jersey, Match Ticket</td>
        <td>$70.00</td>
        <td>December 4, 2024</td>
        <td>
          <button class="btn btn-success btn-sm accept-purchase" data-id="1">Accept</button>
        </td>
      </tr>
      <!-- Add more rows dynamically here -->
    </tbody>
  </table>
</div>
        </div>
      </div>
    </div>
    
  </div>

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script>
  document.addEventListener('DOMContentLoaded', function () {
    const links = [
      'viewUsersLink',
      'postGamesLink',
      'postNewsLink',
      'postTicketsLink',
      'postItemsLink',
      'managePurchasesLink'
    ];
    const sections = [
      'viewUsersSection',
      'postGamesSection',
      'postNewsSection',
      'postTicketsSection',
      'postItemsSection',
      'managePurchasesSection'
    ];

    // Toggle sections
    links.forEach(function (link, index) {
      document.getElementById(link).addEventListener('click', function (e) {
        e.preventDefault();

        // Hide all sections
        sections.forEach(function (section) {
          document.getElementById(section).style.display = 'none';
        });

        // Show the selected section
        document.getElementById(sections[index]).style.display = 'block';

        // Update active class for menu items
        links.forEach(function (l) {
          document.getElementById(l).classList.remove('active');
        });
        document.getElementById(link).classList.add('active');
      });
    });
  });
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
