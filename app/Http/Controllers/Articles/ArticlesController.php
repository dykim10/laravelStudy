<?php
namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    //
	public function __construct()
	{
		$this->middleware('guest')->except([
			'logout', 'dashboard'
		]);
	}
	
	public function create()
	{
		return view('articles.create');
	}
	
	public  function save(Request $request){
		
		$input = $request->validate([
			'body' => 'required|string|max:255'
		]);

/* PDO를 활용해보기
		$host = config('database.connections.mysql.host');
		$dbname = config('database.connections.mysql.database');
		$username = config('database.connections.mysql.username');
		$password = config('database.connections.mysql.password');
		
		//pdo 객체
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		
		//쿼리 제작
		
	
		$body = $request->input('body');
		//쿼리 값 설정
		$stmt->bindValue(':body', $body);
		$stmt->bindValue(':user_id', $user_id);
*/
//		echo "<pre>";
//		print_r($input);
//		echo "</pre>";
//		exit;
		
		DB::statement("INSERT INTO articles (body, user_id) values (:body, :user_id)", ['body' => $input['body'], 'user_id' => Auth::id()]);
		
		//return 'hello';
		return redirect()->route('login')
			->withSuccess('You have logged out successfully!');
	}
}
