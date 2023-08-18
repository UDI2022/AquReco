<?php
namespace App\Models\Stones;

use Illuminate\Database\Eloquent\Model;

class Stone extends Model
{
    protected $table = 'stone'; // stoneテーブルに接続

    // StoneモデルとStoneSizeモデルの関連を定義
    // 複数のstoneテーブルの値から、StoneSizeを取得しても問題ない
    public function sizeDetail()
    {
        return $this->belongsTo(StoneSize::class, 'size', 'id');
    }
}
