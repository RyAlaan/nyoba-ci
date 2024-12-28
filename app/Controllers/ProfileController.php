<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;

class ProfileController extends BaseController
{
    protected $modelUser;

    public function __construct()
    {
        $this->modelUser = new User();
    }

    public function index()
    {
        $user_id = session()->get('id');
        $user = $this->modelUser->where('id', $user_id)->first();

        return view('pages/private/user/profile', ['user' => $user]);
    }

    public function update()
    {
        $validator = $this->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
        ]);

        if (!$validator) {
            return redirect()->back()->with('error', $this->validator->getErrors());
        }
        
        $user_id = session()->get('id');
        
        $user = $this->modelUser->update($user_id, [
            'name' => $this->request->getPost('name'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
        ]);
        
        if (!$user) {
            return redirect()->back()->with('error', $this->modelUser->errors());
        }

        return redirect('profile')->with('success', 'Your data has been updated successfully');
    }
}
