<?php

use App\Http\Controllers\Web\Auth\LoginController;
use App\Http\Controllers\Web\Auth\LogoutController;
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

use App\Services\Ticket\TicketService;

Route::get('/', function () {
//    $test = new TicketService;
//    $test = $test->queryReportTicketPerYear();
//    return response()->json($test);
    return view('welcome');
});



//Route::get('/login', function () {
//    return view('auth.login');
//});
Route::group(['middleware' => ['guest:staff','guest:field_worker']], function () {
    Route::get('/login', [LoginController::class, 'showForm'])->name('login');
    Route::post('/login', [LoginController::class, 'submitForm'])->name('login.submit');
//    Route::post('/passwords/request-link', [ForgotPasswordController::class, 'validatePasswordRequest']);
//    Route::post('/passwords/reset/password', [ForgotPasswordController::class, 'resetPassword']);
//    Route::get('/passwords/forgot', [ForgotPasswordController::class, 'forgotForm']);
//    Route::get('/passwords/reset', [ForgotPasswordController::class, 'resetForm']);
//    Route::get('/passwords/reset', [ForgotPasswordController::class, 'resetForm']);
});
Route::post('/logout', LogoutController::class)->name('logout');


//Route::livewire('/area-position','area-position');
//Route::get('/area-position', \App\Http\Livewire\Pages\AreaPosition::class);
Route::group([
    'prefix' => '/home',
    'middleware' =>['auth:staff'], //['auth:staff', 'logging-web', 'twofa'],
    'as' => 'home'
], function () {

    Route::get('/transaksi', \App\Http\Livewire\Pages\Transaction::class);
    Route::get('/', \App\Http\Livewire\Pages\Ticket::class);
//    Route::get('/report', \App\Http\Livewire\Pages\Report::class);
//    Route::get('/report/export', \App\Http\Livewire\Components\Report\Excel\ReportDefault::class);
//    Route::get('/report/excel', [\App\Http\Controllers\Web\Exports\ExelMontlyReport::class, 'excel']);
//    Route::get('/', \App\Http\Livewire\Pages\AreaPosition::class);
//    Route::get('/', function(){
//        return view('home.home');
//    })->name('index');
});

Route::group(['middleware' => ['auth:field_worker'],'as' => 'field-worker'], function () {
    Route::get('/', \App\Http\Livewire\Pages\Workers\Field\Home::class);
});

Route::group([
    'prefix' => '/report',
    'middleware' =>['auth:staff'], //['auth:staff', 'logging-web', 'twofa'],
    'as' => 'report'
], function () {
    Route::get('/detail', \App\Http\Livewire\Pages\DetailReportTransaction::class);
    Route::get('/monthly', \App\Http\Livewire\Pages\MonthlyReportTransaction::class);
    Route::get('/dayly', \App\Http\Livewire\Pages\DaylyReportTransaction::class);
    Route::get('/yearly', \App\Http\Livewire\Pages\YearlyReportTransaction::class);
//    Route::get('/', \App\Http\Livewire\Pages\AreaPosition::class);
//    Route::get('/', function(){
//        return view('home.home');
//    })->name('index');
});
