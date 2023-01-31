<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Manage\RoleController;
use App\Http\Controllers\Manage\UserController;
use App\Http\Controllers\Manage\AdminController;

use App\Http\Controllers\Admin\General\SettingController;
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

Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin',[LoginController::class,'adminLogin'])->name('admin.login');

Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');

Route::middleware(['auth:admin'])->group(function() {
    Route::get('/admin/dashboard', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/general/setting', [SettingController::class, 'index'])->name('website.setting');
    Route::post('/admin/general/setting', [SettingController::class, 'store'])->name('website.setting.store');

    Route::resource('/admin/editer/brands', BrandController::class);

    Route::resource('/admin/editer/phones', PhoneController::class);

    Route::resource('/admin/other/slides', SlideController::class);
    Route::post('/admin/other/slides/ads/delete', [SlideController::class, 'ads_delete']);

    Route::get('/admin/other/intro', [IntroController::class, 'index'])->name('intro.index');
    Route::post('/admin/other/intro/save', [IntroController::class, 'save'])->name('intro.save');

    Route::get('/admin/other/guide', [GuideController::class, 'index'])->name('guide.index');
    Route::post('/admin/other/guide/save', [GuideController::class, 'save'])->name('guide.save');

    Route::resource('/admin/other/problems', ProblemController::class);
    Route::post('/admin/other/problems/delete', [ProblemController::class, 'delete']);

    Route::resource('/admin/history/updates', UpdateController::class);

    Route::resource('/admin/history/credits', CreditController::class);

    Route::resource('/admin/general/roles', RoleController::class);
    Route::resource('/admin/general/admins', AdminController::class);
    // Route::resource('/admin/general/users', UserController::class);
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