<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Model{
    use SoftDeletes; // sử dụng phương thức xóa mềm

    /**
     * Tên bảng, nếu không có thuộc tính này
     * Eloquent sẽ lấy tên theo tên của Model ở dạng số nhiều
     * 
     * @var string
     */
    protected $table = 'users';

    /**
     * Sử dụng các thuộc tính created_at và updated_at trong bảng
     * 
     * @var boolean
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password'
    ];
}