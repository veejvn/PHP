<?php

namespace App\Controllers\Auth;
use App\Models\User;
use App\Controllers\BaseController;

class RegisterController extends BaseController{
    public function showRegisterForm(){
        return $this->render('auth/register');
    }

    public function register(){
        $param['username'] = $_POST['username'];
        $param['password'] = $_POST['password'];
        $param['email'] = $_POST['email'];
        $param['phone_number'] = $_POST['phone_number'];
        $param['address'] = $_POST['address'];

        $errors = [];

        $user = User::where('username',$param['username'])->first();
        if(!$user){
            User::insert([
                'username'=>$param['username'],
                'password'=>$param['password'],
                'email'=>$param['email'],
                'phone_number'=>$param['phone_number'],
                'address'=>$param['address']
            ]);
            redirect('/home');
        }else{
            $errors['username'] = "This username is already taken. Please choose another one.";
        }
        $Data = [
            'errors' => $errors,
        ];
        $this->render('auth/register',$Data);
    }
}