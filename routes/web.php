<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contactcontroller;
use App\Http\Controllers\testcontroller;

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
    return view('index');
})->name('/');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/post', function () {
    return view('post');
})->name('post');

Route::get('/contact', function () { return view('contact');})->name('contact');
Route::get('/contactform', [contactcontroller::class, 'contactform'])->name('contactform');


Route::get('/contactlist', [contactcontroller::class, 'show'])->name('contactlist');

Route::get('Edit/{contact_id}',[contactcontroller::class,'Edit'])->name('update');
Route::get('update/{contact_id}',[contactcontroller::class,'update'])->name('update');

Route::get('delete/{contact_id}',[contactcontroller::class,'delete'])->name('update');


// Practice on laravel

Route::get('/test',[testcontroller::class,'index'])->name('test');


// Route::get('/test','testcontroller@index')->name('test');
