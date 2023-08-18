<?php
namespace App\Http\Controllers;

use App\Models\Woods\Wood;
use App\Models\Woods\WoodSize;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WoodsController extends Controller{
    public function Woods()
    {
        return Inertia::render('Woods');
    }
    /**
     * 【一覧表示用】
    *機能
    *woodテーブルから取得したデータをwooddata配列に格納
    *woodsizeテーブルから取得したデータをwooddata配列に格納
    *jsonとして返す
    */
    public function wooddata()
    {
        // woodモデルを使用してwoodテーブルから取得したデータをtankdeta配列に格納する
        $woods = Wood::all();
        
        // woodsizeモデルを使用してwoodsizeテーブルから取得したデータをtankdeta配列に追加する
        foreach ($woods as $wood) {
            $wood->size_detail = $wood->sizeDetail->sizedetail;
        }

        // JSONデータとして返す
        return response()->json($woods);
    }

    /**
     * 【一覧表示用】
    *機能
    *woodsizeテーブルから取得したデータをwooddata配列に格納
    *jsonとして返す
    */
    public function woodsizedata()
    {
        // woodsizeモデルを使用してwoodsizeテーブルから取得したデータをtankdeta配列に格納する
        $woodSizes = WoodSize::all();

        // JSONデータとして返す
        return response()->json($woodSizes);
    }
}