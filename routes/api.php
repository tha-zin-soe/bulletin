<?php

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//show API = http://localhost/bulletin/public/api/show_new


Route::get('show_new',function(){
    $data = News::get();
    return Response::json($data);
});

//insert new api= http://localhost/bulletin/public/api/insert_news
Route::post('insert_news',function(Request $request){
 $insert_data = [
     'user_id'=>$request->user_id,
     'title'=>$request->title,
     'photo'=>$request->photo,
     'content'=>$request->content
 ];
 News::create($insert_data);
 return "success";
});
 