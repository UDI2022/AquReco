<?php
namespace App\Http\Controllers;

use App\Models\Tanks\Tank;
use App\Models\Tanks\TankSize;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TanksController extends Controller{
    public function Tanks()
    {
        return Inertia::render('Tanks');
    }

    /**
    *機能
    *tankテーブルから取得したデータをtankdeta配列に格納
    *tanksizeテーブルから取得したデータをtankdeta配列に格納
    *jsonとして返す
    */
    public function tankdata()
    {
        // tankモデルを使用してtankテーブルから取得したデータをtankdeta配列に格納する
        $tanks = Tank::all();
        
        // tanksizeモデルを使用してtanksizeテーブルから取得したデータをtankdeta配列に追加する
        foreach ($tanks as $tank) {
            $tank->size_detail = $tank->sizeDetail->sizedetail;
        }

        // JSONデータとして返す
        return response()->json($tanks);
    }

    /**
    *機能
    *tanksizeテーブルから取得したデータをtankdeta配列に格納
    *jsonとして返す
    */
    public function tanksizedata()
    {
        // tanksizeモデルを使用してtanksizeテーブルから取得したデータをtankdeta配列に格納する
        $tankSizes = TankSize::all();

        // JSONデータとして返す
        return response()->json($tankSizes);
    }
}
