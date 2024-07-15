<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
  protected $UserModel;

  public function __construct()
  {
    $this->UserModel = new UserModel();
  }

  public function index(): string
  {
    $data = [
      'title' => 'Login'
    ];
    return view('users/login', $data);
  }

  public function auth(): object
  {

    // Input validation
    if (!$this->validate([
      'email' => 'required',
      'password' => 'required',
      'phone_number' => 'required'
    ])) {
      $validation = \Config\Services::validation();
      return redirect()->back()->withInput()->with('validation', $validation);
    }

    // Checks if user exists
    $user = $this->UserModel->getUser($this->request->getVar('email'));

    // Checks if password is correct
    if ($user) {
      if (password_verify($this->request->getVar('password'), $user['password'])) {
        // // Create the cookie
        // $cookie = cookie('cookie', 'totallyValid', ['expire' => '3600']);
        // Set the cookie
        setcookie('cookie', 'totallyValid', time() + 3600, '/');
        return redirect()->to('/');
      } else {
        session()->setFlashdata('error', 'Invalid email or password');
        return redirect()->back()->withInput();
      }
    } else {
      session()->setFlashdata('error', 'Invalid email or password');
      return redirect()->back()->withInput();
    }
  }
}
