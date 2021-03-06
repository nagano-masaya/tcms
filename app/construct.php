<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class construct extends Model
{
    //
    use softDeletes;

    protected $table = 'constructs';
    protected $primaryKey = 'const_id';
    protected $guarded = ['const_id'];
    protected $dates = [
      'date_from','date_to','date_start','date_end'
    ];

}
