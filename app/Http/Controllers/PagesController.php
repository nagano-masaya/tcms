<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PagesController extends Controller
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

      return view('pages.contdetaile',['con' => $con]);
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

        $con->name = $request->name;
        $con->date_from = $request->date_from;
        $con->date_to = $request->date_to;
        $con->customer = $request->customer;
        $con->cust_company = $request->cust_company;
        $con->cust_person = $request->cust_person;
        $con->price = intval(str_replace(',','',$request->price))*10000;
        $con->budget_remain = intval(str_replace(',','',$request->budget_remain))*10000;
        $con->state = $request->state;
        $con->exec_budget =intval(str_replace(',','',$request->exec_budget))*10000;
        $con->price_taxed = intval(str_replace(',','',$request->price_taxed))*10000;
        $con->claim_remain = intval(str_replace(',','',$request->claim_remain))*10000;
        $con->deposit_remain = intval(str_replace(',','',$request->deposit_remain))*10000;
        $con->sales_person = $request->sales_person;
        $con->const_admin = $request->const_admin;
        $con->update_by = 0;

        $con->save();
        return "OK";

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

/*
      if(isset($request->cont)){
        \App\contruct::where('cont_id',intval($request->cont))
                  ->delete();
      }
*/


      $cons = \App\claims::select()
          ->join('company','claims.company_id','company.company_id')
          ->whereNull('claims.deleted_at')
          ->get();

      return view('Pages.claimlist',['cons' => $cons]);
    }

    public function claimdetail(Request $request){

      $cid="0";
      if(isset($request->cid)){
        $cid=$request->cid;
      }
      $con = \App\claims::select()
        ->leftJoin('company','claims.company_id','company.company_id')
        ->firstOrNew(['claim_id' => $request->cid]);
      // オリジナルデータとしてセッションに保持させる
      $request->session()->put('claimdetaile_org_data',$con);

      $details = \App\claimdetail::select()
        ->where('claim_id',$request->cid)
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
      return DB::transaction(function () use ($request,$con) {
        //$con->claim_id = $request->claim_id;
        $con->company_id = $request->company_id;
        $con->user_id = $request->user_id;
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
        $con->details = $request->details;
        $con->history = $request->history;
        $con->save();

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

      //　入金情報を取得

      // 登録された分配を取り出す
      $disps = null;
      $did=isset($request->did) ? $request->did : 0;

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




      $disps = \App\depositdisp::select()
          ->join('claimdetail','deposit_disp.clmdetail_id','claimdetail.clmdetail_id')
          ->join('users','deposit_disp.user_id','users.id')
          ->whereRaw('deposit_disp.depo_id='.$did)
          ->get('deposit_disp.price as disped_price');

      //　未登録の可能性がある請求を取り出す
      $claims = \App\claims::select()
          ->where('price','>','pay_price')
          ->where('company_id',$depo->company_id)
          ->get();

      $request->session()->put('depositdetaile_org_data',$depo);

      return view('pages.depositdetail',['did'=>$depo->depo_id, 'dep'=>$depo,'disps'=>$disps,'claims'=>$claims]);
    }

/*
postdata = {
 _token: CSRF_TOKEN,
 depo_id:parseInt($("input[name='depo_id']").val()),
 company_id:parseInt($("input[name='company_id']").val()),
 user_id:{{Auth::user()->id}},
 price:parseInt($("input[name='price']").val()),
 depo_date:$("input[name='depo_date']").val(),
 history:"{{$dep->history}}"
};
*/
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

}
