<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\DevicesandlocationController;
use App\Http\Controllers\RandomController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\WebsiteController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/login', function (Request $request) {
    return jsend_fail("The request is unauthenticated , Please authenticate and send a bearer token in your request");
})->name('login');

Route::prefix('v1')->group(function (){
	Route::prefix('auth')->group(function (){
		Route::post('register',[RegisterController::class,'SignUp']);
		Route::post('checkusername', [RegisterController::class, 'checkUsername']);
		Route::post('login',[LoginController::class,'Login']);
	});

	Route::middleware('auth:sanctum')->prefix('user')->group(function(){
			//user email Id routes
			Route::prefix('email')->group(function (){
				Route::post('',[EmailController::class,'create']);
				Route::delete('',[EmailController::class, 'delete']);
				Route::patch('',[EmailController::class,'update']);
				Route::get('',[EmailController::class,'get']);
				Route::get('{id}',[EmailController::class,'getById']);
		});
			//password
			Route::prefix('password')->group(function (){
				Route::post('',[PasswordController::class,'create']);
				Route::delete('',[PasswordController::class, 'delete']);
				Route::patch('',[PasswordController::class,'update']);
				Route::get('',[PasswordController::class,'get']);
				Route::get('{id}',[PasswordController::class,'getById']);
		});
	});

});

Route::post('website',[WebsiteController::class,'create']);
Route::post('address',[AddressController::class,'useraddress']);
Route::post('devicesandlocations',[DevicesandlocationController::class,'devicedetails']);
Route::post('encrypt',[RandomController::class,'encrypt']);
Route::post('decrypt',[RandomController::class,'decrypt']);
Route::get('password',[PasswordController::class,'get']);
