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

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <title>Store</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" /></head>

<body class="sub_page">
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

            <!-- Botão de Carrinho -->
            <a href="{{ route('checkout') }}" class="cart-button">
              <img src="{{ asset('images/cart-icon.png') }}" alt="Cart" style="width: 40px; height: 40px;">
            </a>
          </div>
        </nav>
      </div>
    </header>
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
  @foreach ($products as $product)
  <div class="col-md-3 product_card" style="background: #fff; border-radius: 10px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">
    @if($product->image)
      <div class="product_image" style="height: 150px; margin-bottom: 10px;">
        <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: contain;">
      </div>
    @else
      <div class="product_image_placeholder" style="height: 150px; background: #ddd; display: flex; align-items: center; justify-content: center; margin-bottom: 10px;">
        <span style="color: #888; font-size: 14px;">No Image Available</span>
      </div>
    @endif
    <h5 style="color: #555; font-weight: bold; font-size: 18px;">{{ $product->name }}</h5>
    <p style="color: #777; font-size: 14px;">€{{ number_format($product->price, 2, ',', '.') }}</p>
    <button class="add_to_cart_btn" data-id="{{ $product->id }}" style="padding: 10px 15px; background: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">Add to Cart</button>
  </div>
  @endforeach
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

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
 $(document).ready(function () {
    $(document).on('click', '.add_to_cart_btn', function () {
        const productId = $(this).data('id');
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "{{ route('cart.add') }}",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                product_id: productId
            },
            success: function (response) {
                Swal.fire({
                    title: 'Sucesso!',
                    text: 'Item adicionado ao carrinho com sucesso!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            },
            error: function (xhr) {
                Swal.fire({
                    title: 'Erro!',
                    text: 'Ocorreu um erro ao adicionar o item ao carrinho.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});


</script>
  
</body>

</html>