<?php

namespace App\Controllers\Private;

use App\Controllers\BaseController;
use App\Models\Category;
use CodeIgniter\HTTP\ResponseInterface;

class CategoryController extends BaseController
{
    protected $modelCategory;

    // construct
    public function __construct()
    {
        // define model category
        $this->modelCategory = new Category();
    }


    public function index()
    {
        // retrieve all categories data
        $categories = $this->modelCategory->findAll();

        // return with categories data
        return view('pages/private/categories', ['categories' => $categories]);
    }

    public function create()
    {
        // validate data
        $validation = $this->validate([
            'name' => 'required',
        ]);

        if (!$validation) {
            return redirect()->back()->with('validation', $this->validator->getErrors());
        }

        // create category
        $this->modelCategory->insert([
            'name' => $this->request->getPost('name'),
        ]);

        // return 
        return redirect('/categories')->with('success', 'category data created successfully');
    }

    public function update($category_id)
    {
        $categories = $this->modelCategory->findAll();
        $category = $this->modelCategory->where('category_id', $category_id)->first();

        return view('pages/private/categories', ['categories' => $categories, 'category' => $category]);
    }

    public function delete($category_id)
    {
        $result = $this->modelCategory->where('id', $category_id)->delete();

        if ($result) {
            return Redirect('/category');
        }
    }
}
