<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index()
    {
        // Get all Umbrella products
        $umbrellas = DB::table('product')
            ->where('category', 'Umbrella')
            ->limit(4)
            ->get();

        // Get all T-Shirt and Jean products
        $mens = DB::table('product')
            ->whereIn('category', ['T-Shirt', 'Jean'])
            ->limit(4)
            ->get();

        // Get all Skirt products
        $skirts = DB::table('product')
            ->where('category', 'Skirt')
            ->limit(4)
            ->get();

        return view('home', [
            'umbrellas' => $umbrellas,
            'mens' => $mens,
            'skirts' => $skirts,
        ]);
    }
    //getting women by tshirt and jean cuz no category for 'Men' in db, same as women
    public function showMen()
    {
        $mens = DB::table('product')
            ->where('category', ['T-Shirt', 'Jean'])
            ->get();

        return view('product.men', ['mens' => $mens]);
    }
    public function showWomen()
    {
        $womens = DB::table('product')
            ->where('category', 'Skirt')
            ->get();

        return view('product.women', ['womens' => $womens]);
    }
    public function search(Request $request)
    {
        $query = $request->input('query'); // get search input

        // search products by name or category
        $products = DB::table('product')
            ->where('name', 'like', "%{$query}%")
            ->orWhere('category', 'like', "%{$query}%")
            ->get();

        return view('home', ['searchResults' => $products, 'query' => $query]);
    }
}
