<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Products extends BaseController
{
  protected $ProductModel;

  public function __construct()
  {
    $this->ProductModel = new ProductModel();
  }

  public function index(): string
  {
    // dd(\Config\Services::validation());
    $data = [
      'title' => 'Add Product',
      'validation' => \Config\Services::validation()
    ];
    return view('pages/addItem', $data);
  }

  public function save(): object
  {
    // Input validation
    if (!$this->validate([
      'name' => 'required',
      'image' => 'required',
      'price' => 'required'
    ])) {
      $validation = \Config\Services::validation();
      return redirect()->back()->withInput()->with('validation', $validation);
    }

    $slug = url_title($this->request->getVar('name'), '-', true);
    $this->ProductModel->save([
      'name' => $this->request->getVar('name'),
      'slug' => $slug,
      'image' => $this->request->getVar('image'),
      'price' => $this->request->getVar('price')
    ]);

    return redirect()->to('/');
  }

  public function edit($slug): string
  {
    $data = [
      'title' => 'Edit Product',
      'validation' => \Config\Services::validation(),
      'product' => $this->ProductModel->getProduct($slug)
    ];
    return view('pages/editItem', $data);
  }

  public function update($id): object
  {
    $slug = url_title($this->request->getVar('name'), '-', true);
    $this->ProductModel->save([
      'id' => $id,
      'name' => $this->request->getVar('name'),
      'slug' => $slug,
      'image' => $this->request->getVar('image'),
      'price' => $this->request->getVar('price')
    ]);

    return redirect()->to('/');
  }

  public function shopCart(): string
  {
    // This shows the products that are in the cart
    $cartItems = session('cart', []);

    $data = [
      'title' => 'Shop Cart',
      'cartItems' => $cartItems,
    ];

    return view('pages/shopCart', $data);
  }

  public function add(): object
  {
    $productName = $this->request->getVar('name');
    $productPrice = $this->request->getVar('price');

    // Create the cart item array
    $cartItem = [
      'id' => uniqid(), // Generate a unique ID for the cart item
      'name' => $productName,
      'price' => $productPrice,
    ];

    // Get the current cart items from the session
    $cart = session('cart', []);

    // Add the new product to the cart
    $cart[] = $cartItem;

    // Store the updated cart in the session
    session()->set('cart', $cart);

    // Redirect to the shop cart page
    return redirect()->to('/pages/shopCart');
  }
}
