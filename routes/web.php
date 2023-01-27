<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\General\SettingController;
use App\Http\Controllers\Admin\Editer\BrandController;

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
    // return view('welcome');
    return redirect('admin');
});

Auth::routes();

Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin',[LoginController::class,'adminLogin'])->name('admin.login');

Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::middleware(['auth:admin'])->group(function() {
    Route::get('/admin/dashboard', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/general/setting', [SettingController::class, 'index'])->name('website.setting');
    Route::post('/admin/general/setting', [SettingController::class, 'store'])->name('website.setting.store');

    Route::resource('/admin/editer/brands', BrandController::class);

    // Route::controller(BrandController::class)->group(function(){
    //     Route::get('/admin/editer/brands', 'index')->name('brands.index');
    //     Route::post('brands', 'store')->name('brands.store');
    //     Route::get('brands/create', 'create')->name('brands.create');
    //     Route::get('brands/{brand}', 'show')->name('brands.show');
    //     Route::put('brands/{brand}', 'update')->name('brands.update');
    //     Route::delete('brands/{brand}', 'destroy')->name('brands.destroy');
    //     Route::get('brands/{brand}/edit', 'edit')->name('brands.edit');
    // });
});

Route::get('storage/{filename}', function ($filename)
{
    $path = storage_path('app/logo/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});