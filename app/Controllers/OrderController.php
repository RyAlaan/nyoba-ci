<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use CodeIgniter\HTTP\ResponseInterface;

class OrderController extends BaseController
{
    protected $modelOrder;
    protected $modelOrderItem;
    protected $modelProduct;

    public function __construct()
    {
        $this->modelOrder = new Order();
        $this->modelOrderItem = new OrderItem();
        $this->modelProduct = new Product();
    }

    public function index()
    {
        $user_id = session()->get('id');
        $orders = $this->modelOrder->where('user_id', $user_id)->findAll();

        return view('pages/private/order/index', ['orders' => $orders]);
    }

    public function show($order_id)
    {
        $orderItem = $this->modelOrderItem->where('order_id', $order_id)->first();

        $orderItem['products'] = $this->modelProduct->where('id', $orderItem['product_id'])->findAll();

        return view('pages/private/order/detail', ['orderItem' => $orderItem]);
    }
}
