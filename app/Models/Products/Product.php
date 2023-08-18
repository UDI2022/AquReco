<?php
namespace App\Models\Products;

use App\Models\Tanks\TankSize;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products'; // tankテーブルに接続

    
    public function tankSize()
    {
        return $this->belongsTo(TankSize::class, 'tanksize', 'id');
    }
}
