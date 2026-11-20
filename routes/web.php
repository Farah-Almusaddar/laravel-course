<?php

use App\Http\Controllers\Taskcontroller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about',function(){
    $name='Farah';
     $department=[
         '1' => 'Technical',
          '2' => 'Financial',
           '3' => 'Sales',
    ];
    //return view('about',['name'=>$name]);
    //return view('about') ->with('name',$name);
     return view('about',compact('name'),'departments') ;


});
Route::post('/about', function(){

    $name = request('name');

    $departments = [
        '1' => 'Technical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];

    return view('about', compact('name', 'departments'));

});


Route::get('tasks', [Taskcontroller::class,'index']);

Route:: post('create',  [Taskcontroller::class, 'create']);

Route::post('delete/{id}', [Taskcontroller::class,'delete']);


Route::post('edit/{id}',[Taskcontroller::class,'edit']);

Route::post('update', [Taskcontroller::class,'update']);

Route::get('app', function() {
   return view('layouts.app');
});

Route::get('users', [UserController::class, 'index']);

Route::post('users/create', [UserController::class, 'create']);

Route::post('users/delete/{id}', [UserController::class, 'delete']);

Route::post('users/edit/{id}', [UserController::class, 'edit']);

Route::post('users/update', [UserController::class, 'update']);

