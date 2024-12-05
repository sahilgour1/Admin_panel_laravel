<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('registerform');
});
Route::get('loginform', function () {
    return view('loginform');
})->name('loginform');

Route::post('/register_user', [UserController::class,'register_user']);
Route::post('/login', [UserController::class,'login']);
Route::get('/dashboard', [UserController::class,'dashboard']);

Route::get('registerform', function () {
    return view('registerform');
})->name('registerform');

Route::post('insertblog', [UserController::class,'insertblog']);
Route::get('bloglist', [UserController::class, 'bloglist'])->name('bloglist');


Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/editblog/{id}', [UserController::class, 'editblog'])->name('editblog');
Route::post('/userdatatable', [UserController::class,'userdatatable']);
Route::post('/updateblog', [UserController::class,'updateblog'])->name('updateblog');
Route::get('/deleteblog/{id}', [UserController::class, 'deleteblog'])->name('deleteblog');
Route::match(['get', 'post'], '/healthdatatable', [UserController::class, 'healthlist'])->name('healthlist');

Route::get('healthlist', function () {
    return view('bloghealthlist');
})->name('healthlist');

Route::get('bloglist', function () {
    return view('bloglist');
})->name('bloglist');

Route::get('educationlist', function () {
    return view('blogeducationlist');
})->name('educationlist');

Route::match(['get', 'post'], '/blogeducationdatatabel', [UserController::class, 'blogeducationlist'])->name('blogeducationlist');

