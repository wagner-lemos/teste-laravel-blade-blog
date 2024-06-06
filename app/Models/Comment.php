<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['comment','user_id','post_id'];

    protected $dates = ['created_at', 'updated_at'];

    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\Models\Users');
    }
    public function post() {
        return $this->belongsTo('App\Models\Post');
    }
}
