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
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="sub_page checkout-page">
  @if (session('success'))
  <div style="color: green; border: 2px green solid; text-align: center; padding: 5px; margin-bottom: 10px;">
    Pagamento realizado com sucesso!
  </div>
  @endif
  @if (session('error'))
  <div style="color: red; border: 2px red solid; text-align: center; padding: 5px; margin-bottom: 10px;">
    {{ session('error') }}
  </div>
  @endif

  <div class="hero_area">
    <!-- Header Section -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/icon.png') }}" alt="Logo" style="width: 75px; height: 50px;" />
            <span>Bigode Grosso FC</span>
          </a>
          <div class="navbar-icons d-flex align-items-center">
            @if(auth()->check())
            @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin') }}">
              <button id="admin-tools-button" class="btn btn-secondary me-2">Admin Tools</button>
            </a>
            @endif
            <a href="{{ route('profile') }}">
              <button id="profile-button" class="profile-button">
                <img src="{{ auth()->user()->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : asset('images/profile.png') }}" 
                     alt="Profile" 
                     class="rounded-circle" 
                     style="width: 40px; height: 40px; object-fit: cover;">
              </button>
            </a>
            @else
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
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php $total = 0; @endphp
              @foreach ($cart as $itemKey => $item)
              @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
              <tr>
                <td>{{ $item['name'] }}</td>
                <td>
                  <input type="number" class="quantity-input" data-key="{{ $itemKey }}" value="{{ $item['quantity'] }}" min="1" required style="width: 60px;">
                </td>
                <td>€{{ number_format($item['price'], 2, ',', '.') }}</td>
                <td>€{{ number_format($subtotal, 2, ',', '.') }}</td>
                <td>
                  <button class="btn btn-danger remove-product-btn" data-key="{{ $itemKey }}" style="padding: 5px 10px;">Remover</button>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th colspan="3" class="text-right">Total</th>
                <th colspan="2">€{{ number_format($total, 2, ',', '.') }}</th>
              </tr>
            </tfoot>
          </table>
        </div>

        <!-- Checkout Form -->
        <div class="col-md-6">
          <h4>Shipping Address</h4>
          <form action="{{ route('checkout.process') }}" method="POST" id="checkout-form">
            @csrf
            <input type="hidden" id="stripe-token-id" name="stripeToken">
            <input type="hidden" name="amount" value="{{ $total }}">
            <input type="hidden" name="cart" value='{{ json_encode($cart) }}'>
            <div class="form-group">
              <label for="localidade">Localidade</label>
              <input type="text" class="form-control" id="localidade" name="localidade" placeholder="Digite a sua localidade" required>
            </div>
            <div class="form-group mt-3">
            <label for="codigo-postal">Código Postal</label>
              <input type="text" class="form-control" id="codigo-postal" name="codigo_postal" placeholder="1234-567" 
                      pattern="\d{4}-\d{3}" title="O código postal deve estar no formato 1234-567" required>
            </div>
            <div class="form-group mt-4">
              <label for="telefone">Número de Telefone</label>
              <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite o seu número de telefone" 
                      pattern="^\+?[0-9]{9,15}$" 
                      title="O número de telefone deve ter entre 9 e 15 dígitos e pode começar com +." required>
            </div>
            <h4>Payment Information</h4>
            <div class="mb-3">
              <label for="card-element" class="form-label">Dados do Cartão</label>
              <div id="card-element" style="border: 1px solid #ced4da; padding: 10px; border-radius: 4px;"></div>
              <div id="card-errors" role="alert" style="color: red; margin-top: 10px;"></div>

            </div>
            <button type="button" id="pay-btn" class="btn btn-primary btn-block mt-3" onclick="createToken()">Confirm Purchase</button>
          </form>
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>


    <script>
      $(document).ready(function () {
        // Atualizar quantidade
        $(document).on('change', '.quantity-input', function () {
          const itemKey = $(this).data('key');
          const quantity = $(this).val();
          const csrfToken = $('meta[name="csrf-token"]').attr('content');

          if (quantity < 1) {
            alert('A quantidade não pode ser menor que 1.');
            $(this).val(1);
            return;
          }

          $.ajax({
            url: "{{ route('cart.update') }}",
            method: "POST",
            headers: {
              'X-CSRF-TOKEN': csrfToken
            },
            data: {
              item_key: itemKey,
              quantity: quantity
            },
            success: function (response) {
              const updatedCart = response.cart;
              let total = 0;

              for (const key in updatedCart) {
                const item = updatedCart[key];
                const itemSubtotal = item.price * item.quantity;
                $(`input[data-key="${key}"]`).closest('tr').find('td:nth-child(4)').text(`€${itemSubtotal.toFixed(2)}`);
                total += itemSubtotal;
              }

              $('tfoot th:last-child').text(`€${total.toFixed(2)}`);
            },
            error: function (xhr) {
              console.error(xhr.responseText);
              alert('Erro ao atualizar a quantidade.');
            }
          });
        });

        // Remover item
        $(document).on('click', '.remove-product-btn', function () {
          const itemKey = $(this).data('key');
          const csrfToken = $('meta[name="csrf-token"]').attr('content');

          if (!confirm('Tem certeza de que deseja remover este item do carrinho?')) {
            return;
          }

          $.ajax({
            url: "{{ route('cart.remove') }}",
            method: "POST",
            headers: {
              'X-CSRF-TOKEN': csrfToken
            },
            data: {
              item_key: itemKey
            },
            success: function (response) {
              $(`button[data-key="${itemKey}"]`).closest('tr').remove();
              let total = 0;
              for (const key in response.cart) {
                const item = response.cart[key];
                total += item.price * item.quantity;
              }
              $('tfoot th:last-child').text(`€${total.toFixed(2)}`);
            },
            error: function (xhr) {
              console.error(xhr.responseText);
              alert('Erro ao remover o item.');
            }
          });
        });
      });

      /* Stripe Payment */
      console.log("Stripe key:", "{{ config('app.stripe_key') }}");
      // Inicializa o Stripe
var stripe = Stripe("{{ config('app.stripe_key') }}");
var elements = stripe.elements();
var card = elements.create('card', {
    style: {
        base: {
            fontSize: '16px',
            color: '#32325d',
        },
        invalid: {
            color: '#fa755a',
        },
    },
});

// Monta o elemento do cartão
card.mount('#card-element');

// Escuta erros no elemento do cartão
card.on('change', function (event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
        displayError.textContent = event.error.message;
    } else {
        displayError.textContent = '';
    }
});

// Cria o token no envio do formulário
function createToken() {
    document.getElementById("pay-btn").disabled = true;

    stripe.createToken(card).then(function (result) {
        if (result.error) {
            document.getElementById("card-errors").textContent = result.error.message;
            document.getElementById("pay-btn").disabled = false;
        } else {
            document.getElementById("stripe-token-id").value = result.token.id;
            document.getElementById("checkout-form").submit();
        }
    });
}

    </script>
</body>

</html>
