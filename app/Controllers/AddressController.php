<?php
namespace App\Controllers;

use App\Http\Paginator;
use App\Http\Response;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;
use App\Traits\PaginatorTrait;

class AddressController extends BaseController{
    use PaginatorTrait;
    public function ward(){
        $items = Ward::paginate($this->getPerPage());
        $total = Ward::count();
        
        $paginator = new Paginator($this->request, $items, $total);
        //them tham so vao url trong cach link phan trang
        $paginator->appends('city_id','2');

        $paginator->onEachSide(2);//hien thi 2 trang truoc va trang hien tai

        if($this->request->ajax()){
            $html = $this->view->render('address/ward-list',[
                                    'items' => $items,
                                    'paginator' => $paginator
                                ]);
            return $this->json(['data' => $html]);
        }
        return $this->render('address/ward',[
                            'items' => $items,
                            'paginator' => $paginator
                        ]);
    }
    public function deleteWard(){
        $id = $this->request->post('id');
        $ward = Ward::find($id);

        if($this->request->ajax()){
            if($ward){
                if($ward->delete()){
                    return $this->json([
                        'message' => $ward->name . ' has beeb deleted successfully'], 
                        Response::HTTP_BAD_REQUEST);
                }
            }
            return $this->json([
                'message' => 'Ward ID does not exists!'
            ], Response::HTTP_NOT_FOUND);
        }
        if($ward){
            if($ward->delete()){
                session()->setFlash(\FLASH::SUCCESS,$ward->name . 'has beeb deleted successfully');
            }else{
                session()->setFlash(\FLASH::ERROR, "Unable to delete Ward");
            }
        }else{
            session()->setFlash(\FLASH::ERROR, "Ward ID does not exists!");
        }
        $return_url = $this->request->post('return_url','/home');
        return $this->redirect($return_url);
    }
}
