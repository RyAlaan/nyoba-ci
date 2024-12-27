<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use App\Models\Product;
use CodeIgniter\HTTP\ResponseInterface;

class ProductController extends BaseController
{
    protected $modelProduct;

    public function __construct()
    {
        $this->modelProduct = new Product();
    }

    public function index()
    {
        $products = $this->modelProduct->category()->findAll();

        return view('pages/public/products/index', ['products' => $products]);
    }

    public function show($slug)
    {
        $product = $this-> modelProduct->category()->where('slug', $slug)->asArray()->first();

        return view('pages/public/products/detail', ['product' => $product]);
    }
}
