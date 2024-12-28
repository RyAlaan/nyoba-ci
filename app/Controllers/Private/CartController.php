<?php

namespace App\Controllers\Private;

use App\Controllers\BaseController;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;

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
            $carts = $this->modelCart->where('user_id', $id)->products()->findAll();

            return view('pages/private/cart/index', ['carts' => $carts]);
        } else {
            return redirect()->to('auth/login');
        }
    }

    public function create()
    {
        $validator = $this->validate([
            'product_id' => 'required',
        ]);

        if (!$validator) {
            return redirect()->back()->with('error', $this->validator->getErrors());
        }

        $product_id = $this->request->getPost('product_id');
        $user_id = session()->get('id');

        $isExist = $this->modelCart->where('user_id', $user_id)->where('product_id', $product_id)->first();

        if ($isExist) {
            $data = [
                'quantity' => $isExist['quantity'] + 1
            ];

            $cart = $this->modelCart->update($isExist['id'], $data);

            if (!$cart) {
                return redirect()->back()->with('error', 'cannot update cart for the moment, please try again later or contact admin');
            }

            return redirect('carts')->with('success', 'The product quantity has been successfully increased');
        } else {
            $cart = $this->modelCart->insert([
                'user_id' => session()->get('id'),
                'product_id' => $product_id,
                'quantity' => 1,
            ]);

            if (!$cart) {
                return redirect()->back()->with('error', 'cannot add to cart for the moment, please try again later or contact admin');
            }

            return redirect('carts')->with('success', 'The product has been successfully added to the cart');
        }
    }

    public function order()
    {
        // check is user address && phone not empty
        $user_id = session()->get('id');
        $user = $this->modelUser->where('id', $user_id)->first();
        if (!$user['phone'] || !$user['address']) {
            return redirect()->to('profile')->with('error', 'please complete your information first');
        }

        // Check user belum centang product  
        $data = $this->request->getPost('selected_product');
        dd('data');
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

    public function delete($cart_id)
    {
        $cart = $this->modelCart->where('id', $cart_id);

        if (!$cart) {
            return redirect()->back()->with('error', 'data not found');
        }

        $cart->delete();

        return redirect()->back()->with('success', 'data deleted successfully');
    }
}
