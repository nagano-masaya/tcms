<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderclaims extends Model
{
  protected $table = 'orderclaims';
  protected $primaryKey = 'orderclaim_id';
  protected $guarded = ['orderclaim_id'];
  //DateTime型でデータを取得するため、$datesに登録
  protected $dates = [
    'orderclaim_recept_date'
  ];

    //
}
