<?php

use App\Http\Controllers\ProductController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExportController;
use App\Repositories\UserRepository;
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
    foreach (User::all() as $users){
        echo $users->name;
    }
   /* DB::table('users')->updateOrInsert(
        ['name'=>'test1',
            'email'=>'user1@gmail.com',
            'email_verified_at'=>\Carbon\Carbon::now(),
            'password'=>'password',
            'remember_token'=>'wewewe']
    );*/


    return view('welcome');
});

Route::get('users/',function(){
    $admins=[
        ['username'=>'admin','name'=>'Ivan'],
        ['username'=>'user1','name'=>'Vasya'],
    ];
    dd($admins);
})->name('users');
Route::get('user/{id}',[UserController::class,'user'])->whereNumber('id');

Route::get('test',[UserRepository::class,'list']);
Route::get('export',ExportController::class);

Route::get('request-test',function(Request $request){
   // dd($request->input('b'));
    dd($request->b);
});
//Route::get('catalog',[CatalogController::class, 'ct']);
//Route::get('st',[Catalogontroller::class, 'spst']);

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/', [UserController::class, 'list'])->name('list');
    Route::get('{id}', [UserController::class, 'profile'])->name('profile');
    Route::get('create', [UserController::class, 'create'])->name('create');
    Route::post('store', [UserController::class, 'store'])->name('store');
    Route::put('update', [UserController::class, 'update'])->name('update');
    Route::delete('destroy', [UserController::class, 'destroy'])->name('destroy');
    });

    Route::resource('products', ProductController::class);

    Route::get('create-user', [UserController::class,'create']);



