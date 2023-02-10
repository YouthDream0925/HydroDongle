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
use App\Http\Controllers\Admin\Editer\CpuController;
use App\Http\Controllers\Admin\Editer\FeatureController;
use App\Http\Controllers\Admin\Editer\ModelController;
use App\Http\Controllers\Admin\Editer\ResellerController;
use App\Http\Controllers\Admin\Editer\HelpController;
use App\Http\Controllers\Admin\Editer\FaqController;
use App\Http\Controllers\Admin\Editer\TestController;
use App\Http\Controllers\Admin\Editer\CountryController;
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
        Route::resource('users', UserController::class);
        Route::post('users/active', [UserController::class, 'active'])->name('users.active');
    });

    Route::group(['prefix' => 'editer'], function() {
        Route::resource('brands', BrandController::class);
        Route::resource('cpus', CpuController::class);
        Route::resource('features', FeatureController::class);
        Route::post('socs/save', [CpuController::class, 'save_soc'])->name('socs.save');
        Route::post('socs/delete', [CpuController::class, 'delete_soc'])->name('socs.delete');
        Route::resource('models', ModelController::class);
        Route::resource('phones', PhoneController::class);
        Route::post('/models/data', [ModelController::class, 'data']);
        Route::resource('countries', CountryController::class);
        Route::resource('resellers', ResellerController::class);
        Route::resource('helps', HelpController::class);
        Route::resource('faqs', FaqController::class);
        Route::resource('tests', TestController::class);
    });

    Route::group(['prefix' => 'other'], function() {
        Route::resource('slides', SlideController::class);
        Route::post('slides/ads/delete', [SlideController::class, 'ads_delete']);    
        Route::get('intro', [IntroController::class, 'index'])->name('intro.index');
        Route::post('intro/save', [IntroController::class, 'save'])->name('intro.save');    
        Route::get('guide', [GuideController::class, 'index'])->name('guide.index');
        Route::post('guide/save', [GuideController::class, 'save'])->name('guide.save');    
        Route::resource('problems', ProblemController::class);
        Route::post('problems/delete', [ProblemController::class, 'delete']);
    });

    Route::group(['prefix' => 'history'], function() {
        Route::resource('updates', UpdateController::class);
        Route::get('credits/index', [CreditController::class, 'index'])->name('credits.index');
        Route::get('credits/before', [CreditController::class, 'before'])->name('credits.before');
        Route::post('credits/transfer', [CreditController::class, 'transfer'])->name('credits.transfer');
        Route::post('credits/transfer/user', [CreditController::class, 'to_user'])->name('credits.to_user');
    });    
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

Route::get('storage/cpus/{filename}', function ($filename)
{
    $path = storage_path('app/public/cpus/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('storage/features/{filename}', function ($filename)
{
    $path = storage_path('app/public/features/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('storage/models/{filename}', function ($filename)
{
    $path = storage_path('app/public/models/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('storage/points/{filename}', function ($filename)
{
    $path = storage_path('app/points/models/' . $filename);

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
    $path = storage_path('app/public/' . 'hydra.gif');

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});