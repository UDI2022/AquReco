<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;


use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\TanksController;
use App\Http\Controllers\WoodsController;
use App\Http\Controllers\StonesController;
use App\Http\Controllers\PlantsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CompleteController;
use App\Http\Controllers\FishController;
use App\Http\Controllers\ContactController;

use App\Http\Middleware\CheckUserRole;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        // ユーザーロールによって適切なページを表示
        $userRole = auth()->user()->role;
        if ($userRole == 1 || $userRole == 2) {
            return redirect()->route('page2');
        } elseif ($userRole == 3) {
            return redirect()->route('page3');
        } else {
            return redirect()->route('page1');
        }
    })->name('dashboard');});
/**
 * test用のルート
 * 

Route::get('/test', function() {
    return 'This is a test route!';
});
*/

/**
 * PDF test用のルート
 */
Route::get('/pdf', [PDFController::class, 'generatePdf']);


/**
 * Route for １Main
 */
Route::get('/', function (){return Inertia::render('Main');});

/**
 * Route for 2LogIn(Page)
 * Route for Login(Signin)
 */
Route::get('/Login', function(){return Inertia::render('Auth/Login');})->name('loginpage');
/*Route::middleware(['auth:sanctum', 'verified'])->
    get('/Main', function () { return Inertia::render('Main');})->name('main');
*/
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/page1', [\App\Http\Controllers\PageController::class, 'page1'])->name('page1');

    Route::middleware([CheckUserRole::class . ':1,2'])->group(function () {
        Route::get('/page2', [\App\Http\Controllers\PageController::class, 'page2'])->name('page2');
        Route::get('/page3', [\App\Http\Controllers\PageController::class, 'page3'])->name('page3');
    });
});

/**
 * Route for 2.1ResetPassword
 */
Route::get('/ResetPassword', function(){return Inertia::render('Auth/ResetPassword');})->name('ResetPassword');


/**
 * Route for 3Register
 */
Route::get('/register', function(){return Inertia::render('Auth/Register');})->name('register');

/**
 * Route for ４TopPage
 */
Route::get('/TopPage', function (){return Inertia::render('TopPage');});

/**
 * Route for 5ProductList
 */
Route::get('/ProductsList', function(){return Inertia::render('ProductsList');});

/**
 * Route for 6Tanks
 */
Route::get('/Tanks', function(){return Inertia::render('Tanks');});

/**
 * Route for 7Woods
 */
Route::get('/Woods', function(){return Inertia::render('Woods');});

/**
 * Route for 8Stones
 */
Route::get('/Stones', function(){return Inertia::render('Stones');});

/**
 * Route for 9Fishes
 */
Route::get('/Fishes', function(){return Inertia::render('Fishes');});

/**
 * Route for 10Plants
 */
Route::get('/Plants', function(){return Inertia::render('Plants');});

/**
 * Route for 11Products
 */
Route::get('/Products', function(){return Inertia::render('Products');});

/**
 * Route for 12Fish
 */
// Route::post('/Fish', [FishController::class, 'FishAll']);
Route::post('/Fish', [FishController::class, 'filterFish']);


/**
 * Route for 13Concept
 */
Route::get('/Concept', function(){return Inertia::render('Concept');});

/**
 * Route for 14Layout
 */
Route::get('/Layout', function(){return Inertia::render('Layout');});

/**
 * Route for 15Fishlist
 */
Route::get('/FishList', function(){return Inertia::render('FishList');});

/**
 * Route for 16FishPicks
 */
Route::get('/FishPicks', function(){return Inertia::render('FishPicks');});

/**
 * Route for 17Recommend
 */
Route::get('/Recommend', function(){return Inertia::render('Recommend');});

/**
 * Route for 18Input
 */
Route::get('/Input', function(){return Inertia::render('Input');});

/**
 * Route for 19Favorite
 */
Route::get('/Favorite', function(){return Inertia::render('Favorite');});

/**
 * Route for 20Trouble
 */
Route::get('/Trouble', function(){return Inertia::render('Trouble');});

/**
 * Route for 21Measure
 */
