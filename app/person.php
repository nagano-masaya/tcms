<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class person extends Model
{
  protected $table = 'person';
  protected $primaryKey = 'person_id';
  protected $guarded = ['person_id'];

}
