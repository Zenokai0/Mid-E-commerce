@extends('master')

@section('title')
    Cart
@endsection

@section('content')
    <div class="container">
        <h2 class="mb-4 text-center">🛒 Your Cart</h2>

        <div class="table-responsive">
            <table class="table table-bordered cart-table">
                <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Price ($)</th>
                    <th>Subtotal ($)</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td><img src="https://via.placeholder.com/50" alt="Product"></td>
                    <td>Coca Cola</td>
                    <td>2</td>
                    <td>0.5</td>
                    <td>1.00</td>
                    <td><button class="btn btn-sm btn-danger">Remove</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><img src="https://via.placeholder.com/50" alt="Product"></td>
                    <td>Pepsi</td>
                    <td>3</td>
                    <td>0.6</td>
                    <td>1.80</td>
                    <td><button class="btn btn-sm btn-danger">Remove</button></td>
                </tr>
                <tr class="total-row">
                    <td colspan="5" class="text-right">Total</td>
                    <td colspan="2">$2.80</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="text-right">
            <a href="/checkout" class="btn btn-success">Checkout</a>
            <a href="/" class="btn btn-outline-secondary">Continue Shopping</a>
        </div>
    </div>
@endsection
