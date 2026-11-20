<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Usercontroller extends Controller
{
public function index(){
$users=DB::table('users')->get();
return View ('users',compact('users'));
}
public function create()
{
    $name= $_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    DB::table('users')->insert ([
        'name'=>$name,
        'email'=> $email,
        'password'=>$password
   ] );
   return redirect()->back();
}
public function delete($id){

DB::table('users')->where('id','=',$id)->delete();
return redirect()->back();

}
public  function edit($id) {
  $user=  DB::table('users')->where('id','=',$id)->first();//نجيب بيانات المستخدم للتعديل
$users = DB::table('users')->get();//2. نجيب كل المستخدمين حتى يضل الجدول ظاهر
return view('users', compact('user', 'users'));
/*
$user: المستخدم اللي ضغطنا على زر Edit تبعه، عشان تظهر بياناته في نموذج التعديل.

$users: جميع المستخدمين، عشان يضل الجدول ظاه
*/

}
public function update(){
$id = $_POST['id'];
DB::table('users')->where('id' ,'=',$id)->update([
'name'=>$_POST['name'],
'email'=>$_POST['email'],
'password' =>$_POST['password']
]);
return redirect('users');

}


}

