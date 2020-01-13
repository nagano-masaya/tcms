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
        // 社員一覧の取得
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

        //==============================================================
        //  工事一覧の取得
        //==============================================================
        public function listconstructs(Request $req){
          $list = \App\construct::select(
            ['const_id','const_name','constructs.cont_id','contructs.name'])
            ->join('contructs','constructs.cont_id','contructs.cont_id')
            ->get();
          return response()->json(["status"=>"OK","data"=>$list]);
        }

        //==============================================================
        //  単位一覧の取得
        //==============================================================
        public function listunits(Request $req){
          $list = \App\units::select(
            ['unit_id','unit_title','unittypes.unittype_title'])
            ->join('unittypes','units.unit_type','unittypes.unittype_id')
            ->orderBy('unittypes.unittype_id')
            ->get();
          return response()->json(["status"=>"OK","data"=>$list]);
        }

        //==============================================================
        //  取引先一覧の取得
        //==============================================================
        public function listcompany(Request $req){
          $list = \App\company::select()
            ->where('is_subcon',"1")
            ->orderBy('nickname')
            ->get();
          return response()->json(["status"=>"OK","data"=>$list]);
        }

        //==============================================================
        //  日報の取得
        //==============================================================
        public function listdaily(Request $req){
          $list = \App\dailydetail::select()
            ->where('daily_date',$req->daily_date)
            ->where('const_id',$req->const_id)
            ->orderBy('disp_order')
            ->get();
            return response()->json(["status"=>"OK","data"=>$list]);
        }
}
