<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Quizzes extends Model
{


    public function appUsers()
    {
        return $this->belongsTo('App\User');
    }

    public function questions()
    {
        return $this->hasMany('App\Models\Questions');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tags', 'quizzes_has_tags', 'quizzes_id', 'tags_id');
       
    }
}
