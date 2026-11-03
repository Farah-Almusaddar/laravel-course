<?php

use Illuminate\Support\Facades\Route;

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
