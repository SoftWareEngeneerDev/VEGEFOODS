<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ClientController extends Controller
{
    //
    public function home()
    {
        $sliders = Slider::get()->where('status', 1);
        $products = Product::get()->where('status', 1);

        return view('client.home')->with('sliders', $sliders)->with('products', $products);
    }
    public function login()
    {
        return view('client.login');
    }
    public function signup()
    {
        return view('client.signup');
    }
    public function shop()
    {
        $produits = Product::get()->where('status', 1);
        $categories = Category::get();
        return view('client.shop')->with('produits', $produits)->with('categories', $categories);
    }

    public function select_par_category($name)
    {
        $categories = Category::get();
        $produits = Product::where('Product_category', $name)->where('status', 1)->get();

        return view('client.shop')->with('produits', $produits)->with('categories', $categories);
    }
    public function checkout()
    {
        return view('client.checkout');
    }
    public function panier()
    {
        return view('client.cart');
    }
}
