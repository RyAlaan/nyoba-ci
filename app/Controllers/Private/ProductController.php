<?php

namespace App\Controllers\Private;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Product;
use CodeIgniter\HTTP\ResponseInterface;

class ProductController extends BaseController
{
    protected $modelProduct;
    protected $modelCategory;

    public function __construct()
    {
        helper(['create_slug', 'url', 'form']);

        $this->modelProduct = new Product();
        $this->modelCategory = new Category();
    }

    public function index()
    {
        // declaration variable
        $request = $this->request;
        $query = $this->modelProduct;

        // filter by name
        if ($request->getGet('name')) {
            $name = $request->getGet('name');
            $query->where('name', $name);
        }

        // load category after filtering
        $query->category();

        // pagination
        $perPage = $request->getVar('perPage') ?? 10;
        $page = $request->getVar('page') ?? 1;

        $products = $query->paginate(intval($perPage), 'default', intval($page));

        $page = \Config\Services::pager();

        return view('pages/private/product/index', ['page' => $page, 'products' => $products]);
    }

    public function create()
    {
        $categories = $this->modelCategory->findAll();

        return view('pages/private/product/add', ['categories' => $categories]);
    }

    public function store()
    {
        // validate data
        $validator = $this->validate([
            'name' => 'required|is_unique[products.name]',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric|min_length[0]',
            'image' => 'uploaded[image]|is_image[image]|mime_in[image,image/png,image/jpeg]|max_size[image,2048]',
        ]);

        if (!$validator) {
            return redirect()->back()->with('validation', $this->validator->getErrors());
        }

        // call function slug in helpers
        // helper(['create_slug']);

        $name = $this->request->getPost('name');
        $slug = 'amba-dulu';
        // $slug = create_slug($name);

        $categoryId = $this->request->getPost('category_id');
        $categoryExists = $this->modelCategory->find($categoryId);

        if (!$categoryExists) {
            // Handle the error: category with the provided ID doesn't exist
            return redirect()->back()->with('error', 'Invalid category selected');
        }

        // update image
        $image = $this->request->getFile('image');
        $filename = $image->getRandomName();
        $image->move(ROOTPATH . 'public/products', $filename);

        // insert data
        $result = $this->modelProduct->insert([
            'id' => $this->modelProduct->generateUniqueCode(),
            'category_id' => $this->request->getPost('category_id'),
            'name' => $name,
            'slug' => 'amba-dulu',
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
            'image' => $image->getName(),
        ]);

        if (!$result) {
            dd($this->modelProduct->errors());
            return redirect()->back()->with('error', $this->modelProduct->errors());
        }

        return redirect()->to(base_url('dashboard/products?name=' . $slug));
    }

    public function edit(int $id)
    {
        // get data by id
        $product = $this->modelProduct->find($id);

        return view('pages/private/product/edit', ['product' => $product]);
    }

    public function update(int $id)
    {
        // validate data
        $validator = $this->validate([
            'name' => 'required|is_unique[products.name]',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if (!$validator) {
            return redirect()->back()->with('validation', $this->validator->getErrors());
        }

        // call function slug in helpers
        $name = $this->request->getPost('name');
        $slug = create_slug($name);

        // update image
        $image = $this->request->getFile('image');
        $filename = $image->getRandomName();
        $image->move(ROOTPATH . 'public/products', $filename);

        // insert data
        $result = $this->modelProduct->save([
            'category_id' => $this->request->getPost('category_id'),
            'name' => $this->request->getPost('name'),
            'slug' => $slug,
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
            'image' => $image->getName(),
        ]);

        if (!$result) {
            return redirect()->back()->with('error', $this->modelProduct->errors());
        }

        return redirect()->to(base_url('dashboard/products?name=' . $slug));
    }

    public function delete(int $id)
    {
        // delete data
        $result = $this->modelProduct->delete($id);

        if (!$result) {
            return redirect()->back()->with('error', $this->modelProduct->errors());
        }

        return redirect()->back()->with('success', 'data deleted successfully');
    }
}
