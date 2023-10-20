<?php
namespace App\Tranis;

trait UserAuthenticateTrait{
    public function authenticate($credentials){
        return false;
    }
}