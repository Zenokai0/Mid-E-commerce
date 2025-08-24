@extends('master')

@section('title')
Checkout
@endsection

@section('content')
<div class="container my-5">
    <h2 class="mb-5 text-center fw-bold text-gradient" style="background: linear-gradient(45deg, #007cf0, #00dfd8); -webkit-background-clip: text; color: transparent;">
        🧾 Checkout
    </h2>
    <div class="row gx-5 justify-content-center">

        <!-- Billing Form -->
        <div class="col-lg-7">
            <div class="card border rounded-3 shadow-sm p-5 bg-white">
                <h4 class="mb-4 fw-semibold text-secondary">Billing Details</h4>
                <form id="checkoutForm" novalidate>
                    <div class="mb-4">
                        <label for="fullname" class="form-label fw-semibold fs-6">Full Name</label>
                        <input type="text" class="form-control form-control-lg rounded-3" id="fullname" placeholder="your name" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold fs-6">Email Address</label>
                        <input type="email" class="form-control form-control-lg rounded-3" id="email" placeholder="youremail@gmail.com" required>
                    </div>
                    <div class="mb-4">
                        <label for="address" class="form-label fw-semibold fs-6">Shipping Address</label>
                        <input type="text" class="form-control form-control-lg rounded-3" id="address" placeholder="address" required>
                    </div>

                    <h5 class="fw-semibold mb-3 mt-5 text-secondary">Payment Method</h5>
                    <div class="mb-4">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="payment" id="cod" value="cod" checked>
                            <label class="form-check-label fw-medium" for="cod">Cash on Delivery</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="credit" value="credit">
                            <label class="form-check-label fw-medium" for="credit">Credit Card</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-gradient w-100 py-3 rounded-pill fw-bold fs-5 shadow-sm">
                        Place Order
                    </button>
                </form>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-5">
            <div class="card border rounded-3 shadow-sm p-4 bg-light">
                <h4 class="mb-4 fw-semibold text-secondary">Order Summary</h4>
                <ul class="list-group list-group-flush mb-3" id="orderSummary">
                    <!-- JS will populate here -->
                </ul>
                <p class="text-muted small text-center fst-italic">Shipping is free for orders over <strong>$2.00</strong> 🎉</p>
            </div>
        </div>

    </div>
</div>

<style>
    .btn-gradient {
        background: linear-gradient(90deg, #00c6ff, #0072ff);
        color: white;
        transition: background 0.3s ease;
        border: none;
    }
    .btn-gradient:hover, .btn-gradient:focus {
        background: linear-gradient(90deg, #0072ff, #00c6ff);
        color: white;
        box-shadow: 0 8px 15px rgba(0, 114, 255, 0.3);
    }
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const orderSummary = document.getElementById('orderSummary');
    const cart = JSON.parse(localStorage.getItem('cart') || '[]');

    if(cart.length === 0){
        orderSummary.innerHTML = `<li class="list-group-item text-center text-danger">Your cart is empty.</li>`;
        
        const form = document.getElementById('checkoutForm');
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            alert("You can't checkout with an empty cart.");
        });

        return;
    }

    let total = 0;
    orderSummary.innerHTML = cart.map(item => {
        const subtotal = item.price * item.qty;
        total += subtotal;
        return `
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="my-0 fw-semibold">${item.name} <small class="text-muted">(x${item.qty})</small></h6>
                </div>
                <span class="fw-bold text-primary">$${subtotal.toFixed(2)}</span>
            </li>
        `;
    }).join('');

    orderSummary.innerHTML += `
        <li class="list-group-item d-flex justify-content-between border-top pt-3 fw-bold fs-5">
            <span>Total</span>
            <span>$${total.toFixed(2)}</span>
        </li>
    `;

    // Optional: handle form submission
    const form = document.getElementById('checkoutForm');
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        alert('Order placed successfully!');
        localStorage.removeItem('cart'); // clear cart
        window.location.href = '/';
    });
});
</script>
@endsection
