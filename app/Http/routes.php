<?php

use App\Post;
use App\User;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Constants;

Route::get('/admin/posts', function () {

    return view('welcome');

});

Route::get('/', function () {

    return view('welcome');

});

Route::get('/about', function () {

    return "hi about page";

});

Route::get('/post/{id}', 'PostController@index');

///////////////

Route::get('/post/{id}/{name}/{pass}', 'PostController@show_post');

///////////////

Route::resource('posts', 'PostController');

Route::get('/contact', 'PostController@contact');

Route::get('/create', 'PostController@create');

Route::get('/contacts', function () {

    return "hi contacts page";

});

//Route::get('/post/{id}/{name}', function ($id, $name) {
//
//    return "this is post number " . $id . " " . $name;
//
//});

Route::get('/admin/posts/example', array('as' => 'admin.home', function () {

    $url = route('admin.home');

    return "sadasd" . $url;

}));

Route::get('/insertUsers', function () {

    for ($id = 0; $id <4; $id++) {

        DB::insert('insert into users (name, email , password) values (?, ?, ?)', [Str::random(7), Str::random(7), 'Dayle']);

    }

});

Route::get('/insertPosts', function () {

    for ($id = 0; $id <4; $id++) {

        DB::insert('insert into posts (user_id, title, content) values (?, ?, ?)', [Str::random(7), Str::random(7), Str::random(7)]);

    }

});

Route::get('/insertRoles', function () {

    for ($id = 0; $id <4; $id++) {

        DB::insert('insert into roles (user_id) values (?)', [Str::random(7)]);

    }

});

Route::get('/deleteUserTable', function () {

    DB::table(Constants::$usersTable)->delete();
});

Route::get('/deletePostsTable', function () {

    DB::table(Constants::$postsTable)->delete();
});

Route::get('/update', function () {

    $update = DB::update('update posts set title = "new title" where id = ?', [1]);

    return $update;

});

Route::get('/delete', function () {

    $delete = DB::delete('delete from posts where id=?', [1]);

    return $delete;

});

Route::get('/read', function () {

    $results = DB::select('select * from posts where id=?', [1]);

    return $results;

//    foreach ($results as $post){
//        return $post->title;
//    }

});


Route::group(['middleware' => ['web']], function () {

});

Route::get('/find/{id}', function ($id) {

    $posts = Post::find($id);
    return $posts->title . " " . $posts->id;

//    return $posts;

//    foreach ($posts as $post){
//        return $post->title . " " . $post->id;
//    }

});

Route::get('/findwhere', function () {

    $posts = Post::where('id', 5)->orderBy('id', 'desc')->take(1)->get();

    return $posts;

});

Route::get('/findmore', function () {

//    $posts = Post::findOrFail(4);

    $posts = Post::where('users_count', '<', 50)->firstOrFail();

    return $posts;

});

Route::get('/basicInsert1', function () {

//    $posts = Post::findOrFail(4);

    $post = Post::find(1);

    $post->title = '6 title';
    $post->content = '6 content';

    $post->save();

});

Route::get('/insertPosttt', function () {

//    $posts = Post::findOrFail(4);

    $post = Post::find(1);

    $post->title = '6 title';
    $post->content = '6 content';

    $post->save();

});

Route::get('/basicInsert2', function () {

//    $posts = Post::findOrFail(4);

    $post = Post::find(2);

    $post->title = '6 title';
    $post->content = '6 content';

    $post->save();

});

//Route::get('/create', function () {
//
//    Post::create(['title' => 'the create method', 'content' => 'the create content']);
//
//});

Route::get('/update', function () {

    Post::where('id', 5)->where('is_admin', 0)->update(['title' => 'New Title herereerer', 'content' => 'New content bardo hereeeeeeeee']);

});

Route::get('/delete', function () {

    $post = Post::find(1);

    $post->delete();

});

Route::get('/delete2', function () {

//    Post::destroy(10,11);

    Post::where('is_admin', 1)->delete();

});

Route::get('/softdelete', function () {

//    Post::destroy(10,11);

    Post::withTrashed()->where('id', 15)->get();

});

// 1 to 1 relationship

Route::get('/user/{id}/post', function ($id) {

//    Post::destroy(10,11);

    return User::find($id)->post->content;

//    Post::withTrashed()->where('id', 15)->get();

});


Route::get('/post/{id}/user', function ($id) {

//    Post::destroy(10,11);

//    return User::find($id)->post->content;

    return Post::find($id)->user->content;

//    Post::withTrashed()->where('id', 15)->get();

});

Route::get('/posts', function () {

    $posts = Post::all();

    foreach ($posts as $post){
        echo $post->title . "</br>";
    }

//    return $posts;
//    foreach ($user->posts as $post) {
//        echo $post->content;
//    }

});

Route::get('/postss', function () {

    $user = User::find(4);

    foreach ($user->posts as $post) {
        echo $post->content;
    }

});

Route::get('/user/{id}/role', function ($id) {

//    $user = User::find($id);
//
//    foreach ($user->roles as $role) {
//        echo $role->role_id . '<br>';
//    }

    return User::find($id)->roles()->orderBy('role_id', 'asc')->get();

});

Route::auth();

Route::get('/home', 'HomeController@index');
