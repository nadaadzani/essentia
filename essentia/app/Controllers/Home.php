<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Home extends BaseController
{
  protected $ProductModel;

  public function __construct()
  {
    $this->ProductModel = new ProductModel();
  }

  public function index(): string
  {
    $products = $this->ProductModel->findAll();

    $data = [
      'title' => 'Home',
      'products' => $products
    ];

    return view('pages/home', $data);
  }
}
