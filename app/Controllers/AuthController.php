<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class AuthController extends BaseController
{
    protected $modelUser;

    // construct
    public function __construct()
    {
        $this->helpers = ['form'];
        $this->modelUser = new User();
    }

    /**
     * return to Register page
     */
    public function RegisterPage()
    {
        return view('pages/auth/register');
    }

    /**
     * create user data
     */
    public function Register()
    {
        // validation data
        $validation = $this->validate([
            'name' => 'required|max_length[30]',
            'password' => 'required|max_length[255]|min_length[7]',
            'passconf' => 'required|max_length[255]|matches[password]',
            'email'    => 'required|max_length[254]|is_unique[users.email]',
        ]);

        if (!$validation) {
            return redirect()->back()->with('validation', $this->validator->getErrors());
        }

        // create data
        $this->modelUser->insert([
            'name' => $this->request->getPost('name'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'email' => $this->request->getPost('email'),
        ]);

        return redirect()->to('/auth/login');
    }

    /**
     * return to login page
     */
    public function LoginPage()
    {
        return view('pages/auth/login');
    }

    /**
     * authenticating user data
     */
    public function Login()
    {
        // validate data
        $validation = $this->validate([
            'email' => 'required|valid_email',
            'password' => 'required',
        ]);

        if (!$validation) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // check is email exists
        $user = $this->modelUser->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('errors', ['email' => 'Invalid email or password']);
        }

        // checking password
        $pwd_verify = password_verify($password, $user['password']);

        if (!$pwd_verify) {
            return redirect()->back()->with('errors', ['password' => 'Invalid email or password']);
        }

        // creating session
        $session = session();
        $session->set([
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'role' => $user['role'],
            'isLoggedIn' => TRUE,
        ]);

        return redirect()->to('/');
    }

    /**
     * handle logout
     */
    public function logout()
    {
        // deleting session
        session_destroy();
        return redirect()->to('/auth/login');
    }
}
