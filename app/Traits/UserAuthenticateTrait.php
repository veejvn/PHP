<?php
namespace App\Traits;

use App\Models\User;

trait UserAuthenticateTrait{
    /**
     * @param array $credentials
     * @return \Auth\Models\User|mixed|null
     */
    public function authenticate($credentials){
        $user = User::where(['username' => $credentials['username']])->first();
        if($user){
            //kiem tra mat khau nhap voi mat khau da bam trong csdl
            //if(password_check($credentials['password'], $user->password)){
                return $user;
            //}
            //return null;
        }
        return null;
    }
    public function signout(){
        unset($_SESSION['user']);
        if(isset($_COOKIE['credentials'])){
            setcookie('credentials', null, time() - 3600);
        }
    }
}