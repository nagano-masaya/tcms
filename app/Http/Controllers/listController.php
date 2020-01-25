<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        public function listcompanies(Request $req){
          $list = \App\company::select(['company_id','nickname','is_customer','is_subcon','is_own'])
              ->get();

          return response()->json(["status"=>"OK","data"=>$list]);
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
            ->where('constructs.cont_id',$req->cont_id)
            ->get();
          return response()->json(["status"=>"OK","data"=>$list]);
        }

        //==============================================================
        //  工事の経費一覧を取得
        //  const_id: 一覧を取得する工事の工事ID
        //==============================================================
        public function listconstcosts(Request $req){
          $rescost = \App\dailydetail::select(
                'item_id'
                ,'item_name'
                ,DB::raw('TRUNCATE(SUM(qty)/10000,0) as qty')
                ,'unit_text'
                ,DB::raw('TRUNCATE(SUM(total_price)/10000,0) as price')
            )
            ->where('const_id',$req->const_id)
            ->where('item_id','>','0')
            ->groupBy('item_id')
            ->groupBy('item_name')
            ->groupBy('unit_text')
            ->get();

            $personcost = \App\dailydetail::select(
                  'person_id'
                  ,'item_name'
                  ,DB::raw('TRUNCATE(SUM(qty)/10000,0) as qty')
                  ,'unit_text'
                  ,DB::raw('TRUNCATE(SUM(total_price)/10000,0) as price')
              )
              ->where('const_id',$req->const_id)
              ->where('person_id','>','0')
              ->groupBy('person_id')
              ->groupBy('item_name')
              ->groupBy('unit_text')
              ->get();

              return response()->json(["status"=>"OK","resource"=>$rescost,"person"=>$personcost]);
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
          $q = \App\dailydetail::select(['*',
            DB::raw('TRUNCATE(qty / 10000,0) as qty_n'),
            DB::raw('TRUNCATE(unit_price / 10000,0) as unit_price_n'),
            DB::raw('TRUNCATE(sub_total / 10000,0) as sub_total_n'),
            DB::raw('TRUNCATE(tax / 10000,0) as tax_n'),
            DB::raw('TRUNCATE(total_price / 10000,0) as total_price_n')])
                  ->where('const_id',$req->const_id);

          if(isset($req->daily_date))
            $q = $q->where('daily_date',$req->daily_date);

          $list = $q->orderBy('daily_date','desc')->orderBy('disp_order')
            ->get();
            return response()->json(["status"=>"OK","data"=>$list]);
        }

        //==============================================================
        //  商品一覧の取得（AutoComplete用）
        //==============================================================
        public function listitemsac(Request $req){
          try{
            $qItem = \App\items::select(['items.item_id',DB::raw('0 as person_id'),'item_name as title' ])
              ->join('companyitems','items.item_id','companyitems.item_id');

            $qPerson = \App\person::select([DB::raw('0 as item_id'),'person.person_id','pname as title' ]);


            // 取引先IDが指定されていたら条件に追加
            if( $req->company_id > 0){
              $qItem = $qItem->where('companyitems.company_id',$req->company_id);
              $qPerson = $qPerson->where('company_id',$req->company_id);
            }
            //キーワードが設定されていたら条件に追加
            if( !is_null($req->critria) && $req->critria->length()>0){
              $qItem = $qItem->where('items.item_name','LIKE',$req->critaria);
              $qPerson = $qPerson->where('items.item_name','LIKE',$req->critaria);
            }
            // データフェッチ

            $data = $qItem->union($qPerson)->get();

            // AutoComplete用データの生成
            //  ※同じキーワードがあったらダメじゃね？
            $list =  array();
            foreach($data as $item){
              $list[$item->title] = ['item_id'=>$item->item_id,'person_id'=>$item->person_id];
            }

            return response()->json(["result"=>"OK","id"=>$req->company_id,"data"=>$list]);
          }catch(Exception $ex)
          {
            return response()->json(["message"=>$ex->getMessage()]);
          }
        }

}
