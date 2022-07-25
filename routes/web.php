<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use setasign\Fpdi\Fpdi;

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/detail/{id}', [\App\Http\Controllers\HomeController::class, 'detail'])->name('detail');
Route::post('/detail', [\App\Http\Controllers\HomeController::class, 'store'])->name('daftar');

Route::group(['middleware' => 'isAdmin','prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class);
    Route::delete('permissions_mass_destroy', [\App\Http\Controllers\Admin\PermissionController::class, 'massDestroy'])->name('permissions.mass_destroy');
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
    Route::delete('roles_mass_destroy', [\App\Http\Controllers\Admin\RoleController::class, 'massDestroy'])->name('roles.mass_destroy');
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::delete('users_mass_destroy', [\App\Http\Controllers\Admin\UserController::class, 'massDestroy'])->name('users.mass_destroy');

    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::delete('categories_mass_destroy', [\App\Http\Controllers\Admin\CategoryController::class, 'massDestroy'])->name('categories.mass_destroy');

    Route::resource('letters', \App\Http\Controllers\Admin\LetterController::class);
    Route::delete('letters_mass_destroy', [\App\Http\Controllers\Admin\LetterController::class, 'massDestroy'])->name('letters.mass_destroy');
});

// Route::get('test', function() {
//     $name = 'Samantha ming . spd';
//     $outputFile = public_path() . '/letter/sertifikat.pdf';
//     $fpdi = new FPDI;
//     $fpdi->setSourceFile(public_path() . '/sertifikat.pdf');
//     $template = $fpdi->importPage(1);
//     $size = $fpdi->getTemplateSize($template);
//     $fpdi->AddPage($size['orientation'],array($size['width'], $size['height']));
//     $fpdi->useTemplate($template);
//     $top = 108;
//     $right = 120;
//     $name = $name;
//     $fpdi->setFont('helvetica', '', 34);
//     $fpdi->SetTextColor(25,25,25);
//     $fpdi->Text($right,$top,$name);

//     $fpdi->Output($outputFile, 'F');

//     return response()->file($outputFile);

// });

Auth::routes();

