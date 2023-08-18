<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Favorite\Favorite;

class FavoriteController extends Controller{
    public function Favorite()
    {
        return Inertia::render('Favorite');
    }

    public function addToFavorites(Request $request)
    {
        $userEmail = $request->input('email');
        $woodId = $request->input('woodId');

        // データベースにFavoriteレコードを作成する
        Favorite::create([
            'email' => $userEmail,
            'control_id' => $woodId,
        ]);

        // 成功した場合には適切なレスポンスを返す（例：HTTPステータスコード200）
        return response()->json(['message' => 'Favorite added successfully'], 200);
    }

    public function addToFavoritesTank(Request $request)
    {
        $userEmail = $request->input('email');
        $tankId = $request->input('tankId');

        // データベースにFavoriteレコードを作成する
        Favorite::create([
            'email' => $userEmail,
            'control_id' => $tankId,
        ]);

        // 成功した場合には適切なレスポンスを返す
        return response()->json(['message' => 'Favorite added successfully'], 200);
    }

    public function addToFavoritesStone(Request $request)
    {
        $userEmail = $request->input('email');
        $stoneId = $request->input('stoneId');

        // データベースにFavoriteレコードを作成する
        Favorite::create([
            'email' => $userEmail,
            'control_id' => $stoneId,
        ]);

        // 成功した場合には適切なレスポンスを返す
        return response()->json(['message' => 'Favorite added successfully'], 200);
    }

    public function addToFavoritesPlant(Request $request)
    {
        $userEmail = $request->input('email');
        $plantId = $request->input('plantId');

        // データベースにFavoriteレコードを作成する
        Favorite::create([
            'email' => $userEmail,
            'control_id' => $plantId,
        ]);

        // 成功した場合には適切なレスポンスを返す
        return response()->json(['message' => 'Favorite added successfully'], 200);
    }

    public function addToFavoritesProduct(Request $request)
    {
        $userEmail = $request->input('email');
        $productId = $request->input('productId');

        // データベースにFavoriteレコードを作成する
        Favorite::create([
            'email' => $userEmail,
            'control_id' => $productId,
        ]);

        // 成功した場合には適切なレスポンスを返す
        return response()->json(['message' => 'Favorite added successfully'], 200);
    }
}
