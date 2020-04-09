<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected static function boot(){
        parent::boot();

        static::creating(function($reply){
            $reply->user_id = auth()->user()->id;
        });
    }
    protected $guarded = []; //ให้ผลเหมือน fillable ในตรงกันข้าม
    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function like(){
        return $this->hasMany(Like::class);
    }
}
