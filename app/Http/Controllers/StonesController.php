<?php
namespace App\Http\Controllers;

use App\Models\Stones\Stone;
use App\Models\Stones\StoneSize;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StonesController extends Controller{
    public function Stones()
    {
        return Inertia::render('Stones');
    }

    /**
    *機能
    *stoneテーブルから取得したデータをstonedeta配列に格納
    *stonesizeテーブルから取得したデータをstonedeta配列に格納
    *jsonとして返す
    */
    public function stonedata()
    {
        // stoneモデルを使用してstoneテーブルから取得したデータをstonedeta配列に格納する
        $stones = Stone::all();
        
        // stonesizeモデルを使用してstonesizeテーブルから取得したデータをstonedeta配列に追加する
        foreach ($stones as $stone) {
            $stone->size_detail = $stone->sizeDetail->sizedetail;
        }

        // JSONデータとして返す
        return response()->json($stones);
    }

    /**
    *機能
    *stonesizeテーブルから取得したデータをstonedeta配列に格納
    *jsonとして返す
    */
    public function stonesizedata()
    {
        // stonesizeモデルを使用してstonesizeテーブルから取得したデータをstonedeta配列に格納する
        $stoneSizes = StoneSize::all();

        // JSONデータとして返す
        return response()->json($stoneSizes);
    }
}

