<?php

namespace App\Controllers\Private;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('pages/private/dashboard');
    }
}
