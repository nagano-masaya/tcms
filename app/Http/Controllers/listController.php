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

        public function listconstructs(Request $req){
          $list = \App\construct::select(
            ['const_id','const_name','constructs.cont_id','contructs.name'])
            ->join('contructs','constructs.cont_id','contructs.cont_id')
            ->get();
          return response()->json(["status"=>"OK","data"=>$list]);
        }

        public function listunits(Request $req){
          $list = \App\units::select(
            ['unit_id','unit_title','unittypes.unittype_title'])
            ->join('unittypes','units.unittype_id','unittypes.unittype_id')
            ->get();
          return response()->json(["status"=>"OK","data"=>$list]);
        }


}
