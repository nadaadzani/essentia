<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Register extends BaseController
{
  protected $UserModel;

  public function __construct()
  {
    $this->UserModel = new UserModel();
  }

  public function index(): string
  {
    $data = [
      'title' => 'Register'
    ];
    return view('users/register', $data);
  }

  public function save(): object
  {
    // Input validation
    if (!$this->validate([
      'email' => 'required|is_unique[users.email]',
      'password' => 'required',
      'phone_number' => 'required|is_unique[users.phone_number]'
    ])) {
      $validation = \Config\Services::validation();
      return redirect()->back()->withInput()->with('validation', $validation);
    }

    $options = [
      'cost' => 12,
    ];

    $this->UserModel->save([
      'email' => $this->request->getVar('email'),
      'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT, $options),
      'phone_number' => $this->request->getVar('phone_number'),
      'wallet' => 1000000 // Initial wallet balance
    ]);

    return redirect()->to('/login');
  }
}
