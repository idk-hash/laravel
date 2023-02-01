<?php

use App\Models\User;

use App\Models\Reports;
use App\Models\Products;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FridgeController;
use App\Http\Controllers\ProductController;

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

Route::get( '/',
    function () {
        return view('layout');});

Route::get( '/users', [UserController::class, 'index']);

Route::get( '/user-edit/{id}',
    function ($id) {
        return view('components.user-edit',
            ['user' => User::get()->where('id', $id)[$id-1]]);});

Route::get( '/user-add',
    function () {
        return view('components.user-add',);});

Route::get( '/content',
    function () {
        return View::make('components.content')
            ->with('products', Products::all());});

Route::get( '/dashboard',
    function () {
        return View::make('components.dashboard');});

Route::get( '/reports',
    function () {
        return View::make('components.reports')
            ->with('reports', Reports::all());});

Route::get( '{any}/menu',
    array('as' => 'menu',
    function ($any) {
        return view('components.'.$any);}));

Route::get( 'menu',
    array('as' => 'menu',
    function () {
        return view('layout');}));

Route::post( '/users/authenticate', [UserController::class, 'authenticate']);

Route::post( '/users/add', [UserController::class, 'add']);

Route::post( '/content/add', [ProductController::class, 'add']);

Route::post( '/content/retrieve', [ProductController::class, 'retrieve']);

Route::get( '/logout', [UserController::class, 'logout']);

Route::get( '/switchfridge', [FridgeController::class, 'switchFridge']);

