@extends('master')

@section('title')
Home
@endsection
@section('content')
<!-- should use image from db instead -->
@if (!isset($searchResults))

<div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" data-bs-pause="false">
    <!-- Indicators -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true"></button>
        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"></button>
    </div>

    <!-- Carousel items -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/images/placeholder1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="/images/placeholder2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="/images/placeholder3.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
</div>
<div class="container text-center mt-3">
    <div class="row">
        <a href="/women" class="col text-decoration-none" style="color:black;">
            <img src="/images/women.jpg" alt="" class="w-100">
            <p class="border mt-3 p-2">Women Collection</p>
        </a>
        <a href="/men" class="col text-decoration-none" style="color:black;">
            <img src="/images/men.jpg" alt="" class="w-100">
            <p class="border mt-3 p-2">Men Collection</p>
        </a>
    </div>
</div>
@endif
<!-- search result -->
@if(isset($searchResults))
<div class="container">
    <h3>Search results for "{{ $query }}"</h3>
    <div class="row">
        @foreach($searchResults as $item)
        <div class="col-md-3">
            <div class="product-card">
                <span class="wishlist">
                    <svg width="22" height="22" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 14s6-4.435 6-8.182C14 2.842 11.985 1 8 1S2 2.842 2 5.818C2 9.565 8 14 8 14z" />
                    </svg>
                </span>
                <img
                    src="{{ $item->image }}"
                    alt="Refined Serpent Jacket">
                <div class="card-body">
                    <div class="product-title product-title-clipped">{{ $item->name }}</div>
                    <div>
                        <span class="price">US ${{ $item->price }}</span>
                        <span class="old-price">US ${{ $item->price + random_int(1,5) }}</span>
                    </div>
                    <button
                        class="btn btn-dark add-cart-btn" onclick='addToCart(@json($item))'>
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

{{--umbrella card--}}
@if(isset($umbrellas))
<div class="container">
    <h2>Sip in Style, Stay Dry</h2>
    <div class="row">
        @foreach($umbrellas as $item)
        <div class="col-md-3">
            <div class="product-card">
                <span class="wishlist">
                    <svg width="22" height="22" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 14s6-4.435 6-8.182C14 2.842 11.985 1 8 1S2 2.842 2 5.818C2 9.565 8 14 8 14z" />
                    </svg>
                </span>
                <img
                    src="{{ $item->image }}"
                    alt="Refined Serpent Jacket">
                <div class="card-body">
                    <div class="product-title product-title-clipped">{{ $item->name }}</div>
                    <div>
                        <span class="price">US ${{ $item->price }}</span>
                        <span class="old-price">US ${{ $item->price + random_int(1,5) }}</span>
                    </div>
                    <button
                        class="btn btn-dark add-cart-btn"
                         onclick='addToCart(@json($item))'>
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
@if (isset($mens))
{{--men card--}}
<div class="container">
    <h2>Men's Picks, Extra Slash</h2>
    <div class="row">
        @foreach($mens as $item)
        <div class="col-md-3">
            <div class="product-card">
                <span class="wishlist">
                    <svg width="22" height="22" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 14s6-4.435 6-8.182C14 2.842 11.985 1 8 1S2 2.842 2 5.818C2 9.565 8 14 8 14z" />
                    </svg>
                </span>
                <img
                    src="{{ $item->image }}"
                    alt="Refined Serpent Jacket">
                <div class="card-body">
                    <div class="product-title product-title-clipped">{{ $item->name }}</div>
                    <div>
                        <span class="price">US ${{ $item->price }}</span>
                        <span class="old-price">US ${{ $item->price + random_int(1,5) }}</span>
                    </div>
                    <button
                        class="btn btn-dark add-cart-btn"
                        onclick='addToCart(@json($item))'>
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
{{--skirt card--}}
@if (isset($skirts))
<div class="container">
    <h2>Just for Her</h2>
    <div class="row">
        @foreach($skirts as $item)
        <div class="col-md-3">
            <div class="product-card">
                <span class="wishlist">
                    <svg width="22" height="22" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 14s6-4.435 6-8.182C14 2.842 11.985 1 8 1S2 2.842 2 5.818C2 9.565 8 14 8 14z" />
                    </svg>
                </span>
                <img
                    src="{{ $item->image }}"
                    alt="Refined Serpent Jacket">
                <div class="card-body">
                    <div class="product-title product-title-clipped">{{ $item->name }}</div>
                    <div>
                        <span class="price">US ${{ $item->price }}</span>
                        <span class="old-price">US ${{ $item->price + random_int(1,5) }}</span>
                    </div>
                    <button
                        class="btn btn-dark add-cart-btn" onclick='addToCart(@json($item))'>
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection