<?php
if(!function_exists('config')){
    /**
     * 
     * @param string $key
     * @return array|string|mix
     */
    function config($key){
        /**
         * @var array|mixed
         */
        $config = $GLOBALS['config'];
        return $config->get($key);
    }
}
if(!function_exists('redirect')){
    function redirect($location){
        if(ob_get_level()){
            ob_end_clean();
        }
        header('Location' . $location);
        exit();
    }
}
/**
 * Trả về User model nếu đã login
 * 
 * @return \App\Models\User|mixed
 */
function auth(){
    $userSerialized = $_SESSION['user'] ?? null;
    $user = $userSerialized ? unserialize($userSerialized) : null;
    return $user;
}