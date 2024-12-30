<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>User Profile</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
</head>

<body class="sub_page profile-page">
<div class="hero_area">

<!-- Header Section -->
<header class="header_section">
  <div class="container">
    <nav class="navbar navbar-expand-lg custom_nav-container">
      <!-- Logo e Título -->
      <a class="navbar-brand" href="{{ route('home') }}">
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

        <!-- Botão de Carrinho -->
        <a href="{{ route('checkout') }}" class="cart-button">
          <img src="{{ asset('images/cart-icon.png') }}" alt="Cart" style="width: 40px; height: 40px;">
        </a>
      </div>
    </nav>
  </div>
</header>
</div>


    <!-- Profile Section -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div id="profileContent" class="section-container">
            <h2>User Profile</h2>
            <div class="user-details">
              <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
              <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
              <p><strong>Role:</strong> {{ auth()->user()->role ?? 'Not specified' }}</p>
              <div class="update-photo-section mt-4">
                <form action="{{ route('profile.photo.update') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center">
                  @csrf
                  <label for="profile_photo" class="me-3 mb-0">
                    <span class="btn btn-secondary">Choose Photo</span>
                    <input type="file" id="profile_photo" name="profile_photo" accept="image/*" style="display: none;" onchange="previewImage(event)">
                  </label>
                  <div class="photo-preview">
                    <img id="preview" src="{{ auth()->user()->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : asset('images/profile.png') }}" 
                         alt="Preview" class="rounded-circle border">
                  </div>
                  <button type="submit" class="btn btn-primary ms-3">Update</button>
                </form>
              </div>
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

            <div class="logout-section mt-4">
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function previewImage(event) {
      const input = event.target;
      const reader = new FileReader();
      reader.onload = function () {
        const preview = document.getElementById('preview');
        preview.src = reader.result;
        preview.style.display = 'block';
      };
      if (input.files && input.files[0]) {
        reader.readAsDataURL(input.files[0]);
      }
    }

  </script>
</body>

</html>
