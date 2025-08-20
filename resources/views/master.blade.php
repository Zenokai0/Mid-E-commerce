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
          <input type="text" class="form-control" placeholder="What are you searching for?">
        </div>
      </div>

      <!-- Notification -->
      <button class="btn border-0 me-3" data-bs-toggle="modal" data-bs-target="#notificationModal">
        <i class="fa-regular fa-bell fs-5"></i>
      </button>

      <!-- Account -->
      <a href="#" class="btn border-0">
        <i class="fa-regular fa-user fs-5"></i>
      </a>
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
          <input class="form-check-input" type="radio" name="shopPreference" id="women">
          <label class="form-check-label" for="women">Women</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="shopPreference" id="men">
          <label class="form-check-label" for="men">Men</label>
        </div>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-dark w-100" data-bs-dismiss="modal">OK</button>
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
          <a href="#" class="btn btn-dark">Shop women</a>
          <a href="#" class="btn btn-dark">Shop men</a>
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
                    <img src="aba-pay.png" alt="ABA PAY" class="mr-2 mb-2" height="30">
                    <img src="visa.png" alt="Visa" class="mr-2 mb-2" height="30">
                    <img src="mastercard.png" alt="Mastercard" class="mr-2 mb-2" height="30">
                    <img src="unionpay.png" alt="UnionPay" class="mr-2 mb-2" height="30">
                    <img src="jcb.png" alt="JCB" class="mr-2 mb-2" height="30">
                    <img src="bank-transfer.png" alt="Bank Transfer" class="mr-2 mb-2" height="30">
                    <img src="cod.png" alt="Cash on Delivery" class="mr-2 mb-2" height="30">
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
</body>
@include('share.script')
<script>
    const {createApp} = Vue

    createApp({
        delimiters: ['[[', ']]'],
        data() {
            return {
                message: 'Hello Vue!',
                cart_list: []
            }
        },
        methods: {
            addToCart(product_id) {
                let url = '{{ route('addToCart') }}'
                $.LoadingOverlay("show");
                vm = this
                axios.post(url, {product_id: product_id})
                    .then(function (response) {
                        vm.cart_list = response.data.cart_list
                        let cart_count_label = document.getElementById('cart_count_label')
                        cart_count_label.innerText = (vm.cart_list).length
                        Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: "Your product has been add to cart",
                            showConfirmButton: false,
                            timer: 1500
                        });

                    })
                    .catch(function (error) {
                        console.log(error);
                    }).finally(function () {
                    $.LoadingOverlay("hide");
                });
            }
        }
    }).mount('#app')
</script>
</html>
