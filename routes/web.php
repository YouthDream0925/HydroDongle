<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Manage\RoleController;
use App\Http\Controllers\Manage\UserController;
use App\Http\Controllers\Manage\AdminController;

use App\Http\Controllers\Admin\General\SettingController;
use App\Http\Controllers\Admin\General\TransferController;
use App\Http\Controllers\Admin\Editer\BrandController;
use App\Http\Controllers\Admin\Editer\PhoneController;
use App\Http\Controllers\Admin\Other\SlideController;
use App\Http\Controllers\Admin\Other\IntroController;
use App\Http\Controllers\Admin\Other\GuideController;
use App\Http\Controllers\Admin\Other\ProblemController;
use App\Http\Controllers\Admin\History\UpdateController;
use App\Http\Controllers\Admin\History\CreditController;

use App\Http\Controllers\Front\HomeController;
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

Route::get('/', function () {
    return view('welcome');
    // return redirect('admin');
});

Auth::routes();

Route::group(['prefix' => 'admin'], function() {
    Route::get('',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
    Route::post('',[LoginController::class,'adminLogin'])->name('admin.login');
    
    Route::get('register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
    Route::post('register',[RegisterController::class,'createAdmin'])->name('admin.register');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function() {
    Route::get('dashboard', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::group(['prefix' => 'general'], function() {
        Route::get('setting', [SettingController::class, 'index'])->name('website.setting');
        Route::post('setting', [SettingController::class, 'store'])->name('website.setting.store');
        Route::resource('roles', RoleController::class);
        Route::resource('admins', AdminController::class);
        // Route::get('transfer', [TransferController::class, 'index'])->name('transfer.index');
        // Route::post('transfer', [TransferController::class, 'send'])->name('transfer.send');
    });

    Route::resource('editer/brands', BrandController::class);

    Route::resource('editer/phones', PhoneController::class);

    Route::resource('other/slides', SlideController::class);
    Route::post('other/slides/ads/delete', [SlideController::class, 'ads_delete']);

    Route::get('other/intro', [IntroController::class, 'index'])->name('intro.index');
    Route::post('other/intro/save', [IntroController::class, 'save'])->name('intro.save');

    Route::get('other/guide', [GuideController::class, 'index'])->name('guide.index');
    Route::post('other/guide/save', [GuideController::class, 'save'])->name('guide.save');

    Route::resource('other/problems', ProblemController::class);
    Route::post('other/problems/delete', [ProblemController::class, 'delete']);

    Route::resource('history/updates', UpdateController::class);

    Route::get('history/credits/index', [CreditController::class, 'index'])->name('credits.index');
    Route::get('history/credits/before', [CreditController::class, 'before'])->name('credits.before');
    Route::post('history/credits/transfer', [CreditController::class, 'transfer'])->name('credits.transfer');
    
    // Route::resource('general/users', UserController::class);
});

Route::middleware(['auth'])->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::get('storage/{filename}', function ($filename)
{
    $path = storage_path('app/public/logo/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('storage/brands/{filename}', function ($filename)
{
    $path = storage_path('app/public/brands/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('storage/slides/{filename}', function ($filename)
{
    $path = storage_path('app/public/slides/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('storage/sample/brand', function ()
{
    $path = storage_path('app/public/' . 'hydra.png');

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});