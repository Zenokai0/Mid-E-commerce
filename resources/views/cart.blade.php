@extends('master')

@section('title')
    Cart
@endsection

@section('content')
<div class="container py-5">
    <h2 class="text-center fw-bold mb-5">🛒 Shopping Cart</h2>

    <section class="card border-0 shadow">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-borderless align-middle mb-0">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="cartBody">
                        <!-- JavaScript will populate cart rows -->
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 py-4">
            <h5 class="mb-0 fw-semibold">Total: <span id="cartTotal" class="text-success">$0.00</span></h5>
            <div class="d-flex gap-2">
                <a href="/" class="btn btn-outline-dark">← Continue Shopping</a>
                <a href="/checkout" id="checkoutBtn" class="btn btn-primary">Proceed to Checkout</a>
            </div>
        </div>
    </section>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const cartBody = document.getElementById("cartBody");
    const cartTotalEl = document.getElementById("cartTotal");
    const checkoutBtn = document.getElementById("checkoutBtn");

    let cart = JSON.parse(localStorage.getItem('cart') || '[]');

    const formatUSD = value => new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD'
    }).format(value);

    const updateCartStorage = () => {
        localStorage.setItem('cart', JSON.stringify(cart));
    };

    const buildCartRow = (item, index) => {
        const subtotal = item.price * item.qty;
        return `
            <tr data-index="${index}">
                <td>${index + 1}</td>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="${item.image}" alt="${item.name}" class="rounded me-3" style="width:60px; height:60px; object-fit:cover;">
                        <span>${item.name}</span>
                    </div>
                </td>
                <td>
                    <div class="input-group input-group-sm w-auto">
                        <button class="btn btn-outline-secondary decrease-btn" aria-label="Decrease quantity">−</button>
                        <span class="input-group-text bg-white qty">${item.qty}</span>
                        <button class="btn btn-outline-secondary increase-btn" aria-label="Increase quantity">+</button>
                    </div>
                </td>
                <td>${formatUSD(item.price)}</td>
                <td>${formatUSD(subtotal)}</td>
                <td>
                    <button class="btn btn-sm btn-danger remove-btn" aria-label="Remove item">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;
    };

    const renderCart = () => {
        if (cart.length === 0) {
            cartBody.innerHTML = `
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">Your cart is empty.</td>
                </tr>
            `;
            cartTotalEl.textContent = formatUSD(0);
            return;
        }

        let total = 0;
        cartBody.innerHTML = cart.map((item, index) => {
            total += item.price * item.qty;
            return buildCartRow(item, index);
        }).join('');

        cartTotalEl.textContent = formatUSD(total);
    };

    cartBody.addEventListener('click', event => {
        const row = event.target.closest('tr');
        if (!row) return;
        const index = Number(row.dataset.index);

        if (event.target.closest('.increase-btn')) {
            cart[index].qty += 1;
        } else if (event.target.closest('.decrease-btn')) {
            cart[index].qty > 1 ? cart[index].qty-- : cart.splice(index, 1);
        } else if (event.target.closest('.remove-btn')) {
            cart.splice(index, 1);
        } else {
            return;
        }

        updateCartStorage();
        renderCart();
    });

    checkoutBtn.addEventListener('click', e => {
        if (!cart.length) {
            e.preventDefault();
            alert("Your cart is empty.");
        }
    });

    renderCart();
});
</script>
@endsection
