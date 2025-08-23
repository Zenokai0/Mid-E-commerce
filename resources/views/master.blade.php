<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  @include('share.style')
</head>

<body>
  <div id="app">
    {{--navbar--}}
    <nav class="navbar navbar-expand-lg bg-light border-bottom">
      <div class="container-fluid d-flex justify-content-between align-items-center">

        <!-- Left: Hamburger / Shop Preference -->
        <button class="btn border-0" data-bs-toggle="modal" data-bs-target="#shopPreferenceModal">
          <i class="fa-solid fa-bars fs-4"></i>
        </button>

        <!-- Center: Logo -->
        <a class="navbar-brand fw-bold fs-4" href="/">TEN·ELEVEN</a>

        <!-- Right: Icons -->
        <div class="d-flex align-items-center">
          <!-- Search -->
          <div class="dropdown me-3">
            <button class="btn border-0" id="searchDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-magnifying-glass fs-5"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end p-3" style="min-width: 250px;">
              <form action="{{ route('search') }}" method="GET">
                <input type="text" name="query" class="form-control" placeholder="What are you searching for?" value="{{ request('query') }}">
              </form>
            </div>
          </div>

          <!-- Notification -->
          <button class="btn border-0 me-3" data-bs-toggle="modal" data-bs-target="#notificationModal">
            <i class="fa-regular fa-bell fs-5"></i>
          </button>

          <!-- Cart -->
          <a href="/cart" class="btn border-0 me-3 d-flex align-items-center position-relative">
            <i class="fa-solid fa-cart-shopping fs-5"></i>
            <span id="cart_count_label" class="cart-count ms-1 badge bg-danger rounded-pill position-absolute translate-middle" style="top:2px; left:35px">0</span>

          </a>

          <!-- Account -->
          <!-- Account Dropdown -->
          <div class="dropdown me-3">
            <button class="btn border-0" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-regular fa-user fs-5"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              @if(Auth::check())
              <li>
                <p class="dropdown-item w-100 text-start">{{ Auth::user()->name }}</p>
              </li>
              <li>
                <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item w-100 text-start">Logout</button> <!-- Logout Button -->
                </form>
              </li>
              @else
              <li>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#authModal" data-tab="login">Login</a>
              </li>
              <li>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#authModal" data-tab="register">Register</a>
              </li>
              @endif
            </ul>
          </div>


          <!-- Auth Modal -->
          <div class="modal fade" id="authModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content p-0">
                <!-- Tabs + Close aligned at top -->
                <div class="d-flex justify-content-between align-items-center border-bottom px-3 pt-2">
                  <ul class="nav nav-tabs" id="authTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab">Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab">Register</button>
                    </li>
                  </ul>
                  <button type="button" class="btn-close ms-3" data-bs-dismiss="modal"></button>
                </div>

                <!-- Tab Content -->
                <div class="tab-content p-3">
                  <div class="tab-pane fade" id="login" role="tabpanel" aria-labelledby="login-tab">
                    <form action="{{ route('login') }}" method="POST">
                      @csrf

                      @if(session('login_error'))
                      <div class="alert alert-danger">{{ session('login_error') }}</div>
                      @endif

                      <div class="mb-3">
                        <label for="loginName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="loginName" name="name" value="{{ old('name') }}" required>
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginPassword" name="password" required>
                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>

                      <button type="submit" class="btn btn-dark w-100">Login</button>
                    </form>
                  </div>

                  <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                    <form action="{{ route('register') }}" method="POST">
                      @csrf

                      @if(session('register_error'))
                      <div class="alert alert-danger">{{ session('register_error') }}</div>
                      @endif

                      <div class="mb-3">
                        <label for="registerName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="registerName" name="name" value="{{ old('name') }}" required>
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label for="registerPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="registerPassword" name="password" required>
                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label for="registerPasswordConfirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="registerPasswordConfirmation" name="password_confirmation" required>
                      </div>

                      <button type="submit" class="btn btn-dark w-100">Register</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <!-- Shop Preference Modal -->
    <div class="modal fade" id="shopPreferenceModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
          <div class="modal-header border-0">
            <h5 class="modal-title">Shop Preference</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <p>Select a category you prefer. You can change this later in the settings.</p>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="shopPreference" id="women" value="women">
              <label class="form-check-label" for="women">Women</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="shopPreference" id="men" value="men">
              <label class="form-check-label" for="men">Men</label>
            </div>
          </div>
          <div class="modal-footer border-0">
            <button type="button" id="shopPrefOk" class="btn btn-dark w-100" data-bs-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Notification Modal -->
    <div class="modal fade" id="notificationModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
          <div class="modal-header border-0">
            <h5 class="modal-title">Notification</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body text-center">
            <p class="fw-bold">Your notification is empty!</p>
            <p class="text-muted">Check out our latest arrivals to stay up-to-date with the latest styles</p>
            <p>Start shopping</p>
            <div class="d-flex justify-content-center gap-2">
              <a href="/women" class="btn btn-dark">Shop women</a>
              <a href="/men" class="btn btn-dark">Shop men</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap 5 + Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">


    {{--main content--}}
    @yield('content')

    {{--footer--}}
    <footer class="bg-dark text-white mt-5 pt-4 pb-2">
      <div class="container">
        <div class="row">

          <!-- TEN11 App Section -->
          <div class="col-md-3 mb-4">
            <h6 class="text-uppercase">TEN11 App</h6>
            <p><i class="fa fa-mobile mr-2"></i> iOS App</p>
            <p><i class="fa fa-mobile mr-2"></i> Android App</p>
          </div>

          <!-- Follow Us Section -->
          <div class="col-md-3 mb-4">
            <h6 class="text-uppercase">Follow Us</h6>
            <p><i class="fab fa-facebook mr-2"></i> Facebook</p>
            <p><i class="fab fa-instagram mr-2"></i> Instagram</p>
            <p><i class="fab fa-tiktok mr-2"></i> TikTok</p>
            <p><i class="fab fa-telegram mr-2"></i> Telegram</p>
          </div>

          <!-- Customer Service Section -->
          <div class="col-md-3 mb-4">
            <h6 class="text-uppercase">Customer Services</h6>
            <p><i class="fa fa-question-circle mr-2"></i> Online exchange policy</p>
            <p><i class="fa fa-shield-alt mr-2"></i> Privacy Policy</p>
            <p><i class="fa fa-comments mr-2"></i> FAQs & guides</p>
            <p><i class="fa fa-info-circle mr-2"></i> About Us</p>
            <p><i class="fa fa-map-marker-alt mr-2"></i> Find a store</p>
          </div>

          <!-- We Accept Section -->
          <div class="col-md-3 mb-4">
            <h6 class="text-uppercase">We Accept</h6>
            <div class="d-flex flex-wrap">
              <img src="/images/aba.png" alt="ABA PAY" class="mr-2 mb-2" height="30">
              <img src="/images/visa.png" alt="Visa" class="mr-2 mb-2" height="30">
              <img src="/images/mastercard.png" alt="Mastercard" class="mr-2 mb-2" height="30">
              <img src="/images/union.png" alt="UnionPay" class="mr-2 mb-2" height="30">
              <img src="/images/jcb.png" alt="JCB" class="mr-2 mb-2" height="30">
              <img src="/images/banktransfer.png" alt="Bank Transfer" class="mr-2 mb-2" height="30">
              <img src="/images/ondelivery.png" alt="Cash on Delivery" class="mr-2 mb-2" height="30">
            </div>
          </div>

        </div>

        <hr class="border-top border-secondary">

        <!-- Footer Bottom -->
        <div class="text-center text-white-50">
          Powered By TEN11 © 2025
        </div>
      </div>
    </footer>
  </div>
  <!-- Toast container -->
  <div class="position-fixed top-0 end-0 p-3" style="z-index:1100">
    <div id="appToast" class="toast align-items-center text-bg-dark border-0" role="status" aria-live="polite" aria-atomic="true" data-bs-delay="1500">
      <div class="d-flex">
        <div class="toast-body">...</div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
      </div>
    </div>
  </div>

