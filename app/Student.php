<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
      const STATUS_EMPTY='Empty';
      const STATUS_ACTIVE='Active';
      const STATUS_INACTIVE='Inactive';
      protected $table='student';
      public $timestamps = false;
      protected $fillable = ['login', 'firstname', 'surname', 'lastname'];
}
