<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dailydetail extends Model
{
  protected $table = 'dailydetail';
  protected $primaryKey = 'daily_id';
  protected $guarded = ['daily_id'];
  //DateTime型でデータを取得するため、$datesに登録
  protected $dates = [
    'daily_date'
  ];
}
