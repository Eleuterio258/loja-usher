<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth.role:1');
        ///$this->middleware('auth.role:user');
      //  $this->middleware('auth.role:1', ['only' => ['blockUser']]);


    }
  
    public function allProdutos()
    {
        $produtos = Product::all();
        return $produtos;
    }
}
