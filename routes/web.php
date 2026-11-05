<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
Route::get('tasks',function(){
    return view('tasks');

});
Route:: post('create', function(){
    $tasks_name= $_POST['name'];
    DB::table('tasks')->insert(['name' => $tasks_name]);
    return view('tasks');

});
