<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'color'];

    public function notebook()
    {
    	return $this->belongsTo('App\Notebook');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
