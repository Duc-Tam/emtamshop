<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
class Transaction extends Model
{
    protected $guarded = [];
    protected $t_status = [
        '1'=>[
            'class' => 'default',
            'name'  => 'Đang xử lý'
        ],
        '2'  => [
            'class' => 'info',
            'name'  => 'Đang vận chuyển'
        ],
        '3'  => [
            'class' => 'success',
            'name'  => 'Đã giao hàng'
        ],
        '-1'  => [
            'class' => 'danger',
            'name'  => 'Đã hủy'
        ],
    ];
    public function getStatus(){
        return Arr::get($this->t_status,$this->status);
    }
}
