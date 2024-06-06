<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['title','description','image','date','user_id'];

    protected $dates = ['created_at', 'updated_at', 'date'];
    protected $casts = ['updated_at' => 'date:d/m/Y'];

    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'post_id');
    }
}
