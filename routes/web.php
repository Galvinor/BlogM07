<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\User;

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


Route::get('/', function () {
    $array=['name'=>"Arturo"];
    return view('welcome',$array);
});

Route::resources(([
    'posts'=>'PostController',
    'users'=>'UserController',
    'replies'=>'RepliesController',
    'tags' => 'TagController'
]));


Route::get('/about', [AboutController::class,'index'])->name('index');

Route::get('/about',function(){
    $content=file_get_contents(resource_path().'/pages/about.html');
    return view('about',['contents'=>$content]);
})->name('about');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/posts','PostController@index')->name('posts');

Route::get('/posts/create', 'PostController@create')->name('cPosts');

Route::get('/searchRes','SearchController@search')->name('searchRes');

Route::get('/profile','ProfileController@profile')->name('profile');

Route::get('/profile/edit', 'UserController@edit')->name('eProfile');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');


Route::get('/admin', 'AdminController@index')->name('admin');

