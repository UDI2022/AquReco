<?php
namespace App\Http\Controllers;

use App\Models\Products\Product;
use App\Models\Tanks\TankSize;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductsController extends Controller{
    public function Products()
    {
        return Inertia::render('Products');
    }
    /**
     * 機能
     * 全ての情報を情報を取得する
     */
    public function productdata(){
        $products = Product::all();

        foreach ( $products as $product ) {
            $product->tankSize = $product->tankSize->tanksize;
        }

        return response()->json($products);
    }

    /*
    * 機能
    * サイズの情報を取得
    */
    public function productsizedata()
    {
        $tanksize = TankSize::all();
        return response()->json($tanksize);
    }
}