<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderdetail extends Model
{
  protected $table = 'orderdetail';
  protected $primaryKey = 'odrdetail_id';
  protected $guarded = ['odrdetail_id'];
  //DateTime型でデータを取得するため、$datesに登録
  protected $dates = [
  ];
    //
}
