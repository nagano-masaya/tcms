<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class claims extends Model
{
    //
    use softDeletes;

    protected $table = 'claims';
    protected $primaryKey = 'claim_id';
    protected $guarded = ['claim_id'];
    //DateTime型でデータを取得するため、$datesに登録
    protected $dates = [
      'claim_date',
      'claim_make_date',
      'claim_sent_date',
      'pay_date'
    ];
}