</body>
@include('share.script')
<script>
  window.loggedIn = @json(Auth::check());
</script>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    // If loggedIn is a string 'true'/'false', convert to boolean
    const loggedIn = window.loggedIn === 'true';
    const cartCountEl = document.getElementById("cart_count_label");

    // Load cart from localStorage if exists
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    // Update cart badge
    cartCountEl.textContent = cart.length;

    window.addToCart = function(item, qty = 1) {
      if (!window.loggedIn) {
        showToast("Please login to add items to your cart.");
        const modalEl = document.getElementById('authModal');
        if (modalEl) {
          const modal = new bootstrap.Modal(modalEl);
          modal.show();
          document.getElementById("login-tab")?.click();
        }
        return;
      }

      let cart = JSON.parse(localStorage.getItem("cart")) || [];
      const addQty = Number(qty) > 0 ? Number(qty) : 1;

      const index = cart.findIndex(i => i.id === item.id);
      if (index > -1) {
        cart[index].qty = Number(cart[index].qty || 0) + addQty;
      } else {
        cart.push({
          id: item.id,
          name: item.name,
          price: item.price,
          category: item.category,
          image: item.image,
          description: item.description,
          qty: addQty
        });
      }

      localStorage.setItem("cart", JSON.stringify(cart));
      document.getElementById("cart_count_label").textContent = cart.length;
      showToast("Added to cart");
    };


    function showToast(message) {
      const toastEl = document.getElementById("appToast");
      toastEl.querySelector(".toast-body").textContent = message;
      new bootstrap.Toast(toastEl).show();
    }
  });

  document.getElementById('shopPrefOk').addEventListener('click', function() {
    const selected = document.querySelector('input[name="shopPreference"]:checked');
    if (selected) {
      if (selected.value === 'women') {
        window.location.href = '/women';
      } else if (selected.value === 'men') {
        window.location.href = '/men';
      }
    } else {
      alert('Please select a preference first.');
    }
  });
  const authModal = document.getElementById('authModal')
  authModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget
    const tab = button.getAttribute('data-tab') // "login" or "register"

    // Remove active from all nav links
    const navLinks = authModal.querySelectorAll('.nav-link')
    navLinks.forEach(link => link.classList.remove('active'))

    // Remove active/show from all tab panes
    const panes = authModal.querySelectorAll('.tab-pane')
    panes.forEach(pane => pane.classList.remove('active', 'show'))

    // Activate correct nav link
    const navLink = document.getElementById(tab + '-tab')
    navLink.classList.add('active')

    // Activate correct tab pane
    const pane = document.getElementById(tab)
    pane.classList.add('active', 'show')
  })

  document.getElementById('logoutForm').addEventListener('submit', () => {
    // Clear client-side cart
    localStorage.removeItem('cart'); // or whatever key you use
    const cartCountEl = document.getElementById("cart_count_label");
    if (cartCountEl) cartCountEl.textContent = 0;
  });
</script>

</html>