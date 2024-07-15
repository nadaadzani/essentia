<?php

namespace App\Controllers;

use App\Models\ShopHistoryModel;

class History extends BaseController
{
    protected $ShopHistoryModel;

    public function __construct()
    {
        $this->ShopHistoryModel = new ShopHistoryModel();
    }

    public function index(): string
    {
        $history = $this->ShopHistoryModel->findAll();

        $data = [
            'title' => 'Home',
            'history' => $history
        ];

        return view('pages/shopHistory', $data);
    }
}
