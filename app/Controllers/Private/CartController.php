<?php

namespace App\Controllers\Private;

use App\Controllers\BaseController;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Ramsey\Uuid\Nonstandard\Uuid;

class CartController extends BaseController
{
    protected $modelCart;
    protected $modelProduct;
    protected $modelUser;
    protected $modelOrder;
    protected $modelOrderItem;

    public function __construct()
    {
        helper('session');

        $this->modelCart = new Cart();
        $this->modelProduct = new Product();
        $this->modelUser = new User();
        $this->modelOrder = new Order();
        $this->modelOrderItem = new OrderItem();
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

        // Check is cart empty  
        $data = $this->request->getPost('selected_products');
        $quantities = $this->request->getPost('quantities');

        if (!$data) {
            return redirect()->back()->with('error', 'please select product first');
        }

        // create order data
        $totalPrice = 0;
        $order_id = Uuid::uuid4()->toString();

        $this->modelOrder->create([
            'id' => $order_id,
            'user_id' => $user_id,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        foreach ($data as $product_id) {
            $product = $this->modelProduct->where('id', $product_id)->find();

            if ($quantities[$product_id] <= $product['stock']) {
                $this->modelOrderItem->insert([
                    'order_id' => $order_id,
                    'product_id' => $product_id,
                    'quantity' => $quantities[$product_id],
                    'price' => $product['price'] * $quantities[$product_id],
                ]);

                $totalPrice += $product['price'] * $quantities[$product_id];

                $this->modelCart->where('user_id', $user_id)->where('product_id', $product_id)->delete();
                $this->modelProduct->where('product_id', $product_id)->update(['stock' => $product['stock'] - $quantities[$product_id]]);
            }
        }

        if ($totalPrice > 0) {
            $this->modelOrder->where($order_id, [
                'status' => 'Awaiting Payment',
                'total_price' => $totalPrice
            ]);

            return redirect('orders')->with('success', 'data order added successfully');
        } else {
            return redirect()->back()->with('error', 'please contact admin to check stock availability');
        }
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
