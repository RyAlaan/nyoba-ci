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
        return view('pages/private/category/index', ['categories' => $categories]);
    }

    public function create()
    {
        // validate data
        $validation = $this->validate([
            'name' => 'required|is_unique[categories.name]',
        ]);

        if (!$validation) {
            return redirect()->back()->with('validation', $this->validator->getErrors());
        }

        // create category
        $this->modelCategory->insert([
            'name' => $this->request->getPost('name'),
        ]);

        // return 
        return redirect()->to('/dashboard/categories')->with('success', 'category data created successfully');
    }

    public function edit($id)
    {
        $categories = $this->modelCategory->findAll();
        $category = $this->modelCategory->where('id', $id)->first();

        return view('pages/private/category/index', ['categories' => $categories, 'category' => $category]);
    }

    public function update($id)
    {
        // validate data
        $validation = $this->validate([
            'name' => 'required|is_unique[categories.name]',
        ]);

        if (!$validation) {
            return redirect()->back()->with('validation', $this->validator->getErrors());
        }

        // create category
        $result = $this->modelCategory->update($id, [
            'name' => $this->request->getPost('name'),
        ]);

        if (!$result) {
            return redirect()->back()->with('error', $result);
        }

        // return 
        return redirect()->to('/dashboard/categories')->with('success', 'category data updated successfully');
    }

    public function delete($id)
    {
        $result = $this->modelCategory->delete($id);

        if ($result) {
            return redirect()->to('/dashboard/categories')->with('success', 'category data updated successfully');
        }
    }
}
