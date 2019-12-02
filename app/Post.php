<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected  $fillable = [
        'title',
        'content'
    ];

    public function fillable(array $fillable)
    {
        return parent::fillable($fillable); // TODO: Change the autogenerated stub
    }

    protected function user(){

        return $this->hasOne('App\Post', 'id');

    }


}