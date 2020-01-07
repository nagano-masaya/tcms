<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    private $DATEFORMAT;
    public function __construct()
    {
        $DATEFORMAT=config('app.dateformat');
    }

    public function db_date(string $s){
      if($s === "")
        return null;
        
      $ret =  strtotime(preg_replace("/[^0-9]+/",'',$s));
      return $ret === false ? null : $ret;
    }


    public function db_int(string $s){
      return intval(preg_replace("/[^\-0-9]+/",'',$s));
    }
}
