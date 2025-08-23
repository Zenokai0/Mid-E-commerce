@extends('master')

@section('title', $product->name)

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <p class="text-muted">Category: {{ $product->category }}</p>
            <p class="text-muted">Price: <span class="fw-bold">US ${{ $product->price }}</span></p>
            <p>{{ $product->description ?? 'No description available.' }}</p>

            <form id="add-to-cart-form" onsubmit="event.preventDefault(); addToCartWithQty();">
                <div class="d-flex align-items-center mb-3">
                    <label class="me-3">Quantity:</label>
                    <div class="input-group" style="max-width: 150px;">
                        <button type="button" class="btn btn-outline-secondary" onclick="changeQty(-1)">−</button>
                        <input type="number" id="qty" name="qty" value="1" min="1"
                            class="form-control text-center" readonly>
                        <button type="button" class="btn btn-outline-secondary" onclick="changeQty(1)">+</button>
                    </div>
                </div>

                <button type="submit" class="btn btn-dark">Add to Cart</button>
            </form>
        </div>
    </div>
</div>

<script>
  function changeQty(step) {
    const qtyInput = document.getElementById('qty');
    let current = parseInt(qtyInput.value, 10) || 1;
    current += step;
    if (current < 1) current = 1;
    qtyInput.value = current;
  }

  function addToCartWithQty() {
    const qty = parseInt(document.getElementById('qty').value, 10) || 1;

    const item = {
      id: "{{ $product->id }}",
      name: "{{ $product->name }}",
      price: "{{ $product->price }}",
      category: "{{ $product->category }}",
      image: "{{ $product->image }}",
      description: "{{ $product->description ?? '' }}"
    };

    addToCart(item, qty);
  }
</script>
@endsection
