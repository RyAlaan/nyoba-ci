<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Product;
use CodeIgniter\HTTP\ResponseInterface;

class HomeController extends BaseController
{
    protected $modelCategory;
    protected $modelProduct;

    public function __construct()
    {
        $this->modelCategory = new Category();
        $this->modelProduct = new Product();
    }

    public function index()
    {
        $categories = $this->modelCategory->findAll();
        $products = $this->modelProduct->category()->findAll();

        return view('pages/public/home', ['categories' => $categories, 'products' => $products]);
    }
}
