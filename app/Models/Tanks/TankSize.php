<?php
namespace App\Models\Tanks;

use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Model;
class TankSize extends Model
{
    protected $table = 'tanksize'; // tanksizeテーブルに接続

    // TankSizeモデルとTankモデルの関連を定義
    // tanksizeを取得した場合、複数のtankテーブルの数値が抽出できる
    public function tanks()
    {
        return $this->hasMany(Tank::class, 'size', 'id');
    }
    
    public function products()
    {
        return $this->hasMany(Product::class, 'tanksize', 'id');
    }
}
