<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
  protected $table = 'orders';
  protected $primaryKey = 'order_id';
  protected $guarded = ['order_id'];
  //DateTime型でデータを取得するため、$datesに登録
  protected $dates = [
    'order_date','recept_date'
  ];
    //
}
