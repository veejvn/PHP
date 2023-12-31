<?php
namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Traits\UserAuthenticateTrait;

class LoginController extends BaseController{
    use UserAuthenticateTrait;

    public function showLoginFrom(){
        if(check_login() == true){
            $this->redirect("/home");
        }
        $error = [];
        return $this->render('auth/login');
    }

    public function login(){
        $credentials = $this->getCredentials();
        $user = $this->authenticate($credentials);
        if($user){
            $user->password = null;
            //$_SESSION['user'] = serialize($user);//chuyển model sang chuỗi
            session()->set('user', serialize($user));
            if(isset($_POST['remember_me'])){
                //chuyển mảng sang chuỗi để mã hóa
                $str = serialize($credentials);
                //hàm mã hóa chuỗi trong helpers
                $enctypted = encrypt($str, ENCRYPTION_KEY);
                setcookie('credentials', $enctypted, time() + (86400 * 30));
            }
            session()->setFlash(\FLASH::SUCCESS, 'Login successfully');
            //redirect("/home");
            $this->redirect("/home");
        }
        $error[] = 'Username or password is invalid!';
        return $this->render('auth/login', ['errors' => $error]);
    }

    public function getCredentials(){
        return[
            'username' => $_POST['username'] ?? null,
            'password' => $_POST['password'] ?? null
        ];
    }
    public function logout(){
        $this->signout();
        $this->session->setFlash(\FLASH::INFO, 'Bye!');
        $this->redirect('/home');
    }
 }