<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\DB;
use Illuminate\Http\Model;
use Illuminate\Http\Auth;

class listController extends Controller
{
        public function __construct()
        {
            $this->middleware('auth');

        }

        //==================================================
        // 工事一覧のリクエスト処理
        //==================================================
        public function listpersons(Request $req){
          $list = \App\person::get();

          return response()->json(["status"=>"OK","data"=>$list]);
        }

        public function listcontructs(Request $req){
        }
        public function listcompanys(Request $req){
        }
        public function persons(Request $req){
        }
}
