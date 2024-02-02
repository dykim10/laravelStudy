<?php

use App\Http\Controllers\Login\LoginRegisterController;
use App\Http\Controllers\Articles\ArticlesController;

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



 // ex
//Route::post('/articles', function(Request $request){
//
//	//비어있지않고, 문자열이고, 255자를 넘으면 안된다.
//	$input = $request->validate([
//		'body' => 'required|string|max:255'
//	]);
//	dd($input);
//
//	$host = config('database.connections.mysql.host');
//	$dbname = config('database.connections.mysql.database');
//	$username = config('database.connections.mysql.username');
//	$password = config('database.connections.mysql.password');
//
//	//pdo 객체
//	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//
//	//쿼리 제작
//	$stmt = $conn->prepare("INSERT INTO articles (body, user_id) values (:body, :user_id)");
//
//
//	$body = $request->input('body');
//	//쿼리 값 설정
//	$stmt->bindValue(':body', $body);
//	$stmt->bindValue(':user_id', $user_id);
//
//	dd($body);
//
//	return 'hello';
//});

// Route::get('/articles/create', function(){
//     return view('articles/create');
// });

//위의 것을 대체 한다 아래 것으로
Route::controller(ArticlesController::class)->group(function() {
	Route::get('/articles/create', 'create')->name('create');
	Route::post('/articles/save', 'save')->name('save');
});


//best
Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard')->middleware('auth');
    Route::post('/logout', 'logout')->name('logout');
});