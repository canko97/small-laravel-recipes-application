<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'recipe_name',
        'author',
        'content',
        'country',
        'type',
    ];
}
