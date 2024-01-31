<?php

use App\Http\Controllers\Login\LoginRegisterController;
use Illuminate\http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

 Route::get('/articles/create', function(){
     return view('articles/create');
 });

Route::post('/articles', function(Request $request){

//	echo "<pre>";
//	print_r($request);
//	echo "</pre>";
	//비어있지않고, 문자열이고, 255자를 넘으면 안된다.
	$credentials = $request->validate([
		'body' => 'required|string|max:255'
	]);
	//        $credentials = $request->validate([
	//            'email' => 'required|email',
	//            'password' => 'required'
	//        ]);
	
	return 'hello';
});


Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});