@extends('master')

@section('title')
Women Collection
@endsection

@section('content')
<div class="container">
    <h2>Women's Collection</h2>
    <div class="row">
        @foreach($womens as $item)
            <div class="col-md-3">
                <div class="product-card">
                    <img src="{{ $item->image }}" alt="{{ $item->name }}">
                    <div class="card-body">
                        <div class="product-title">{{ $item->name }}</div>
                        <span class="price">US ${{ $item->price }}</span>
                        <span class="old-price">US ${{ $item->price + random_int(1,5) }}</span>
                        <button class="btn btn-dark add-cart-btn" @click="addToCart({{ $item->id }})">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
