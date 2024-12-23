<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Dashboard</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
</head>

<body class="sub_page admin-page">
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
            <img src="{{ asset('images/product1.jpg') }}" alt="Product">
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
        <button class="checkout-btn">Checkout</button>
      </div>
    </div>

    <!-- Admin Dashboard Layout -->
    <div class="container-fluid">
      <div class="row">

        <!-- Sidebar -->
        <div class="col-md-3" id="adminSidebar">
          <h4>Admin Menu</h4>
          <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="#" id="viewUsersLink">View Users</a></li>
            <li class="nav-item"><a class="nav-link" href="#" id="postPreviousGamesLink">Post Previous Games</a></li>
            <li class="nav-item"><a class="nav-link" href="#" id="postNewsLink">Post News</a></li>
            <li class="nav-item"><a class="nav-link" href="#" id="postGamesLink">Post Games</a></li>
            <li class="nav-item"><a class="nav-link" href="#" id="postItemsLink">Post Store Items</a></li>
            <li class="nav-item"><a class="nav-link" href="#" id="managePurchasesLink">Manage Purchases</a></li>
          </ul>
        </div>

        <!-- Main Content Area -->
        <div class="col-md-9">
          <div id="adminContent">

            @if(session('success'))
              <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
              <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- View Users Section -->
            <div id="viewUsersSection" class="section-container" style="display: none;">
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
                  @foreach($users as $user)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->role }}</td>
                      <td>
                        @if($user->role !== 'admin')
                          <form action="{{ route('admin.promote', $user->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-primary btn-sm">Promote</button>
                          </form>
                        @else
                          <span class="text-muted">Already Admin</span>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

<!-- Section for listing and removing Previous Games -->
<div id="postPreviousGamesSection" class="section-container" style="display: none;">
    <h2>Post Previous Games</h2>
    <form action="{{ route('admin.previousGames') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="teamA">Team A Name</label>
            <input type="text" class="form-control" name="team_a" id="teamA" placeholder="Enter Team A name" required>
        </div>
        <div class="form-group">
            <label for="teamAImage">Team A Image</label>
            <input type="file" class="form-control-file" name="team_a_logo" id="teamAImage" required>
        </div>
        <div class="form-group">
            <label for="teamB">Team B Name</label>
            <input type="text" class="form-control" name="team_b" id="teamB" placeholder="Enter Team B name" required>
        </div>
        <div class="form-group">
            <label for="teamBImage">Team B Image</label>
            <input type="file" class="form-control-file" name="team_b_logo" id="teamBImage" required>
        </div>
        <div class="form-group">
            <label for="scoreA">Team A Score</label>
            <input type="number" class="form-control" name="score_a" id="scoreA" placeholder="0" required>
        </div>
        <div class="form-group">
            <label for="scoreB">Team B Score</label>
            <input type="number" class="form-control" name="score_b" id="scoreB" placeholder="0" required>
        </div>
        <div class="form-group">
            <label for="gameDate">Date</label>
            <input type="date" class="form-control" name="game_date" id="gameDate" required>
        </div>
        <button type="submit" class="btn btn-primary">Post Game</button>
    </form>
    
    <h3>List Previous Games</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Game ID</th>
                <th>Teams</th>
                <th>Score</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($previousGames as $game)
                <tr>
                    <td>{{ $game->id }}</td>
                    <td>{{ $game->team_a }} vs. {{ $game->team_b }}</td>
                    <td>{{ $game->score_a }} - {{ $game->score_b }}</td>
                    <td>{{ $game->game_date }}</td>
                    <td>
                        <form action="{{ route('admin.previousGames.delete', $game->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No previous games found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<!-- Post News Section -->
<div id="postNewsSection" class="section-container" style="display: none; margin: 0; padding: 0;">
    <h2 style="margin: 0 0 20px; text-align: center;">Post News</h2>
    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" style="margin: 0;">
        @csrf
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="newsTitle">Title</label>
            <input type="text" class="form-control" id="newsTitle" name="title" placeholder="Enter news title" required>
        </div>
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="newsDetail">Description</label>
            <textarea class="form-control" id="newsDetail" name="description" rows="4" placeholder="Enter news description" required></textarea>
        </div>
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="newsDate">Date</label>
            <input type="date" class="form-control" id="newsDate" name="date" required>
        </div>
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="newsImage">Image</label>
            <input type="file" class="form-control-file" id="newsImage" name="news_image">
        </div>
        <button type="submit" class="btn btn-primary" style="margin-bottom: 20px;">Post News</button>
    </form>
    <h3 style="margin: 0 0 20px; text-align: center;">List News</h3>
    <table class="table table-striped" style="margin: 0; padding: 0; width: 100%; border-spacing: 0; border-collapse: collapse;">
        <thead style="background-color: #f8f9fa;">
            <tr>
                <th style="padding: 10px; text-align: left;">News ID</th>
                <th style="padding: 10px; text-align: left;">Title</th>
                <th style="padding: 10px; text-align: left;">Description</th>
                <th style="padding: 10px; text-align: left;">Date</th>
                <th style="padding: 10px; text-align: left;">Image</th>
                <th style="padding: 10px; text-align: left;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($news as $newsItem)
                <tr>
                    <td style="padding: 10px;">{{ $newsItem->id }}</td>
                    <td style="padding: 10px;">{{ $newsItem->title }}</td>
                    <td style="padding: 10px;">{{ $newsItem->description }}</td>
                    <td style="padding: 10px;">{{ $newsItem->date }}</td>
                    <td style="padding: 10px;">
                        @if($newsItem->image)
                            <img src="{{ asset('storage/images/' . $newsItem->image) }}" alt="News Image" style="width: 100px; height: auto; display: block; margin: auto;">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>
                    <td style="padding: 10px;">
                        <form action="{{ route('admin.news.delete', $newsItem->id) }}" method="POST" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 10px;">No news found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Games Section -->
