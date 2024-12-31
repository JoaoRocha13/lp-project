<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BigodeGrosso</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
  <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
<body class="home-page">
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
    
    <!-- Navbar Amarela -->
    <section class="slider_section position-relative">
      <div class="container">
        <div class="custom_nav2">
          <nav class="navbar navbar-expand-lg custom_nav-container">
            <!-- Botão Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item active"><a class="nav-link" href="#resultSection">Map</a></li>
                <li class="nav-item"><a class="nav-link" href="#aboutSection">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#serviceSection">Tickets</a></li>
                <li class="nav-item"><a class="nav-link" href="#clientsection">Comments</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('store') }}">Store</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section id="aboutSection" class="about_section layout_padding">
      <div class="container">
        <div class="heading_container">
          <h2>Bigode Grosso FC</h2>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="{{ asset('images/icon.png') }}" alt="">
          </div>
          <div class="detail-box">
            <a href="{{ route('about') }}">Read More</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Games Section -->
    <section id="gamesSection" class="games_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>Upcoming Games</h2>
        </div>
        <div class="row">
            @forelse($games as $game)
            <div class="col-md-4 mb-4">
                <div class="card p-3 shadow-sm">
                    <h5 class="text-center">{{ $game->team_a }} vs {{ $game->team_b }}</h5>
                    <p class="text-center text-muted">{{ \Carbon\Carbon::parse($game->game_date)->format('d M, Y - H:i') }}</p>
                    <p class="text-center">Location: {{ $game->local }}</p>
                    <p class="text-center">Tickets: {{ $game->tickets_available }}</p>
                    <button 
                        class="btn btn-primary mt-2 add_to_cart_btn" 
                        data-id="{{ $game->id }}" 
                        data-price="{{ $game->ticket_price }}">
                        Buy Ticket
                    </button>
                </div>
            </div>
            @empty
            <p class="text-center">No upcoming games available.</p>
            @endforelse
        </div>
        <div id="pagination-links" style="text-align: center;">
          {{ $games->links('pagination::bootstrap-4') }}
      </div>
    </div>
</section>

    <!-- Result Section -->
    <section id="resultSection" class="result_section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="map_container">
          <div class="map-responsive">
            <iframe 
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.524402799665!2d-34.9247716902675!3d-8.149800865357298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7aae188fe3e6c31%3A0x856b8e019ffe763!2sCampo%20De%20Futebol%20Dos%20Guararapes!5e0!3m2!1sen!2sus!4v1732291246630!5m2!1sen!2sus" 
              frameborder="0" 
              style="border:0; width: 100%; height: 100%;" 
              allowfullscreen>
            </iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
   <!-- Comments Section -->
<section id="clientsection" class="client_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>What Says Our Customers</h2>
        </div>
        <div class="row">
            @if(isset($comments) && $comments->isNotEmpty())
                @foreach($comments as $comment)
                    <div class="col-md-4 mb-4">
                        <div class="card p-3 shadow-sm">
                            <div class="text-center mb-3">
                                @if($comment->user && $comment->user->profile_photo)
                                    <img src="{{ asset('storage/' . $comment->user->profile_photo) }}" 
                                         alt="{{ $comment->user->name }}" 
                                         class="rounded-circle" 
                                         style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/profile.png') }}" 
                                         alt="Default Profile" 
                                         class="rounded-circle" 
                                         style="width: 60px; height: 60px; object-fit: cover;">
                                @endif
                            </div>
                            <h5 class="text-center">{{ $comment->user->name }}</h5>
                            <p class="text-muted text-center">{{ $comment->created_at->format('d M, Y') }}</p>
                            <p class="text-center">{{ $comment->message }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center">No comments available.</p>
            @endif
        </div>
    </div>
</section>

    <!-- Contact Section -->
    <!-- Contact Section -->
<section id="contactSection" class="contact_section">
  <div class="heading_container">
    <h2>Leave a comment</h2>
  </div>
  <div class="contact_form-container">
    <form action="{{ route('comments.store') }}" method="POST">
      @csrf
      <textarea name="message" placeholder="Message" required></textarea>
      <button type="submit">Send</button>
    </form>
    @if(session('success'))
      <p class="text-success">{{ session('success') }}</p>
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
            <span> bigodegrossofc@gmail.com</span>
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
    </div>
</body>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function () {
    // Listener para adicionar bilhetes ao carrinho
    $(document).on('click', '.add_to_cart_btn', function (e) {
        e.preventDefault(); // Previne o comportamento padrão

        const gameId = $(this).data('id');
        const ticketPrice = $(this).data('price');
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Verifica se os dados estão presentes
        if (!gameId || !ticketPrice) {
            Swal.fire({
                title: 'Erro!',
                text: 'Dados do bilhete inválidos.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return;
        }

        $.ajax({
            url: "{{ route('cart.add') }}",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                game_id: gameId,
                ticket_price: ticketPrice
            },
            success: function (response) {
                console.log(response); // Debug
                Swal.fire({
                    title: 'Sucesso!',
                    text: 'Bilhete adicionado ao carrinho com sucesso!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            },
            error: function (xhr) {
                console.error(xhr.responseText); // Debug
                Swal.fire({
                    title: 'Erro!',
                    text: 'Ocorreu um erro ao adicionar o bilhete ao carrinho.',
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
