<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //
    protected $table='notes';
    protected $fillable=['note'];
    public function todolist()
    {
    	return $this->hasMany('App\Models\Todolist');
    }

}
