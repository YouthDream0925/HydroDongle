<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Manage\RoleController;
use App\Http\Controllers\Manage\UserController;
use App\Http\Controllers\Manage\AdminController;

use App\Http\Controllers\Admin\General\SettingController;
use App\Http\Controllers\Admin\General\TransferController;
use App\Http\Controllers\Admin\General\DongleUserController;
use App\Http\Controllers\Admin\Editer\BrandController;
use App\Http\Controllers\Admin\Editer\CpuController;
use App\Http\Controllers\Admin\Editer\FeatureController;
use App\Http\Controllers\Admin\Editer\ModelController;
use App\Http\Controllers\Admin\Editer\ResellerController;
use App\Http\Controllers\Admin\Editer\ProductController;
use App\Http\Controllers\Admin\Editer\DriverController;
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
use App\Http\Controllers\Admin\History\PaymentController;
use App\Http\Controllers\Admin\History\LicenseController;
use App\Http\Controllers\Admin\History\CreditController;

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ShopController;
use App\Http\Controllers\Front\DeviceController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\ProfileController;

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
    return redirect('home');
});

Auth::routes(['verify' => true]);

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
        Route::get('credit/setting', [SettingController::class, 'credit'])->name('website.credit.setting');
        Route::post('credit/setting', [SettingController::class, 'credit_store'])->name('website.setting.credit.store');
        Route::resource('roles', RoleController::class);
        Route::resource('admins', AdminController::class);
        Route::resource('users', UserController::class);
        Route::post('users/active', [UserController::class, 'active'])->name('users.active');
        Route::resource('dongles', DongleUserController::class);
        Route::post('dongles/active', [DongleUserController::class, 'active'])->name('dongles.active');
        Route::group(['prefix' => 'credits'], function() {
            Route::get('before', [CreditController::class, 'before'])->name('credits.before');
            Route::post('users', [CreditController::class, 'users'])->name('credits.users');
            Route::post('transfer', [CreditController::class, 'transfer'])->name('credits.transfer');
        });
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
        Route::post('/models/socs', [ModelController::class, 'socs']);
        //This route is necessay to make data entry of models.
        Route::post('/models/json', [ModelController::class, 'json'])->name('models.json');
        Route::post('/models/features', [ModelController::class, 'change_features'])->name('models.features');
        Route::resource('countries', CountryController::class);
        Route::resource('resellers', ResellerController::class);
        Route::resource('products', ProductController::class);
        Route::resource('drivers', DriverController::class);
        Route::resource('helps', HelpController::class);
        Route::resource('faqs', FaqController::class);
        Route::resource('tests', TestController::class);
    });

    Route::group(['prefix' => 'other'], function() {
        Route::resource('slides', SlideController::class);
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
        Route::resource('payments', PaymentController::class);
        Route::resource('licenses', LicenseController::class);
    });    
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('home/brand/models', [HomeController::class, 'models'])->name('models');
Route::get('download/software', [SettingController::class, 'download'])->name('download.software');
Route::get('download/drivers', [DriverController::class, 'download'])->name('download.drivers');
Route::post('download/drivers', [DriverController::class, 'drivers']);
Route::get('agents/{type}', [ResellerController::class, 'agents'])->name('agents');
Route::get('shop', [ShopController::class, 'index'])->name('shop');
Route::get('help', [HelpController::class, 'help'])->name('help');
Route::get('help/detail/{id}', [HelpController::class, 'help_detail'])->name('help.detail');
Route::get('devices', [DeviceController::class, 'index'])->name('devices');
Route::get('devices/brand/{id}', [DeviceController::class, 'brand'])->name('devices.brand');
Route::get('devices/brand/model/{id}', [DeviceController::class, 'model'])->name('devices.brand.model');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('profile/{id}', [ProfileController::class, 'index'])->name('profile');
    Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('shop/checkout/{id}', [ShopController::class, 'checkout'])->name('shop.checkout');
    Route::post('payment', [ShopController::class, 'create_payment'])->name('payment');
    Route::post('callback', [ShopController::class, 'callback'])->name('callback');
    Route::get('shop/history/{id}', [ShopController::class, 'history'])->name('shop.history');
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
    $path = storage_path('app/public/points/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('storage/products/{filename}', function ($filename)
{
    $path = storage_path('app/public/products/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('storage/avatars/{filename}', function ($filename)
{
    $path = storage_path('app/public/avatars/' . $filename);

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