<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;
use App\Models\Contact;

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

Route::get('/', [ContactsController::class, 'top'])->name('top');
Route::post('/confirm', [ContactsController::class, 'confirm'])->name('confirm');
Route::post('/process', [ContactsController::class, 'process'])->name('process');
Route::get('/complete', [ContactsController::class, 'complete'])->name('complete');
Route::get('/index', [ContactsController::class, 'index'])->name('index');
Route::get('/delete', function () {Contact::find()->delete();});
