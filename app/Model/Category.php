<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];  //ให้ผลเหมือน fillable ในตรงกันข้าม
    public function getRouteKeyName()
    {
        return 'slug'; //ทำให้ใน Controller function show ไปค้นหาจากฟิล slug แทน id (default id)
    }
}
