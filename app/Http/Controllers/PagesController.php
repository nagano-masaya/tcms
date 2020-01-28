<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

require('controlHelper.php');

class PagesController extends CommonController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //==================================================
    // 工事一覧のリクエスト処理
    //==================================================
    public function contruct(Request $request){

      if(isset($request->cont)){
        \App\contruct::where('cont_id',intval($request->cont))
                  ->delete();
      }

      $cons = DB::table('contructs')
          ->whereNull('deleted_at')
          ->get();

      return view('Pages.contruct',['cons' => $cons]);
    }


    //==================================================
    //  工事編集画面のリクエスト処理（GET)
    //==================================================
    public function contDetaile(Request $request){

      $con = \App\contruct::firstOrNew(['cont_id' => $request->cont]);
      // オリジナルデータとしてセッションに保持させる
      $request->session()->put('contdetaile_org_data',$con);

      // 工事一覧取得
      $const = \App\construct::select()
          ->where("cont_id", $request->cont)
          ->get();

      return view('pages.contdetaile',['con' => $con, 'consts'=>$const]);
    }

    function bint(string $s){
      return intval(str_replace($s,'',','))*10000;
    }

    //==================================================
    //  工事編集画面のリクエスト処理（POST)
    //==================================================
    public function conDetailSave(Request $request){
        $con = $request->session()->get('contdetaile_org_data');
        $msg = "OK";

        return  DB::transaction(function () use ($request,$con) {
            $con->name = $request->name;
            $con->price = $this->db_int($request->price)*10000;
            $con->date_from = $this->db_date($request->date_from);
            $con->date_to = $this->db_date($request->date_to);
            $con->customer = $request->customer;
            $con->cust_company = $request->cust_company;
            $con->cust_person = $request->cust_person;
            $con->budget_remain = $this->db_int($request->budget_remain)*10000;
            $con->state = $request->state;
            $con->memo = json_decode($request->memo);
            $con->exec_budget = $this->db_int($request->exec_budget)*10000;
            $con->price_taxed = $this->db_int($request->price_taxed)*10000;
            $con->claim_remain = $this->db_int($request->claim_remain)*10000;
            $con->deposit_remain = $this->db_int($request->deposit_remain)*10000;
            $con->sales_person = $request->sales_person;
            $con->const_admin = $request->const_admin;
            $con->update_by = 0;
            $con->save();

            $const_list = array();
            $consts = json_decode($request->consts);

            foreach ($consts as $const) {
              $id = intval($const->const_id);
              if($const->deleted>0 ){
                  if($id>0){
                    \App\construct::delete('const_id',$id);
                  }
              }else{
                $ret = \App\construct::updateOrCreate(
                    ['const_id'=>$id],
                    [
                      'cont_id'=>$this->db_int($con->cont_id),
                      'user_id'=>Auth::user()->id,
                      'const_type_id'=>0,
                      'const_type_name'=>$const->const_type,
                      'const_name'=>$const->const_name,
                      'date_from'=>$this->db_date($const->const_date_from),
                      'date_to'=>$this->db_date($const->const_date_to),
                      'date_start'=>$this->db_date($const->const_date_start),
                      'date_end'=>$this->db_date($const->const_date_end),
                      'person_id'=>$this->db_int($const->const_person_id),
                      'person_name'=>$const->const_person_name,
                      //'state' => $const->state,
                      'progress' => $this->db_int($const->const_progress),
                      'exec_budget' => $this->db_int($const->exec_budget)*10000,
                      'resource_cost' => $this->db_int($const->resource_cost)*10000,
                      'person_cost' => $this->db_int($const->person_cost)*10000
                    ]
                  );
                  $const_list[$const->row_id] = $ret->const_id;
              }
            }

            return response()->json([
              "status"=>"OK",
              "cont_id"=>$con->cont_id,       /* 追加されたレコードのIDを返却*/
              "consts"=>$const_list
            ]);
          });
    }

    //==================================================
    //  現場編集画面のリクエスト処理（GET)
    //==================================================
    public function constDetaile(Request $request){

      $con = \App\construct::firstOrNew(['const_id' => $request->const_id]);
      // オリジナルデータとしてセッションに保持させる
      $cont = $request->session()->get('contdetaile_org_data');

      return view('pages.constdetaile',['con' => $con,'cont'=>$cont]);
    }

    //==================================================
    //  請求一覧のリクエスト処理（GET)
    //==================================================
    public function claimlist(Request $request){
      $cons = \App\claims::select()
          ->join('company','claims.company_id','company.company_id')
          ->whereNull('claims.deleted_at')
          ->get();

      $conts = \App\contruct::select('cont_id','name')
          ->join('company','contructs.cust_company_id','company.company_id')
          ->get();
      return view('Pages.claimlist',['cons' => $cons,'conts'=>$conts]);
    }

    public function claimdetail(Request $request){

      $cid="0";
      if(isset($request->cid) && intval($request->cid)>0){
        //  既存データ
        $cid=$request->cid;
        $con = \App\claims::select()
          ->leftJoin('company','claims.company_id','company.company_id')
          ->firstOrNew(['claim_id' => $request->cid]);
        // オリジナルデータとしてセッションに保持させる
        $company_id = $con->company_id;
      }else{
        //　新規データ
        $company_id = intval($request->cmp);
        $company = \App\company::select()
          ->where('company_id',$company_id)
          ->first();

        $con = \App\claims::firstOrNew(['claim_id' => $request->cid]);
        $con->claim_id = 0;
        $con->company_id = $company_id;
        $con->nickname = $company->nickname;
        $con->pay_price = 0;
      }

      $request->session()->put('claimdetaile_org_data',$con);

      $details = \App\claimdetail::select()
        ->where('claim_id',$cid)
        ->get();

      $conts = \App\contruct::select()
        ->where('cust_company_id','=',$con->company_id)
        ->get();

      //return view('Pages.test',['con' => $con,'conts'=>$conts ]);
      return view('Pages.claimdetail',['con' => $con,'conts'=>$conts ,'details'=>$details]);

    }

    public function claimdetailSave(Request $request){

      $con = $request->session()->get('claimdetaile_org_data');

      if( $con == null){
        return "NULL";
      };
      $flds = [
        'company_id'=>$request->company_id,
        'user_id'=>Auth::user()->id,
        'price'=>$request->price*10000,
        'claim_date'=>$request->claim_date,
        'claim_make_date'=>$request->claim_make_date,
        'claim_sent_date'=>$request->claim_sent_date,
        'pay_date'=>$request->pay_date,
        'pay_price'=>$request->pay_price*10000,
        'price_total'=>$request->price_total*10000,
        'tax_rate'=>$request->tax_rate,
        'tax'=>$request->tax*10000,
        'taxed_price'=>$request->taxed_price*10000,
        'discount_price'=>$request->discount_price*10000,
        'offset_price'=>$request->offset_price*10000
      ];
      var_dump($flds);

      return DB::transaction(function () use ($request,$con,$flds) {
        //$con->claim_id = $request->claim_id;


        $id = \App\claims::updateOrCreate(
          ['claim_id'=>$request->claim_id],$flds
        );
/*
        $con->company_id = $request->company_id;
        $con->user_id = Auth::user()->id;
        $con->price = $request->price*10000;
        $con->claim_date = $request->claim_date;
        $con->claim_make_date = $request->claim_make_date;
        $con->claim_sent_date = $request->claim_sent_date;
        $con->pay_date = $request->pay_date;
        $con->pay_price = $request->pay_price*10000;
        $con->price_total = $request->price_total*10000;
        $con->tax_rate = $request->tax_rate;
        $con->tax = $request->tax*10000;
        $con->taxed_price = $request->taxed_price*10000;
        $con->discount_price = $request->discount_price*10000;
        $con->offset_price = $request->offset_price*10000;
        $con->history = $request->history;
        $con->save();
*/
        print("claim saved\n");

        $details = json_decode($request->details);
        $idx=0;
        $res = [];
        foreach($details as $itm){
          if($itm->deleted == true){
            if($itm->clmdetail_id!=0){
              \App\claimdetail::destroy($itm->clmdetail_id);
            }
          }else{
            $id = \App\claimdetail::updateOrCreate(
              [
                'clmdetail_id'=>$itm->clmdetail_id
              ],
              [
                'clmdetail_id'=>$itm->clmdetail_id,
                'listorder'=>$idx,
                'claim_id'=>$con->claim_id,
                'cont_id'=>$itm->cont_id,
                'cont_text'=>$itm->cont_text,
                'title'=>$itm->text,
                'unit_price'=>$itm->unit_price*10000,
                'qty'=>$itm->qty*10000,
                'total_price'=>$itm->price*10000,
              ]);
          }
          array_push($res,['rowid'=>$itm->rowid,'clmdetail_id'=>$id->clmdetail_id ]);
        };

        return '{"status":"OK","data":'.json_encode($res)."}" ;
      });
    }


    //==================================================
    // 支払一覧のリクエスト処理
    //==================================================
    //('company','claims.company_id','=','company.company_id')
    public function deposits(Request $request){
      $depos = \App\deposit::select()
        ->leftJoin('company','deposit.company_id','=','company.company_id')
        ->get();

      $coms = \App\company::select()
        ->get();

      return view('pages.deposit',['depos'=>$depos,'coms'=>$coms]);
    }

    //==================================================
    // 支払明細のリクエスト処理
    //==================================================
    //('company','claims.company_id','=','company.company_id')
    public function depositdetail(Request $request){


      $disps = null;
      $did=isset($request->did) ? $request->did : 0;

      ///----------------------------------------
      //　入金情報を取得
      $depo = \App\deposit::select()
        ->leftJoin('company','deposit.company_id','=','company.company_id')
        ->firstOrNew(['depo_id'=>$did]);

      $cid=null;
      if(isset($request->cid)){
        $cid=$request->cid;
        $did=0;

        $cust = \App\company::select()
        ->where('company_id',$cid)
        ->first();

        $depo->nickname = $cust->nickname;
        $depo->company_id = $cid;
      }
      if(isset($request->did)){
        $cid=$depo->company_id;
        $did=$request->did;
      }



      //-----------------------------------------
      //  工事の総受領額を求めるSQL（サブクエリ）を生成
      // SELECT *,(select sum(apply_price) from `deposit_disp` as d2 where d2.clmdetail_id=d1.clmdetail_id) as amount  FROM `deposit_disp` as d1 WHERE 1
      $subSql = \App\depositdisp::select('apply_price')
          //->sum()
          ->whereRaw('cont_id = ');
      ///----------------------------------------
      // 登録された分配を取り出す
      $disps = \App\depositdisp::select()
          ->join('claimdetail','deposit_disp.clmdetail_id','claimdetail.clmdetail_id')
          ->join('claims','claimdetail.claim_id','claims.claim_id')
          ->join('users','deposit_disp.user_id','users.id')
          ->whereRaw('deposit_disp.depo_id='.$did)
          ->get('deposit_disp.price as disped_price');

      ///----------------------------------------
      //　未登録の可能性がある請求を取り出す
      //    ※未登録＝指定取引先の入金履歴にない請求
      $query = \App\claimdetail::select()
          ->join('claims','claimdetail.claim_id','claims.claim_id')
          ->where('price','>','pay_price')
          ->where('company_id',$depo->company_id);

      $sql = $query->getQuery();
      $claimrows = $query->get('claims.price as claim_total_price');

      $request->session()->put('depositdetaile_org_data',$depo);

      return view('pages.depositdetail',['did'=>$depo->depo_id, 'dep'=>$depo,'disps'=>$disps,'claimrows'=>$claimrows,'sql'=>$sql]);
    }

    public function depositdetailSave(Request $request){
      $depo = $request->session()->get('depositdetaile_org_data');

      return DB::transaction(function () use ($request,$depo) {
        //------------------------------------------------------
        // 入金テーブル(deposit)を更新
        $depo->price = (int)($request->price."0000");
        $depo->depo_date = strtotime($request->depo_date);
        $depo->save();

        //------------------------------------------------------
        // 入金分配テーブル(deposit_disp)を更新
        foreach($request->claims as $claim) {
          $recCount = \App\depositdisp::where('claim_id',$claim['claim_id'])
            ->where('depo_id',$depo->depo_id)
            ->update([
              'apply_price' => (int)($claim['price']."0000")
            ]);

          if($recCount == 0){
            \App\depositdisp::create([
              'depo_id'=>$depo->depo_id,
              'claim_id'=>$claim['claim_id'],
              'apply_price'=> (int)($claim['price']."0000"),
              'user_id'=>\Auth::user()->id
            ]);
          }

          \App\claims::where('claim_id',$claim['claim_id'])
            ->update([
              'pay_date'=>DB::raw('NOW()'),
              'pay_price'=>DB::raw('(select sum(price) from deposit_disp where claim_id='.$claim['claim_id'].')')
            ]);
        }

        return '{status:"OK"}';
      });
    }

    public function ballancesheet(Request $request){
      return view('pages.ballancesheet',[]);
    }
    /*
    ->select('users.id', 'users.name', 'roles.name AS role')
                ->joinSub($roles, 'roles', function ($join) {
                    $join->on('users.role', '=', 'roles.id');
                })->get();
    */

    //======================================================
    //  発注処理
    //======================================================
    public function orderlist(Request $request){
      $orders = \App\orders::select(
          'orders.order_id',
          'orders.order_title',
          'orders.order_date',
          'orders.order_price',
          'orders.recept_date',
          'con1.name as cont_name',
          'recepter.name as recepter_user_name',
          'order_users.name as order_user_name'
        )
        ->leftJoin('contructs as con1','orders.cont_id','con1.cont_id' )
        ->leftJoin('users as recepter','orders.recepted_user_id','recepter.id' )
        ->leftJoin('users as order_users','orders.order_user_id','order_users.id' )
        ->get();

      return view('pages.orderlist',['orders'=>$orders]);
    }

    public function orderdetail(Request $request){
      if(isset($request->cid)){
        $order = \App\orders::select('orders.*',
              'con1.name as cont_name',
              'recepter.name as recept_user_name',
              'order_users.name as order_user_name'
              )
          ->leftJoin('contructs as con1','orders.cont_id','con1.cont_id' )
          ->leftJoin('users as recepter','orders.order_user_id','recepter.id' )
          ->leftJoin('users as order_users','orders.order_user_id','order_users.id' )
          ->where('orders.order_id',$request->cid)
          ->first();

        $details = \App\orderdetail::select()
          ->where('order_id',$request->cid)
          ->get();

        $claims = \App\orderclaims::select(
          [
          'orderclaims.*',
          'payments.payment_id',
          'payments.pay_dispose_date',
          'payments.pay_confirm_date',
          'payments.payed_date',
          'payments.pay_method',
          'payments.pay_dispose_uid',
          'payments.pay_dispose_uname'
        ]

          )
          ->leftJoin('payments','orderclaims.orderclaim_id','payments.orderclaim_id')
          ->where('orderclaims.order_id',$request->cid)
          ->get();

        return view('pages.orderdetail',['order'=>$order,'details'=>$details,'claims'=>$claims]);
      }
      return view('/home');
    }


    //======================================================
    //  日報入力
    //======================================================
    public function diary(Request $request){
      $supplier = \App\company::select()
        ->where('is_subcon',1)
        ->get();
      $units = \App\units::select(
          ['unit_id','unit_title','unittypes.unittype_title'])
          ->join('unittypes','units.unit_type','unittypes.unittype_id')
          ->orderBy('unittypes.unittype_id')
          ->get();
      $consts = \App\construct::select(['const_id','constructs.cont_id','const_type_name','const_name','contructs.name as cont_name'])
          ->join('contructs','constructs.cont_id','contructs.cont_id')
          ->whereNull('date_end')
          ->get();
      $companies = \App\company::select()
          ->where('is_subcon',"1")
          ->orderBy('nickname')
          ->get();

      return view('pages.diary',['supplier'=>$supplier,'units'=>$units,'consts'=>$consts,'companies'=>$companies ]);
    }

    //======================================================
    //  日報データ更新
    //======================================================
    public function diaryPost(Request $request){
    $list=[];
    $data = $request->data;

    //return var_dump($data);

    return DB::transaction(function () use ($request,$data,$list) {
      $listSupplier = [];
      $listDaily = [];
      $listItem = [];
      $listPerson = [];
      foreach ($data as $item) {
        $rowid = $item['rowid'];
        $supplier_id = DBInt($item['supplier_id']);
        $addCompItem = false;
        // 発注先が新規登録の場合は、発注先を登録し、発行されたIDで更新する
        if( is_null($supplier_id ) || $supplier_id==0 ){
            $supplier = \App\company::create([
              'nickname'=>unescape ($item['supplier']),
              'fullname'=>unescape ($item['supplier']),
              'is_customer'=>0,
              'is_subcon'=>1,
              'user_id'=>Auth::user()->id
            ]);
            $supplier_id  = $supplier->company_id;
            $listSupplier[$rowid]=['supplier_id'=>$supplier_id];
            $addCompItem = true;
        };
        // 商品が未登録の場合は登録し、発行されたＩＤで更新する
        $subjectid = DBInt($item['subject_id']);
        $itemid = DBInt($item['item_id']);
        $personid = DBInt($item['person_id']);
        if( $itemid==0 && $personid==0){  // 両ＩＤとも０＝未登録
          //科目が労務費の場合は社員マスターに登録（社員マスターは自社だけじゃないよ）
          if($subjectid == 200){
            $q = \App\person::create([
              'pname'=>unescape($item['item_name']),
              'full_pname'=>unescape($item['item_name']),
              'company_id'=>$supplier_id,
              'user_id'=>Auth::user()->id
            ]);
            $personid = $q->person_id;
            $listPerson[$rowid]=['person_id'=>$personid];
          }else{
            // アイテムを登録
            $q = \App\items::create([
              'item_name'=>unescape($item['item_name']),
              'def_price'=>DBInt($item['unit_price']),
              'item_type'=>$subjectid,
              'user_id'=>Auth::user()->id
            ]);
            $itemid = $q->item_id;
            //　取引先の取り扱い品目として登録
            $q = \App\companyitems::create([
              'company_id'=>$supplier_id,
              'item_id'=>$itemid,
              'person_id'=>0,
              'user_id'=>Auth::user()->id
            ]);
            $listItem[$rowid]=['item_id'=>$itemid];
          }
        }

        $rec = \App\dailydetail::updateOrCreate(
          ['daily_id'=>$item['daily_id']],
          [
            'const_id'=>DBInt($item['const_id']),
            'disp_order'=>DBInt($item['disp_order']),
            'daily_date'=>DBDate($item['daily_date']),
            'subject_id'=>$subjectid,
            'subject'=>unescape($item['subject']),
            'item_name'=>unescape ($item['item_name']),
            'paymethod_id'=>DBInt($item['paymethod_id']),
            'paymethod_text'=>unescape ($item['paymethod']),
            'item_id'=>$itemid,
            'person_id'=>$personid,
            'qty'=>DBInt($item['qty'])*10000,
            'unit_id'=>DBInt($item['unit_id']),
            'unit_text'=>unescape ($item['unit']),
            'supplier_id'=>$supplier_id,
            'supplier_text'=>unescape ($item['supplier']),
            'unit_price'=>DBInt($item['unit_price'])*10000,
            'sub_total'=>DBInt($item['sub_total'])*10000,
            'tax'=>DBInt($item['tax'])*10000,
            'total_price'=>DBInt($item['total_price'])*10000,
            'user_id'=>Auth::user()->id
          ]
        );

        $listDaily[$item['rowid']]=["daily_id"=>$rec->daily_id];
      }

      //=================================
      //    現場情報のコストを更新

      $ret = \App\construct::where('const_id', $request->const_id)
                ->update(
                    [
                      'resource_cost'=>DB::raw('(select sum(total_price) from dailydetail where item_id>0 AND const_id='.$request->const_id.")"),
                      'person_cost'=>DB::raw('(select sum(total_price) from dailydetail where person_id>0 AND const_id='.$request->const_id.")")
                   ]
                 );
      return response()->json(["status"=>"OK","daily"=>$listDaily,"supplier"=>$listSupplier,"item"=>$listItem,"person"=>$listPerson]);
    });
  }


    //=============================================================
    //
    //  発注処理POST
    //
    //=============================================================
    public function orderdetailPost(Request $request){
      if($request->cid == 'complist'){
          $data = \App\company::select(['company_id','nickname'])
            ->get();

          $res = [];
          foreach ($data as $item) {
            $res[] = ["id"=>$item->company_id,"text"=>$item->nickname];
          };

          return '{"status":"OK","data":'.json_encode($res)."}" ;
      }
      if($request->cid == 'contlist'){
          $data = \App\contruct::select(['cont_id','name'])
            ->get();

          $res = [];
          foreach ($data as $item) {
            $res[] = ["id"=>$item->cont_id,"text"=>$item->name];
          };

          return '{"status":"OK","data":'.json_encode($res)."}" ;
      }

      if($request->cid!='datasave'){
        return '{"status":"SOBY","data":'.$request->data."}" ;
      }


      return  DB::transaction(function () use ($request) {

        $postdata = json_decode($request->data);
        $update = [
            'order_id'=>intval($postdata->order_id),
            'order_title'=>$postdata->order_title,
            'order_date'=>strtotime("20".preg_replace("/[^\d]/",'',$postdata->order_date)),

            'order_to_id'=>$postdata->order_to_id,
            'order_to_name'=>$postdata->order_to_name,
            'total_price'=>intval(str_replace(',','',$postdata->total_price))*10000,
            'tax'=>intval(str_replace(',','',$postdata->tax))*10000,
            'tax_rate'=>10*10000,
            'order_price'=>intval(str_replace(',','',$postdata->order_price))*10000,

            'cont_id'=>intval($postdata->cont_id),
            'order_user_id'=>intval($postdata->order_user_id),
            'order_user_name'=>$postdata->order_user_name,
            'term'=>["title"=>$postdata->term],
            'recept_date'=>strtotime(  "20".preg_replace('/[^\d]/','', $postdata->recept_date)),
            'payment_due_date'=>strtotime(  "20".preg_replace('/[^\d]/','', $postdata->payment_due_date)),

            'recept_due_date'=>strtotime(  "20".preg_replace('/[^\d]/','', $postdata->recept_due_date)),
            'recept_place'=>$postdata->recept_place,
            'recepted_date'=>strtotime(  "20".preg_replace('/[^\d]/','', $postdata->recepted_date)),
            'recepted_user_id'=>intval($postdata->recepted_user_id),
            'recepted_user_name'=>$postdata->recepted_user_name,

            'user_id'=>Auth::user()->id
        ];

        $order_result = \App\orders::updateOrCreate(
          ['order_id'=>$postdata->order_id],
          $update
        );


        $rows = $postdata->rowdata;

        $orderdetail_result = [];
        foreach($rows as $itm){
          $ret =\App\orderdetail::updateOrCreate(
            ['odrdetail_id'=>$itm->id],
            [
              'item_name'=>$itm->item_name,
              'unit_price'=>DBInt($itm->unit_price)*10000,
              'qty'=>DBInt($itm->qty)*10000,
              'unit_id'=>intval($itm->unit_id),
              'total_price'=>DBInt($itm->total_price)*10000,
              'tax'=>DBInt($itm->tax)*10000,
              'taxed_price'=>DBInt($itm->taxed_price)*10000
            ]
          );
          $orderdetail_result[] = ["idx"=>$itm->idx, "result"=>$ret];
        };

        $claims = $postdata->claims;
        $claims_result = [];
        $payments_result = [];

        foreach($claims as $itm){
          $ret = \App\orderclaims::updateOrCreate(
            ['orderclaim_id'=>$itm->orderclaim_id],
            [
              'order_id'=>intval($postdata->order_id),
              'orderclaim_recept_date'=>$itm->orderclaim_recept_date==""  ? null : strtotime(  "20".preg_replace('/[^\d]/','', $itm->orderclaim_recept_date)),
              'orderclaim_recept_user_id'=>intval($itm->orderclaim_recept_user_id),
              'orderclaim_recept_user_name'=>$itm->orderclaim_recept_user_name,
              'oderclaim_discount_price'=>(isset($itm->oderclaim_discount_price)  ?  DBInt($itm->oderclaim_discount_price)*10000 : null),
              'orderclaim_offset_price'=>(isset($itm->orderclaim_offset_price)  ?  DBInt($itm->orderclaim_offset_price)*10000 : null),
              'orderclaim_claim_price'=>(isset($itm->orderclaim_claim_price)  ?  DBInt($itm->orderclaim_claim_price)*10000 : null),
            ]
          );
          $claims_result[]= ["idx"=>$itm->idx, "result"=>$ret];

          $ret = \App\payments::updateOrCreate(
            ['payment_id'=>$itm->payment_id],
            [
              'orderclaim_id'=>$itm->orderclaim_id,
              'pay_dispose_date'=>DBDate($itm->pay_dispose_date),
              'pay_confirm_date'=>$itm->pay_confirm_date == "" ? null : $itm->pay_confirm_date,
              'payed_date'=>$itm->payed_date == "" ? null : $itm->payed_date,
              'pay_method'=>$itm->pay_method,
              'pay_dispose_uid'=>$itm->pay_dispose_uid,
              'pay_dispose_uname'=>$itm->pay_dispose_uname,

              'user_id'=>Auth::user()->id

            ]
          );
          $payments_result[]= ["idx"=>$itm->idx, "result"=>$ret];


        };

        return response()->json([
              "status"=>"OK",
              "order"=>$order_result,
              "detail"=>$orderdetail_result,
              "claim"=>$claims_result,
              "payment"=>$payments_result ]);
      });
  }
}
