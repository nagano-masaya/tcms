<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class items extends Model
{
  protected $table = 'items';
  protected $primaryKey = 'item_id';
  protected $guarded = ['item_id'];
}
