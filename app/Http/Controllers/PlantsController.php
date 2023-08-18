<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Plants\Plant;
use App\Models\Plants\PlantSpecies;
use App\Models\Other\PH;

class PlantsController extends Controller{
    public function Plants()
    {
        return Inertia::render('Plants');
    }


    /**
     * 【一覧表示用】
    *機能
    *plantテーブルから取得したデータをplantdata配列に格納
    *plantspeciesテーブルから取得したデータをplantdata配列に格納
    *jsonとして返す
    */
    public function plantdata()
    {
    // Plantモデルを使用してplantテーブルから取得したデータをplantdata配列に格納する
    // また関連するPlantSpeciesとpHも同時に取得
    $plants = Plant::with('plantDetail','ph')->get();



    // JSONデータとして返す
    return response()->json($plants);
    }


    /**
     * 【一覧表示用】
     * 機能
     * plantspeciesテーブルから取得したデータをplantfamily配列に格納
     * jsonとして返す
     */
    public function plantfamilydata()
    {
        // PlantSpeciesモデルを使用してplantspeciesテーブルから取得したデータをplantfamilydata配列に格納する
        // また関連するPlantも同時に取得
        $plantfamily = PlantSpecies::with('plant')->get();

        // JSONデータとして返す
        return response()->json($plantfamily);
    }

    /**
     * 【一覧表示用】
     * 機能
     * phテーブルから取得したデータをplantph配列に格納してjsonとして返す
     * 
     */
    public function plantphdata()
    {
        $plantph = ph::with('plant')->get();

        return response()->json($plantph);
    }

}