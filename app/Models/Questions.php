<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model {
       /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'questions';

    public function levels()
    {
        return $this->belongsTo('App\Models\Levels');
    }

    public function answers(){
        return $this->hasMany('App\Models\Answers');
       
    }
    
    public function rightAnswer(){
        return $this->hasOne('App\Models\Answers');

    }

    
  
}