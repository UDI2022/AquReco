<?php
namespace App\Models\Woods;

use Illuminate\Database\Eloquent\Model;

class Wood extends Model
{
    protected $table = 'wood'; // woodテーブルに接続

    // WoodモデルとWoodSizeモデルの関連を定義
    // 複数のwoodテーブルの値から、woodsizeを取得しても問題ない
    public function sizeDetail()
    {
        return $this->belongsTo(WoodSize::class, 'size', 'id');
    }
}
