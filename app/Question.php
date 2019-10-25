<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = ['title','body'];

    public function setTitleAttribute($value)
    {
      $this->attributes['title'] = $value;
      $this->attributes['slug'] = Str::slug($value);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
