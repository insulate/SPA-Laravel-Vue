<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected static function boot(){
        parent::boot();

        static::creating(function($question){
            $question->slug = str_slug($question->title);
        });
    }
    protected $fillable = ['title', 'slug', 'body','category_id', 'user_id'];
    //protected $guarded = []; //ให้ผลเหมือน fillable ในตรงกันข้าม

    public function getRouteKeyName()
    {
        return 'slug'; //ทำให้ใน Controller function show ไปค้นหาจากฟิล slug แทน id (default id)
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPathAttribute(){
        return '/question/'.$this->slug;
    }
}