<div id="postGamesSection" class="section-container" style="display: none;">
  <h2>Post Games</h2>
  @csrf
  <form action = "{{ route('games.store') }}" method="POST">
    <div class="form-group">
      <label for="teamA">Team A</label>
      <input type="text" class="form-control" id="teamA" name="team_a" placeholder="Enter team A" required>
    </div>
    <div class="form-group">
      <label for="teamB">Team B</label>
      <input type="text" class="form-control" id="teamB" name="team_b" placeholder="Enter team B" required>
    </div>
    <div class="form-group">
      <label for="gameDate">Date e Hora</label>
      <input type="datetime-local" class="form-control" id="gameDate" name="game_date" required>
    </div>
    <div class="form-group">
      <label for="place">Place</label>
      <input type="text" class="form-control" id="place" name="place" placeholder="Enter place" required>
    </div>
    <div class="form-group">
      <label for="Price">Price</label>
      <input type="number" class="form-control" id="price" name="price" placeholder="Enter price" required>
    </div>
    <div class="form-group">
      <label for="tickets">Tickets</label>
      <input type="intiger" class="form-control" id="tickets" name="tickets" placeholder="Enter number of tickets" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <h3>List Games</h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Match</th>
        <th>Date</th>
        <th>Place</th>
        <th>Price</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
          @forelse($games as $game)
          <td>{{ $game->team_a }} vs. {{ $game->team_b }}</td>
          <td>{{ $game->game_date }}</td>
          <td>{{ $game->place }}</td>
          <td>{{ $game->price }}</td>
          <td>{{ $game->tickets }}</td>          
      </tr>
      @empty
        <tr>
          <td colspan="5">No games found.</td>
        </tr>
          @endforelse
    </tbody>
  </table>
</div>

<!-- Post Store Items Section -->
<div id="postItemsSection" class="section-container"  style="display: none;">
  <h2>Post Store Items</h2>
  <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="name">Product Name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" required>
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter product description"></textarea>
    </div>
    <div class="form-group">
      <label for="price">Price</label>
      <input type="number" class="form-control" id="price" name="price" placeholder="Enter product price" step="0.01" required>
    </div>
    <!-- Campo para Stock -->
    <div class="form-group">
      <label for="stock">Stock</label>
      <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter stock quantity" required>
    </div>
    <!-- Campo para imagem do produto -->
    <div class="form-group">
      <label for="image">Product Image</label>
      <input type="file" class="form-control-file" name="image" id="image" accept="image/*">
    </div>
    
    <button type="submit" class="btn btn-primary">Add Product</button>
</form>

  <!-- Table for Product List -->
  <h3 class="mt-5">Product List</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Image</th>
            <!-- Nova coluna para Actions -->
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
        <tr>
          <td>{{ $product->id }}</td>
          <td>{{ $product->name }}</td>
          <td>{{ $product->description }}</td>
          <td>{{ $product->price }}</td>
          <td>{{ $product->stock }}</td>
          <td>
            @if($product->image)
                <img src="{{ asset('storage/images/' . $product->image) }}" alt="Product Image" style="width: 100px; height: auto; display: block; margin: auto;">
            @else
                <span>No Image</span>
            @endif
          </td>
          <td>
            <form action="{{ route('admin.products.delete', $product->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Remove</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
</table>
</div>


<!-- Manage Purchases Section -->
<div id="managePurchasesSection" class="section-container" style="display: none;" >
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
        <td>2024-12-04</td>
        <td>
          <button class="btn btn-success btn-sm accept-purchase" data-id="1">Accept</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</div>
</div>
</div>
</div>

  <!-- Scripts -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const links = [
        'viewUsersLink', 'postPreviousGamesLink', 'postNewsLink', 'postGamesLink', 'postItemsLink', 'managePurchasesLink'
      ];
      const sections = [
        'viewUsersSection', 'postPreviousGamesSection', 'postNewsSection', 'postGamesSection', 'postItemsSection', 'managePurchasesSection'
      ];

      links.forEach(function (link, index) {
        const linkElement = document.getElementById(link);
        const sectionElement = document.getElementById(sections[index]);

        if (linkElement && sectionElement) {
          linkElement.addEventListener('click', function (e) {
            e.preventDefault();

            sections.forEach(function (section) {
              const sectionToHide = document.getElementById(section);
              if (sectionToHide) {
                sectionToHide.style.display = 'none';
              }
            });

            sectionElement.style.display = 'block';
          });
        }
      });
    });

    const cartButton = document.getElementById('cart-button');
    const cartSlideout = document.getElementById('cart-slideout');
    const closeCartButton = document.getElementById('close-cart');

    cartButton.addEventListener('click', function () {
      cartSlideout.classList.add('open');
    });

    closeCartButton.addEventListener('click', function () {
      cartSlideout.classList.remove('open');
    });
  </script>
</body>

</html>
