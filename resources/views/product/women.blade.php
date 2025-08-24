@extends('master')

@section('title')
Women Collection
@endsection

@section('content')
<div class="container">
    <h2>Women's Collection</h2>
    <div class="row">
        @foreach($womens as $item)
        <a href="{{ route('detail', $item->id) }}" class="col-md-3" style="text-decoration: none;">
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
                    <div class="product-title product-title-clipped" style="color: black">{{ $item->name }}</div>
                    <div>
                        <span class="price">US ${{ $item->price }}</span>
                        <span class="old-price">US ${{ $item->price + random_int(1,5) }}</span>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection