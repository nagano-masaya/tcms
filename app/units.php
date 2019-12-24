<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class units extends Model
{
  protected $table = 'units';
  protected $primaryKey = 'unit_id';
  protected $guarded = ['unit_id'];
  //DateTime型でデータを取得するため、$datesに登録
    //
}
