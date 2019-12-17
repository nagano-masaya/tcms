<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class depositdisp extends Model
{
    //
    use softDeletes;

    protected $fillable = [
      'depo_id','claim_id','price','user_id'
    ];

    protected $table = 'deposit_disp';
    //DateTime型でデータを取得するため、$datesに登録
}
