<?php

namespace App\Controllers\Private;

use App\Controllers\BaseController;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;

class CartController extends BaseController
{
    protected $modelCart;
    protected $modelProduct;
    protected $modelUser;

    public function __construct()
    {
        helper('session');

        $this->modelCart = new Cart();
        $this->modelProduct = new Product();
        $this->modelUser = new User();
    }

    public function index()
    {

        // check is session any
        if ($id = session()->get('id')) {
            // get cart data by session id
            $carts = $this->modelCart->where('user_id', $id)->products();

            return view('pages/private/cart/index', ['carts' => $carts]);
        } else {
            return redirect()->to('auth/login');
        }
    }

    public function create()
    {
        $validator = $this->validate([
            'product_id' => 'required',
            'quantity' => 'required|min_value[1]',
        ]);

        if (!$validator) {
            return redirect()->back()->with('error', $this->validator->getErrors());
        }

        $product_id = $this->request->getPost('product_id');

        $product = $this->modelProduct->where('id', $product_id)->first();

        if (!$product) {
            return redirect()->back()->with('error', 'we cannot process this product, please try again later or contact admin');
        } elseif ($this->request->getPost('quantity') > $product['stock']) {
            return redirect()->back()->with('error', 'quantity cannot higher than' . $product['stock']);
        }

        $cart = $this->modelCart->insert([
            'user_id' => session()->get('id'),
            'product_id' => $product_id,
            'quantity' => $this->request->getPost('quantity'),
        ]);

        if (!$cart) {
            return redirect()->back()->with('error', 'cannot add to cart for the moment, please try again later or contact admin');
        }

        return redirect('carts');
    }

    public function order()
    {
        // Check user detail sudah di isi
        $user_id = session()->get('id');
        $user = $this->modelUser->where('id', $user_id);
        if (!$user['phone'] || !$user['address']) {
            return redirect()->to('profile')->with('error', 'please complete your information first');
        }

        // Check user belum centang product  
        $data = $this->request->getPost('selected_product');
        $nData = 0;

        foreach ($data as $value) {
            if ($value->checked == 1) {
                $nData++;
            }
        }

        if ($nData === 0) {
            return redirect()->back()->with('error', 'please select product first');
        }

        //
    }

    public function remove($cart_id)
    {
        $cart = $this->modelCart->where('id', $cart_id);

        if (!$cart) {
            return redirect()->back()->with('error', 'data not found');
        }

        $cart->delete();

        return redirect()->back()->with('success', 'data deleted successfully');
    }
}
