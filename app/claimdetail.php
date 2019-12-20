<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class claimdetail extends Model
{
    //
    use softDeletes;

    protected $table = 'claimdetail';

    protected $primaryKey = 'clmdetail_id';
    protected $guarded = ['clmdetail_id'];


    protected $fillable = ['listorder','claim_id','cont_id','cont_text','title','unit_price','qty','total_price'];
    //DateTime型でデータを取得するため、$datesに登録
    protected $dates = [
      'apply_date'
    ];
}
