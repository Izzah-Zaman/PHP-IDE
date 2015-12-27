<?php

namespace App\Http\Controllers\Auth;

use App\Code;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Input;
use Auth;
use File;
use DB;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class CodeController extends Controller
{
    

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'php_code' => 'required',  
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    //protected function create(array $data)
    protected function create()
    {
       // $adobot = User::where('id', '=', '')->first();
        //$user = App\User::find($id);
       $role = Auth::user()->role;

       if($role=='User'){
        $id = Auth::id();
        $input = Input::only('code'); 
        $test= new Code;
        if (stristr($input['code'],'create table') !== false || (stristr($input['code'],'drop table')) || (stristr($input['code'],'create database')) 
            || (stristr($input['code'],'drop database')) || (stristr($input['code'],'delete')) || (stristr($input['code'],'select *'))) {
        echo "<script type='text/javascript' script-name='cabin-condensed' src='http://use.edgefonts.net/cabin-condensed.js'></script>";
        echo "<body  style='background-color:rgba(249,234,234,1)'>";
        echo "<h2 style ='font: normal 20px/normal 'cabin-condensed'', Helvetica, sans-serif'>Cannot execute this php code</h2>";
        echo "<br>";
        echo "<br>";
         echo "</body>";
                }
        else{

        $test->php_code = $input['code'];
        $test->user_id = $id;
       // $test->published_at= Carbon::now();
        $test->save();
        File::put('C:\xampp\htdocs\laravel\first-project\resources\views\auth\test.blade.php', $input['code']);
        
        return view('auth\test');}
    }
    else {
        $count = 1;
        $codes = Code::all();
        echo "<body  style='background-color:rgba(249,234,234,1)'>";
         File::put('C:\xampp\htdocs\laravel\first-project\resources\views\auth\AllCodes.php', "");
        foreach ($codes as $codes){
        echo"<h3>Code# ". $count. "</h3> ";
        highlight_string($codes->php_code);
        
        File::append('C:\xampp\htdocs\laravel\first-project\resources\views\auth\AllCodes.php', $codes->php_code);
         //File::append('C:\xampp\htdocs\laravel\first-project\resources\views\auth\AllCodes.php', "<br>");
        $count++;
        echo "<br>";
        echo "<br>";
        
        }

        echo "</body>";
        //$codes = DB::table('code')->get();

        //return view('auth\AllCodes');
    }



    }






    
}
