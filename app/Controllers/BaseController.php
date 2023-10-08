<?php
namespace App\Controllers;

use League\Plates\Engine;

class BaseController{
    /**
     *  URL mặc định để chuyển hướng khi không hợp lệ
     * 
     * @var string
     */
    public $redirect = '/home';
    /**
     * View Engine
     * 
     * @var \League\Plates\Engine;
     */
    public $view;

    public function __construct()
    {
        $this->init();
        if(!$this->authorize()){
            redirect($this->redirect);
        }
    }
    /**
     * Phương thức dùng để kiểm tra mỗi khi controller được gọi
     * 
     * @return void
     */
    public function authorize(){
        return true;
    }
    public function render($path, $data = [])
    {
        echo $this->view->render($path, $data);
    }
    /**
     * Hàm khởi tạo Controller
     * 
     * @return void
     */
    public function init(){
        $this->view = new Engine(config('view.path'));
    }
    
}