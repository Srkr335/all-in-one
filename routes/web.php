<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductimageController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\Auth\ForgotPasswordController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware'=>'auth'],function(){


    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy'])->name('destroy');
    
    Route::resource('roles', RoleController::class);
    Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy'])->name('destroy');
    Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole'])->name('addPermissionToRole');
    Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole'])->name('givePermissionToRole');
    Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole'])->name('addPermissionToRole');
    
    
    Route::resource('users', Usercontroller::class);
    Route::get('users/{userId}/delete', [Usercontroller::class, 'destroy'])->name('user.destroy');
});





    Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $categories=Category::get();
        return view('dashboard',compact('categories'));
    })->middleware(['auth', 'verified'])->name('dashboard');
    Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
    Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
    });

    Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
                                            // Forgot Password
    Route::get('forgot-password', [AdminController::class, 'forgotPassword'])->name('forgot.password');
    Route::post('/do-forgot-password', [AdminController::class, 'doForgotPassword'])->name('do.password.forgot');
    Route::get('reset-password/{token}', [AdminController::class, 'resetPassword'])->name('reset.password');
        // Route::get('/categories', [CategoryController::class, 'index'])->name('index');
    Route::get('dashboard/create', [CategoryController::class, 'create'])->name('create');
    Route::post('dashboard/create', [CategoryController::class, 'store'])->name('store');
    Route::get('/categories/{id}/edit',[CategoryController::class, 'edit'])->name('edit');
    Route::PUT('/categories/{id}/edit',[CategoryController::class, 'update'])->name('update');
    Route::get('/categories/{id}/delete',[CategoryController::class, 'delete'])->name('delete');
                                    // ProductimageController
    Route::get('/categories/{productId}/upload', [ProductimageController::class, 'index'])->name('index');
    Route::post('/categories/{productId}/upload', [ProductimageController::class, 'store'])->name('store');
    Route::get('product-image/{productImageId}/delete',[ProductimageController::class, 'delete'])->name('delete');
                                        // ContactUsController
    Route::get('/contact-us', [ContactUsController::class, 'showForm'])->name('contact.us');
    Route::post('/contact-us', [ContactUsController::class, 'submitForm'])->name('contact.us.submit');
                                        // GalleryController
    Route::get('gallery', [GalleryController::class, 'index'])->name('index');
    Route::get('gallery/upload', [GalleryController::class, 'create'])->name('create');
    Route::post('gallery/upload', [GalleryController::class, 'store'])->name('store');
    Route::get('gallery/{galleryId}/delete', [GalleryController::class, 'destory'])->name('destory');

    Route::get('/products', [ProductController::class, 'index'])->name('products');



                                require __DIR__.'/auth.php';