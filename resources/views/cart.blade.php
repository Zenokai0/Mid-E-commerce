@extends('master')

@section('title')
Cart
@endsection

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-center fw-bold">🛒 Your Cart</h2>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Price ($)</th>
                            <th>Subtotal ($)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="cartBody">
                        <!-- JS populates cart here -->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Total: <span id="cartTotal">$0.00</span></h5>
            <div>
                <a href="/" class="btn btn-outline-secondary me-2">Continue Shopping</a>
                <a href="/checkout" class="btn btn-success">Checkout</a>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const cartBody = document.getElementById("cartBody");
    const cartTotalEl = document.getElementById("cartTotal");

    let cart = JSON.parse(localStorage.getItem('cart') || '[]');

    function renderCart() {
        if(cart.length === 0){
            cartBody.innerHTML = `<tr><td colspan="6" class="text-center py-4">Your cart is empty.</td></tr>`;
            cartTotalEl.textContent = "$0.00";
            return;
        }

        let total = 0;
        cartBody.innerHTML = cart.map((item, index) => {
            const subtotal = item.price * item.qty;
            total += subtotal;
            return `
                <tr class="align-middle" data-index="${index}">
                    <td>${index + 1}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="${item.image}" alt="${item.name}" class="me-3 rounded" style="width:60px; height:60px; object-fit:cover;">
                            <span>${item.name}</span>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <button class="btn btn-sm btn-outline-secondary decrease-btn">-</button>
                            <span class="qty">${item.qty}</span>
                            <button class="btn btn-sm btn-outline-secondary increase-btn">+</button>
                        </div>
                    </td>
                    <td>${item.price}</td>
                    <td>${subtotal.toFixed(2)}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-danger remove-btn">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `;
        }).join('');

        cartTotalEl.textContent = `$${total.toFixed(2)}`;
    }

    renderCart();

    cartBody.addEventListener('click', e => {
        const row = e.target.closest('tr');
        const index = row.dataset.index;

        if(e.target.closest('.remove-btn')){
            cart.splice(index, 1);
        } else if(e.target.closest('.increase-btn')){
            cart[index].qty += 1;
        } else if(e.target.closest('.decrease-btn')){
            if(cart[index].qty > 1){
                cart[index].qty -= 1;
            } else {
                cart.splice(index, 1);
            }
        }

        localStorage.setItem('cart', JSON.stringify(cart));
        renderCart();
    });
});
</script>
@endsection
