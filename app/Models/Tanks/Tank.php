<?php
namespace App\Models\Tanks;

use Illuminate\Database\Eloquent\Model;

class Tank extends Model
{
    protected $table = 'tank'; // tankテーブルに接続

    // TankモデルとTankSizeモデルの関連を定義
    // 複数のtankテーブルの値から、tanksizeを取得しても問題ない
    public function sizeDetail()
    {
        return $this->belongsTo(TankSize::class, 'size', 'id');
    }
}
