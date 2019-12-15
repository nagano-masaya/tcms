<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class company extends Model
{
    //
    use softDeletes;

    protected $table = 'company';
    protected $primaryKey = 'company_id';
    protected $guarded = ['company_id'];
    //DateTime型でデータを取得するため、$datesに登録
    protected $dates = [
    ];
}
