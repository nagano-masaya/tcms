<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class claimdetail extends Model
{
    //
    use softDeletes;

    protected $table = 'claimdetail';
    //DateTime型でデータを取得するため、$datesに登録
    protected $dates = [
      'apply_date'
    ];
}
