@extends('master')

@section('title')
Checkout
@endsection

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-center fw-bold">🧾 Checkout</h2>
    <div class="row g-4">

        <!-- Billing Form -->
        <div class="col-lg-7">
            <div class="card shadow-sm p-4">
                <h4 class="mb-3">Billing Details</h4>
                <form id="checkoutForm">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullname" placeholder="Cuh" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="cuh@gmail.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Shipping Address</label>
                        <input type="text" class="form-control" id="address" placeholder="123 Main St" required>
                    </div>

                    <h5 class="mt-4 mb-2">Payment Method</h5>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="cod" checked>
                            <label class="form-check-label" for="cod">Cash on Delivery</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="credit">
                            <label class="form-check-label" for="credit">Credit Card</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success w-100 mt-3">Place Order</button>
                </form>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-5">
            <div class="card shadow-sm p-4">
                <h4 class="mb-3">Order Summary</h4>
                <ul class="list-group mb-3" id="orderSummary">
                    <!-- JS will populate items here -->
                </ul>
                <p class="text-muted mb-0">Shipping is free for orders over $2.00 🎉</p>
            </div>
        </div>

    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const orderSummary = document.getElementById('orderSummary');
    const cart = JSON.parse(localStorage.getItem('cart') || '[]');

    if(cart.length === 0){
        orderSummary.innerHTML = `<li class="list-group-item text-center">Your cart is empty.</li>`;
        return;
    }

    let total = 0;
    orderSummary.innerHTML = cart.map(item => {
        const subtotal = item.price * item.qty;
        total += subtotal;
        return `
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="my-0">${item.name} (x${item.qty})</h6>
                </div>
                <span>$${subtotal.toFixed(2)}</span>
            </li>
        `;
    }).join('');

    orderSummary.innerHTML += `
        <li class="list-group-item d-flex justify-content-between fw-bold">
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
