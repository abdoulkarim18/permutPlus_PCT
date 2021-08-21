<?php

use App\Http\Controllers\Admin\ADrenController;
use App\Http\Controllers\Admin\AIepController;
use App\Http\Controllers\Admin\ASchoolController;
use App\Http\Controllers\Admin\ALocalityController;
use App\Http\Controllers\Admin\APermutController;
use App\Http\Controllers\Admin\AUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotifController;
use App\Http\Controllers\PermutationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('accueil');
Route::get('search', [HomeController::class, 'search'])->name('search');
Route::get('result', [HomeController::class, 'result'])->name('result');
Route::get('/inspection/{id}', [PermutationController::class, 'inspections'])->name('inspections');
Route::get('/ecoles/{id}', [PermutationController::class, 'ecoles'])->name('ecoles');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::group(['middleware', ['auth']], function(){
    //Route admin
    Route::resource('admin-users', AUserController::class);
    Route::resource('admin-localities', ALocalityController::class);
    Route::resource('admin-avis', APermutController::class);
    Route::resource('admin-drens', ADrenController::class);
    Route::resource('admin-school', ASchoolController::class);
    Route::resource('admin-ieps', AIepController::class);
    Route::post('importExcelDren', [ADrenController::class, 'importExcelDren'])->name('importExcelDren');
    Route::post('importExcelIep', [AIepController::class, 'importExcelIep'])->name('importExcelIep');
    Route::post('importExcelLocality', [ALocalityController::class, 'importExcelLocality'])->name('importExcelLocality');
    Route::post('importExcelSchool', [AShoolController::class, 'importExcelSchool'])->name('importExcelSchool');


    // route coté client
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/password', [DashboardController::class, 'pass'])->name('password_update');
    Route::put('/password', [DashboardController::class, 'updatePass']);
    Route::resource('/avis', PermutationController::class);
    Route::get('/postuler/{id}', [PermutationController::class, 'postuler'])->name('apply');
    Route::post('/postuler', [PermutationController::class, 'applyFor'])->name('envoi.notif');
    Route::get('notification', [NotifController::class, 'index'])->name('notif');
    Route::get('notification/{user}/{customRequest}/{notification}', [NotifController::class, 'edit'])->name('notif.edit');
    Route::get('message-accepted/{user}/{id}/{notification}', [NotifController::class, 'messageAccepted'])->name('messageAccepted');
    Route::put('/confirm-custom-request/{customRequestId}', [NotifController::class, 'confirmCustomRequest'])->name('confirm');
    Route::get('/fiche-permutations/{userId}', [NotifController::class, 'download'])->name('exportPdf');
    Route::get('/fiche-permutation/{id}', [NotifController::class, 'createPdf'])->name('createPdf');
    Route::get('users/edit/{id}', [UserController::class, 'editUser'])->name('editUser');
    Route::put('users/edit/{id}', [UserController::class, 'updateUser'])->name('updateUser');

});


require __DIR__.'/auth.php';
