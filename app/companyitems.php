<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class companyitems extends Model
{
  protected $table = 'companyitems';
  protected $fillable = ['company_id','item_id','person_id'];
}