Route::get('/Measure', function(){return Inertia::render('Measure');});

/**
 * Route for 22Contact
 */
Route::get('/Contact', function(){return Inertia::render('Contact');});

/**
 * Route for 23Confirm
 */
Route::get('/Confirm', function(){return Inertia::render('Confirm');});

/**
 * Route for 24Complete
 */
Route::post('/Complete', [CompleteController::class, 'store'])->name('complete.store')->middleware('csrf');

/**
 * Route for 25Order
 */
Route::get('/Order', function(){return Inertia::render('Order');});

/**
 * Route for 26Noticet to Visit
 */
Route::get('/NoticetoVisit', function(){return Inertia::render('NoticetoVisit');});



/**
 * Route for Ztests
 * 
 */
Route::inertia('/test', 'test')->name('test');


Route::get('/show-env-info', function () {
    echo "Php Version: " . phpversion() . "\n";
    echo "Laravel Version: " . app()->version() . "\n";
    echo "Laravel Locale: " . json_encode(config('app.locale')) . "\n";
    echo "Laravel Config Cached: " . json_encode(config('app.cache')) . "\n";
    echo "App Debug: " . json_encode(config('app.debug')) . "\n";
    echo "App Env: " . json_encode(config('app.env')) . "\n";
});

/******************************************************************* */
/**
 * 
 * Tankテーブルから水槽に関するすべてのデータを取得
 */
Route::get('/tankdata', [TanksController::class, 'tankdata']);

/**
 * tanksizeテーブルから水槽のサイズに関するデータをすべて取得
 */
Route::get('/tanksizedata', [TanksController::class, 'tanksizedata']);

/******************************************************************* */
/**
 * 
 * Woodテーブルから流木に関するすべてのデータを取得
 */
Route::get('/wooddata', [WoodsController::class, 'wooddata']);

/**
 * Woodsizeテーブルから流木のサイズに関するデータをすべて取得
 */
Route::get('/woodsizedata', [WoodsController::class, 'woodsizedata']);

/******************************************************************* */
/**
 * 
 * Stoneテーブルから石に関するすべてのデータを取得
 */
Route::get('/stonedata', [StonesController::class, 'stonedata']);

/**
 * Stonesizeテーブルから石のサイズに関するデータをすべて取得
 */
Route::get('/stonesizedata', [StonesController::class, 'stonesizedata']);

/******************************************************************* */
/**
 * 
 * Plantテーブルから水草に関するすべてのデータを取得
 */
Route::get('/plantdata', [PlantsController::class, 'plantdata']);

/**
 * plantspeciesテーブルから水草の分類に関するデータをすべて取得
 */
Route::get('/plantfamilydata', [PlantsController::class, 'plantfamilydata']);

/**
 * phテーブルから関連する水草のデータをすべて取得
 */
Route::get('/plantphdata',[PlantsController::class, 'plantphdata']);



/******************************************************************* */
/**
 * 
 * Productテーブルから情報をすべて取得
 */
Route::get('/productdata', [ProductsController::class, 'productdata']);

/**
 * Productテーブルtanksizeを取得
 */
Route::get('/productsizedata', [ProductsController::class, 'productsizedata']);

/*****ADMIN Page Root ******/

/**
 * Route for AAdTop
 */
Route::get('/AdTop', function(){return Inertia::render('AdTop');});

/**
 * Route for DAdMain
 */
Route::get('/AdMain', function(){return Inertia::render('AdMain');});

/**
 * Route for EAdContact
 */
Route::get('/AdContact', function(){return Inertia::render('AdContact');});

/**
 * Route for FAdCustomer
 */
Route::get('/AdCustomer', function(){return Inertia::render('AdCustomer');});

/**
 * Route for HAdProducts
 */
Route::get('/AdProducts', function(){return Inertia::render('AdProducts');});


/**
 * Route for IAdMaster
 */
Route::get('/AdMaster', function(){return Inertia::render('AdMaster');});

/**
 * Route for editContact
 */
Route::resource('adcon', UserController::class);

/**
 * Route for delete contact data
 */
Route::delete('/adcontacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');