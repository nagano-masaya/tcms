<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class deposit extends Model
{
    //
    use softDeletes;

    protected $table = 'deposit';
    protected $primaryKey = 'depo_id';
    protected $guarded = ['depo_id'];
    //DateTime型でデータを取得するため、$datesに登録
    protected $dates = [
      'depo_date'
    ];
}
