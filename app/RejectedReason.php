<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RejectedReason extends Model
{
      protected $fillable = ['olympiad_id', 'reason'];

      public static function new($olympiad, $reason)
      {
          return static::create([
            'olympiad_id' => $olympiad,
            'reason' => $reason
          ]);
      }

      

}
