<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
   protected $table = 'todo';

   protected $fillable = ['activity','description','user_id'];
}