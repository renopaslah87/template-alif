<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', fn () => view('pages.demo'));
Route::get('/demo', fn () => view('pages.demo'))->name('demo');
Route::get('/demo-simple', fn () => view('pages.demo-simple'))->name('demo.simple');

// Auth pages (UI template only — tidak terhubung ke logic auth)
Route::get('/login', fn () => view('pages.login'))->name('login');
Route::get('/register', fn () => view('pages.register'))->name('register');
