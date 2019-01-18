<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    //
    protected $table='todolists';
    protected $fillable=['list','note_id'];

public function note()
    {
    	return $this->belongsTo('App\Models\Note','note_id');
    }

}
