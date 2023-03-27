<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\ProductsController;
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
/*


Route::get('/users',function () {
    return 'This is the users page';
});
Route::get('/foods',function (){
   return redirect('/users');
});
Route::get('products', [
    ProductsController::class,
    'index'
]);

*/
Route::get('/', function () {
    return view('welcome');
    //return env('MY_NAME');
});
Route::get('/register',[Authcontroller::class,'loadRegister']);
Route::post('/register',[Authcontroller::class,'studentRegister'])->name('studentRegister');