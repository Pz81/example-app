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

Route::get('/', function () {
    return view('welcome');
});
Route::get('posts', function () {
    return view('posts');
});
Route::get('posts/{post}', function ($slug) {
    
    $path = __DIR__."/../resources/posts/{$slug}.html";

    if (! file_exists($path)) {

        ddd('file does not exist');
        return redirect('/');
        //abort(404);
    }

    $post = file_get_contents($path);

    return view('post', [
        'post' => $post 
    ]);
})->where('post','[A-z_\-]+');//regular expression