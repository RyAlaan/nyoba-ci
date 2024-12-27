<?php

namespace App\Controllers\Private;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardUser extends BaseController
{
    protected $modelUser;

    public function __construct()
    {
        $this->modelUser = new User();
    }

    public function index()
    {
        $request = $this->request;

        // querying
        $query = $this->modelUser;

        // filter by name
        if ($request->getGet('name')) {
            $name = $request->getGet('name');
            $query->where('users.name', $name);
        }

        // filtering by email
        if ($request->getGet('email')) {
            $email = $request->getGet('email');
            $query->where('users.email', $email);
        }

        $query->where('role', 'user');

        // Pagination
        $perPage = $request->getVar('perPage') ?? 10;
        $page = $request->getVar('page') ?? 1;

        // Execute query
        $users = $query->paginate(intval($perPage), 'default', intval($page));

        // Get the pager instance
        $page = \Config\Services::pager();

        return view('pages/private/user/list', ['users' => $users, 'page' => $page]);
    }
}