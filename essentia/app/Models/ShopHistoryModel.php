<?php

namespace App\Models;

use CodeIgniter\Model;

class ShopHistoryModel extends Model
{
    protected $table = 'shop_history';
    protected $useTimestamps = true;
    protected $allowedFields = ['receipt', 'total_items', 'total_price'];
}
