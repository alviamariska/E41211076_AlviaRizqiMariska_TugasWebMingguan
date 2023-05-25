<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
}); //route default

Route::get('/login', function () {
    return view('login');
}); //route tmpilan login

Route::POST('/logins', function (Request $request) {
    dd($request);
});

Route::get('/there', function(){
    return "ini halaman untuk latihan route redirect";
});

Route::view('/welcome', 'welcome', ['tittle' => 'Alvia Rizqi Mariska']);

Route::get('users/{id}', function($id){
    return 'Welcome ' .$id;
 });

 Route::get('users/{id?}', function($id = null){
    return 'Welcome ' .$id;
 });

 Route::get('pengguna/{id?}', function($id = 'Alvia Rizqi Mariska'){
    return 'Welcome ' .$id;
 });

 Route::get('names/{name?}', function($name){
    return 'Welcome ' .$name;
 })->where('name','[A-Za-z]+');

 Route::get('names/{name?}', function($name){
    return 'Welcome ' .$name;
 })->where('name', '.*');

 Route::view('/login', 'login', ['tittle' => 'Login Page'])
 ->name('login');

Route::get('/user', function() {
    $url = route('users');
})->where('id', '.*');

Route::get('users/{id?}', function ($id = "Alvia") {
    return "Welcome " .$id;
})->where('name', '.*')->name('users');

Route::get('/user', function($id = "Alvia"){
    $url = route('users', [
        'id' => $id,
    ]);
    return redirect()->route('users',[
        'id' => $id,
    ]);
})->where('id', '.*');

Route::prefix('admin')->middleware(['auth','admin'])->group(function(){
    Route::get('/users', function(){
        return 'ini halaman /admin/users';
    });
    Route::get('/home', function(){
        return 'ini halaman /admin/home';
    });
    Route::get('/report', function(){
        return 'ini halaman /admin/report';
    });
});

Route::namespace('Admin')->group(function(){
    Route::get('Home', 'HomeController@index');
    Route::get('Report', 'ReportController@index');
});

Route::domain('Alvia.mayapp.com')->group(function(){
    Route::get('users/{id}', function(){
        return 'coba';
    });
});

Route::prefix('admin')->group(function(){
    Route::get('/users', function(){
        return 'ini halaman /admin/users';
    });
    Route::get('/home', function(){
        return 'ini halaman /admin/home';
    });
    Route::get('/report', function(){
        return 'ini halaman /admin/report';
    });
});