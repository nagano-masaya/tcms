<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
  protected $table = 'payments';
  protected $primaryKey = 'payment_id';
  protected $guarded = ['payment_id'];
  //DateTime型でデータを取得するため、$datesに登録
  protected $dates = [
    'disposal_date','payed_date','pay_confirm_date'
  ];
}
