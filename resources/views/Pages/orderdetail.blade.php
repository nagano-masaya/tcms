@extends('layouts.app')

@push('styles')
<link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/jquery-ui.structure.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/jquery-ui.themes.min.css') }}" rel="stylesheet">
@endpush

{{--
@push('scripts')
<script type="application/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('js/jquery.fileupload.js') }}"></script>
@endpush
--}}

@section('content')

{{--

<div class="container">
  <div class="row card-header text-center table-bordered">
    <div class="input-group col-1 table-info">1
    </div>
    <div class="input-group col-1">2
    </div>
    <div class="input-group col-1 table-info">3
    </div>
    <div class="input-group col-1">4
    </div>
    <div class="input-group col-1 table-info">5
    </div>
    <div class="input-group col-1">6
    </div>
    <div class="input-group col-1 table-info">7
    </div>
    <div class="input-group col-1">8
    </div>
    <div class="input-group col-1 table-info">9
    </div>
    <div class="input-group col-1">10
    </div>
    <div class="input-group col-1 table-info">11
    </div>
    <div class="input-group col-1">12
    </div>
  </div>
</div>
--}}
<div class="container" id="mainform">
  <div class="row">
    <div class="col-6 text-left align-text-bottom pb-0 pl-0">
      <h4  class="mb-0 align-text-bottom"><span class="iconify mb-1" data-width="18" data-icon="emojione-v1:ballot-box-bold-check" data-inline="false"></span>発注</h4>
    </div>
    <div class="col-6 text-right small p-0">
      最終更新:<span id="last_update">{{$order->updated_at->format('y\'m/d h:i')}}:長野</span>
    </div>

  </div>
  <div class="row">
    <div class="input-group col-md-1 small">
      <div class="small input-group-prepend input-group-text input-group-sm">
        発注日
      </div>
      <input type="button" class="form-control text-center p-1" data-uk-datepicker="{format:'YY\'MM/DD'}" name="order_date" value="{{$order->order_date->format('y\'m/d')}}">
    </div>
    <div class="input-group col-md-5 small">
      <div class="small input-group-prepend input-group-text input-group-sm clickable">
        発注先
        <span class="iconify" data-icon="bx:bx-add-to-queue" data-inline="false" onclick="selectCompany()"></span>
      </div>
        <input type="hidden" name="order_to_id" value="{{$order->company_id}}">
        <input type="text" class="form-control text-left small" name="order_to_name" value="{{$order->nickname}}" maxlength="128">
    </div>
    <div class="input-group col-2 small">
      <div class="small input-group-prepend input-group-text input-group-sm">
        小計
      </div>
        <input type="input" class="form-control text-left jpcurrency px-1" name="total_price"  value="{{number_format($order->order_price)}}" data-org="{{number_format($order->order_price)}}" maxlength="15">
    </div>
    <div class="input-group col-2 small">
      <div class="small input-group-prepend input-group-text input-group-sm">
        消費税
      </div>
        <input type="input" class="form-control text-left jpcurrency px-1" name="tax"  value="{{number_format($order->order_price)}}" data-org="{{number_format($order->order_price)}}" maxlength="15">
    </div>
    <div class="input-group col-2 small">
      <div class="small input-group-prepend input-group-text input-group-sm">
        発注金額
      </div>
        <input type="text" class="form-control text-left jpcurrency px-1" name="order_price"  value="{{number_format($order->order_price)}}" data-org="{{number_format($order->order_price)}}" maxlength="15">
    </div>
  </div>
  <div class="row">
    <div class="input-group col-md-3 small">
      <div class="small input-group-prepend input-group-text input-group-sm">
        発注元
      </div>
        <input type="button" class="form-control text-left" name="cont_name" value="{{$order->cont_name}}" data-id="{{$order->cont_id}}" data-org-id="{{$order->cont_id}}" data-org="{{$order->cont_name}}" maxlength="64">
    </div>
    <div class="input-group col-md-2 small">
      <div class="small input-group-prepend input-group-text input-group-sm">
        発注者
      </div>
        <input type="button" class="form-control text-left" name="order_user_name" value="{{$order->order_user_name}}" data-id="{{$order->order_by}}" data-org-id="{{$order->order_by}}" data-org="{{$order->order_user_name}}" maxlength="12">
    </div>
    <div class="input-group col-md-3 small">
      <div class="small input-group-prepend input-group-text input-group-sm">
        支払条件
      </div>
        <input type="text" class="form-control text-left" name="terms" value="掛け" maxlength="64">
    </div>
    <div class="input-group col-md-1 small">
      <div class="small input-group-prepend input-group-text input-group-sm">
          納期<span class="iconify clickable cleardate" data-icon="bx:bxs-eraser" data-inline="false" ></span>
      </div>
      <input type="button" class="form-control text-center small" data-uk-datepicker="{format:'YY\'MM/DD'}" name="recept_due_date" value="{{$order->recept_due_date==null? "":$order->recept_due_date->format('y\'m/d')}}">
    </div>
    <div class="input-group col-md-1 small">
      <div class="small input-group-prepend input-group-text input-group-sm px-1">
        支払予定日<span class="iconify clickable cleardate" data-icon="bx:bxs-eraser" data-inline="false" ></span>
      </div>
      <div class="input-group m-0 p-0 small">
        <input type="button" class="form-control text-center" data-uk-datepicker="{format:'YY\'MM/DD'}"  name="payment_due_date" value="{{$order->payment_due_date==null?"":$order->payment_due_date->format('y\'m/d')}}">
      </div>
    </div>
    <div class="input-group col-md-2 small p-1">
      <div class="row">
        <div class="col-12">
          <button type="button" class="col p-0 from-control btn btn-primary">注文書発行</button>
        </div>
      </div>
      <div class="row mt-1">
        <div class="col-12 small">
          <button type="button" class="col p-0 from-control btn btn-info " style="font-size:0.4rem">注文書表示・印刷<br>(最新:19'12/20)</button>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col">
      <div class="row">
        <span class="iconify" data-icon="ic:baseline-check-box-outline-blank" data-inline="false"></span>受領
      </div>
      <div class="row">
        <div class="input-group col-md-1 small">
          <div class="small input-group-prepend input-group-text input-group-sm px-1">
            納品予定日<span class="iconify cleardate" data-icon="bx:bxs-eraser" data-inline="false" ></span>
          </div>
          <div class="input-group m-0 p-0 flex">
              <input type="button" class="form-control text-center" data-uk-datepicker="{format:'YY\'MM/DD'}"  name="recept_due_date" value="{{ $order->recept_due_date==null? "":$order->recept_due_date->format('y\'m/d')}}">
          </div>
        </div>
        <div class="input-group col-md-4 small">
          <div class="small input-group-prepend input-group-text input-group-sm">
            受領場所
          </div>
          <div class="input-group m-0 p-0 flex">
            <input type="text" class="form-control text-left" name="recept_user_name" value="{{$order->recepted_user_name}}" data-id="{{$order->recepted_user_id}}" maxlength="64">
          </div>
        </div>
        <div class="input-group col-md-1 small">
          <div class="small input-group-prepend input-group-text input-group-sm">
            受領日<span class="iconify cleardate" data-icon="bx:bxs-eraser" data-inline="false" ></span>
          </div>
          <div class="input-group m-0 p-0 flex">
            <input type="button" class="form-control text-center" data-uk-datepicker="{format:'YY\'MM/DD'}"  name="recepted_date" value="{{$order->recepted_date==null? "": $roder->recepted_date->format('y\'m/d')}}">
          </div>
        </div>
        <div class="input-group col-md-1 small">
          <div class="small input-group-prepend input-group-text input-group-sm">
            受領者
          </div>
          <div class="input-group m-0 p-0 flex">
            <input type="text" class="form-control text-left" name="recept_user_name" value="{{$order->recepted_user_name}}" data-id="{{$order->recepted_user_id}}" maxlength="12">
          </div>
        </div>
        <div class="input-group col-md-1 small p-1">
          <div class="row">
            <div class="col-12">
              <button type="button" class="col p-0 from-control btn btn-primary">納品書登録</button>
            </div>
          </div>
          <div class="row mt-1">
            <div class="col-12 small">
              <button type="button" class="col p-0 from-control btn btn-info " style="font-size:0.4rem">納品書表示・印刷<br>(最新:19'12/20)</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col px-0">
      <table class="table table-responsive table-bordered table-striped" id="claimlist" style="width:64rem;">
        <thead class="thead-light small">
          <tr>
            <th colspan="6">
              <div class="row">
                <div class="col-2">
                  請求
                </div>
                <div class="col-6 clickable" onclick="newclaim()">
                  <span class="iconify" data-icon="bx:bx-add-to-queue" data-inline="false"></span>
                  <span>追加</span>
                </div>

                <script type="application/javascript">
                function newclaim(){
                  var row = $('#claimlist tbody').append(
                    ('<tr data-claimid="0">'
                    +'<td class="p-1">'
                    +'<button type="button" class="from-control btn btn-primary p-1" style="font-size:0.4rem;" name="button" data-files="[]">請求書登録</button>'
                    +'<button type="button" class="from-control btn btn-info p-1 pr-0" style="font-size:0.4rem;" name="button" data-files="[]">表示</button>'
                    +'</td>'
                    +'<td class="p-0"><input type="button" class="form-control p-0 small" name="orderclaim_recept_date" value="#claimdate#" data-uk-datepicker></td>'
                    +'<td class="p-0" data-orderclaim_recept_user_id="#uid#"><input type="button" class="form-control p-0 small" name="orderclaim_recept_user_name" value="#uname#"></td>'
                    +'<td class="p-0"><input type="text" class="form-control p-0 small jpcurrency" name="oderclaim_discount_price" value="" ></td>'
                    +'<td class="p-0"><input type="text" class="form-control p-0 small jpcurrency" name="orderclaim_offset_price" value="" ></td>'
                    +'<td class="p-0"><input type="text" class="form-control p-0 small jpcurrency" name="orderclaim_claim_price" value="" ></td>'
                    +'<td class="p-0"><input type="button" class="form-control p-0 small" name="pay_disposal_date" value="" data-uk-datepicker></td>'
                    +'<td class="p-0"><input type="button" class="form-control p-0 small" name="pay_confirm_date" value="" data-uk-datepicker></td>'
                    +'<td class="p-0"><input type="text" class="form-control p-0 small" name="pay_method" value="" ></td>'
                    +'<td class="p-0"><input type="button" class="form-control p-0 small" name="payed_date" value="" data-uk-datepicker></td>'
                    +'<td data-pay-dispose-uid="0" class="p-0"><input type="button" class="form-control p-0 small" name="pay_dispose_uname" value="" ></td>'
                    +'</tr>')
                    .replace('#claimdate#',moment().format('YY\'MM/DD') )
                    .replace('#uid#',"{{Auth::user()->id}}")
                    .replace('#uname#',"{{Auth::user()->name}}")
                  );
                  $(row).find('[data-uk-datepicker]')
                    .attr('data-uk-datepicker',"{format:'YY\'MM/DD'}");

                  $(row).find('input').addClass('border-0')
                    .attachNum3();

                  UIkit.datepicker($(row).find('[name="orderclaim_recept_date"]') );
                  UIkit.datepicker($(row).find('[name="pay_disposal_date"]') );
                  UIkit.datepicker($(row).find('[name="pay_confirm_date"]') );
                  UIkit.datepicker($(row).find('[name="payed_date"]'));
                  return $(row);
                }

                </script>
              </div>
            </th>
            <th colspan="5" class="paymenttitle">支払</th>
          </tr>
          <tr>
            <th><button type="button" class="col p-0 from-control btn btn-info " style="font-size:0.4rem">納品書表示・印刷<br>(最新:19'12/20)</button></th>
            <th class="col_date">受領日</th>
            <th class="col_date">受領者</th>
            <th class="col_price">値引き額</th>
            <th class="col_price">相殺額</th>
            <th class="col_price">請求額</th>
            <th class="col_date paymenttitle">処理日</th>
            <th class="col_date paymenttitle">承認日</th>
            <th class="col_date paymenttitle">支払方法</th>
            <th class="col_date paymenttitle">支払日</th>
            <th class="col_date paymenttitle">担当</th>
          </tr>
        </thead>
        <tbody class="small">
@foreach($claims as $item)
          <tr data-claimid="{{$item->orderclaim_id}}">
            <td>
              <button type="button" class="from-control btn btn-primary p-1" style="font-size:0.4rem;" name="button" data-files="[]">請求書登録</button>
              <button type="button" class="from-control btn btn-info p-1 pr-0" style="font-size:0.4rem;" name="button" data-files="[]">表示</button>
            </td>
            <td>{{$item->orderclaim_recept_date==null?"":$item->orderclaim_recept_date->format('y\'m/d')}}</td>
            <td data-uid="{{$item->orderclaim_recept_user_id}}">{{$item_orderclaim_user_name}}</td>
            <td class="jpcurrency">{{number_format($item->orderclaim_discount_price)}}</td>
            <td class="jpcurrency">{{number_format($item->orderclaim_offset_price)}}</td>
            <td class="jpcurrency">{{number_format($item->orderclaim_claim_price)}}</td>
            <td class="">{{$item->pay_disposal_date==null?"":$item->pay_disposal_date->format('y\'m/d')}}</td>
            <td class="">{{$item->pay_confirm_date==null?"":$item->pay_confirm_date->format('y\'m/d')}}</td>
            <td class="">{{$item->payed_date==null?"":$item->payed_date->format('y\'m/d')}}</td>
            <td data-dispose-uid=>{{$item->pay_dispose_uname}}</td>
            <td></td>
          </tr>
  @endforeach
        </tbody>
      </table>
    </div>

  </div>

  <div class="row mt-3">
    <div class="col">
      <div class="row">
        <span class="iconify" data-icon="ic:baseline-check-box-outline-blank" data-inline="false"></span>請求
      </div>
      <div class="row">
        <div class="input-group col-md-1 col-1 small">
          <div class="small input-group-prepend input-group-text input-group-sm">
            受領日<span class="iconify cleardate" data-icon="bx:bxs-eraser" data-inline="false" ></span>
          </div>
          <div class="input-group m-0 p-0 flex">
            <input type="button" class="form-control text-center" data-uk-datepicker="{format:'YY\'MM/DD'}"  name="claim_recepted_date" value="{{$order->claim_recepted_date==null?"":$order->claim_recepted_date->format('y\'m/d')}}">
          </div>
        </div>
        <div class="input-group col-md-1 small">
          <div class="small input-group-prepend input-group-text input-group-sm">
            受領者
          </div>
          <div class="input-group m-0 p-0 flex">
            <input type="text" class="form-control text-left p-1" name="payment_date" value="" maxlength="12">
          </div>
        </div>
        <div class="col-5">
            <div class="row">
              <div class="input-group col-4 small">
                <div class="small input-group-prepend input-group-text input-group-sm">
                  値引額
                </div>
                  <input type="text" class="form-control text-left jpcurrency px-1" name="order_price"  value="{{number_format($order->order_price)}}" data-org="{{number_format($order->order_price)}}" maxlength="15">
              </div>
              <div class="input-group col-4 small">
                <div class="small input-group-prepend input-group-text input-group-sm">
                  相殺額
                </div>
                  <input type="text" class="form-control text-left jpcurrency px-1" name="order_price"  value="{{number_format($order->order_price)}}" data-org="{{number_format($order->order_price)}}" maxlength="15">
              </div>
              <div class="input-group col-4 small">
                <div class="small input-group-prepend input-group-text input-group-sm">
                  請求額
                </div>
                <input type="text" class="form-control text-left jpcurrency px-1" name="order_price"  value="{{number_format($order->order_price)}}" data-org="{{number_format($order->order_price)}}" maxlength="15">
              </div>
            </div>
        </div>
        <div class="input-group col-md-1 small p-1">
          <div class="row">
            <div class="col-12">
              <button type="button" class="col p-0 from-control btn btn-primary" id="uploadclaim" onclick="$('#fileselector').click()">請求書登録</button>
            </div>
          </div>
          <div class="row mt-1">
            <div class="col-12 small">
              <button type="button" class="col p-0 from-control btn btn-info " style="font-size:0.4rem">請求書表示・印刷<br>(最新:19'12/20)</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col">
      <div class="row">
        <span class="iconify" data-icon="ic:baseline-check-box-outline-blank" data-inline="false"></span>支払
      </div>
      <div class="row mt-0">
        <div class="input-group col-md-1 small">
          <div class="small input-group-prepend input-group-text input-group-sm">
            処理日<span class="iconify cleardate" data-icon="bx:bxs-eraser" data-inline="false" ></span>
          </div>
          <div class="input-group m-0 p-0 flex">
            <input type="button" class="form-control text-center" data-uk-datepicker="{format:'YY\'MM/DD'}" name="payed_date" value="{{$order->payed_date==null? "":$order->payed_date->format('y\'m/d')}}" maxlength="8">
          </div>
        </div>
        <div class="input-group col-md-1 small">
          <div class="small input-group-prepend input-group-text input-group-sm">
            承認日<span class="iconify cleardate" data-icon="bx:bxs-eraser" data-inline="false" ></span>
          </div>
          <div class="input-group m-0 p-0 flex">
            <input type="button" class="form-control text-center" data-uk-datepicker="{format:'YY\'MM/DD'}" name="payed_date" value="{{$order->payed_date==null? "":$order->payed_date->format('y\'m/d')}}" maxlength="8">
          </div>
        </div>
        <div class="input-group col-md-3 small">
          <div class="small input-group-prepend input-group-text input-group-sm">
            支払方法
          </div>
          <div class="input-group m-0 p-0 flex">
            <input type="text" class="form-control text-left" name="payment_date" value="" maxlength="12">
          </div>
        </div>

        <div class="input-group col-md-1 small">
          <div class="small input-group-prepend input-group-text input-group-sm">
            支払日<span class="iconify cleardate" data-icon="bx:bxs-eraser" data-inline="false" ></span>
          </div>
          <div class="input-group m-0 p-0 flex">
            <input type="button" class="form-control text-center" data-uk-datepicker="{format:'YY\'MM/DD'}" name="payed_date" value="{{$order->payed_date==null? "":$order->payed_date->format('y\'m/d')}}" maxlength="8">
          </div>
        </div>
        <div class="input-group col-md-1 small">
          <div class="small input-group-prepend input-group-text input-group-sm">
            担当
          </div>
          <div class="input-group m-0 p-0 flex">
            <input type="text" class="form-control text-left" name="payment_date" value="" maxlength="4">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mb-0 mt-3">
    <div class="col-10 font-weight-bolder">
      品目一覧
    </div>
    <div class="col-2 clickable" onclick="newrow()">
      <span class="iconify" data-icon="bx:bx-add-to-queue" data-inline="false"></span>
      <span>新規</span>
    </div>
  </div>

  <form class="" action="#" method="post">
    <input type="file" name="" value="" style="display:none"/ id="fileselector">
  </form>

  <div class="row">
    <div class="">
      <table class="table table-bordered mb-0">
        <thead class="thead-light">
          <tr>
            <th class="dcol-1" >品名</th>
            <th class="dcol-2">単価</th>
            <th class="dcol-3" colspan="2">数量</th>
            <th class="dcol-4" >金額</th>
            <th class="dcol-5" >消費税</th>
            <th class="dcol-6" >税込金額</th>
            <th class="dcol-7" ></th>
          </tr>
        </thead>
      </table>

      <table class="table-bordered mt-0 border-top-0 px-1" id="detaillist">
        <thead class="border-top-0">
          <tr>
            <th class="p-0 dcol-1"></th>
            <th class="p-0 dcol-2"></th>
            <th class="p-0 dcol-3" colspan="2"></th>
            <th class="p-0 dcol-4"></th>
            <th class="p-0 dcol-5"></th>
            <th class="p-0 dcol-6"></th>
            <th class="p-0 dcol-7"></th>
          </tr>
        </thead>
        <tbody class="p-0">
        </tbody>
      </table>
    </div>
  </div>
  <div class="row">
    <div class="col-9">
    </div>
    <div class="col-3">
      <div class="row table-primary p-2 mt-3">
        <input  type="button" class="btn btn-primary form-control col-6" name="regist" value="登録" onclick="save()"></input>
        <input type="button"  class="btn form-control col-6"name="button" value="キャンセル"></input>
      </div>
    </div>
  </div>
</div>

<script type="application/javascript">


var order_id={{$order->order_id}};


  $(document).ready(function(){

    $('.cleardate').addClass('clickable');
    $('.cleardate').click(function(){
      $(this).parent().parent().find('[data-uk-datepicker]').val("");
    });

   $('#detaillist input').addClass('border-0');
   var rows=[
     @foreach($details as $item)
     {
        odrdetail_id:{{$item->odrdetail_id}},
        item_name:"{{$item->item_name}}",
        unit_price:{{$item->unit_price/10000}},
        qty:{{$item->qty/10000}},
        unit_id:{{$item->unit_id}},
        unit_text:{{$item->unit_id}},
        total_price:{{$item->total_price/10000}},
        tax:{{$item->tax/10000}},
        taxed_price:{{$item->taxed_price/10000}}
      },
     @endforeach
   ];

   $('#detaillist tbody').children().remove();
   rows.forEach(function(itm){
     row = newrow();
     row.find('[data-id]').attr('data-id',itm.odrdetail_id);
     row.find('[name="item_name"]').val(itm.item_name);
     row.find('[name="unit_price"]').val(tcms_num3(itm.unit_price));
     row.find('[name="qty"]').val(tcms_num3(itm.qty));
     row.find('[name="unit"]').attr('data-unit-id',itm.unit_id);
     row.find('[name="total_price"]').val(tcms_num3(itm.total_price));
     row.find('[name="tax"]').val(tcms_num3(itm.tax));
     row.find('[name="taxed_price"]').val(tcms_num3(itm.taxed_price));
   });

   attachNum3($('#detaillist .jpcurrency'));




});




function newrow(){
  elm = $('#detaillist tbody').append(
         $('#rowtemplate tbody').html()
        )

  attachNum3(
    elm.find('input')
    .addClass('border-0 px-0')
    .find('.jpcurrency')
  );

  return elm;
}

function deleterow(elm){
  $(elm).parents('[data-id]').addClass("hidden");
}
{{--  --}}
var complist =[];


function selectCompany(){
  if(complist.length == 0){
    $.ajax({
        url: 'orderdetail',
        type: 'POST',
        data: {_token: CSRF_TOKEN,cid:'complist',param:""}
    }).always(function(rdata) {
        complist = [];
        data = JSON.parse(rdata);
        data.data.forEach(function(item){
          complist.push({id:item.id, title:item.text});
        });
        selectCompany(); //{{-- !!!recursive call!!! --}}
    });
  };

  $('#compselector').showSelector('取引先の選択',complist,function(id,text){
    $('[name="order_to_id"]').val(parseInt(id));
    $('[name="order_to_name"]').val(""+text);
  });
}


function ObjectException(Obj,message){
  this.object = obj;
  this.message = message;
}

function validate(){
  $('.bg-warning').removeClass('bg-warning');
  try{
    if($('[name="order_to_name"]').val().length<1 ){
      $('[name="order_to_name"]').addClass('bg-warning').focus();
      throw new Error('発注先を入力してください');
    }

    if($('[name="cont_name"]').val().length<1 ){
      $('[name="cont_name"]').addClass('bg-warning').focus();
      throw new Error('発注元をを入力してください');
    }

    if($('[name="order_user_name"]').val().length<1 ){
      $('[name="order_user_name"]').addClass('bg-warning').focus();
      throw new Error('発注者を入力してください');
    }

    if($('[name="terms"]').val().length<1 ){
      $('[name="terms"]').addClass('bg-warning').focus();
      throw new Error('支払条件を入力してください');
    }

    var val = $('[name="delivery_date"]').val();
    if( val.length<1 ){
      $('[name="delivery_date"]').addClass('bg-warning').focus();
      throw new Error('納期を入力してください');
    }
    if( !moment(val, 'YYYY MM/DD').isValid() ){
      $('[name="delivery_date"]').addClass('bg-warning').focus();
      throw new Error('納期に日付を入力してください（'+val+'）');
    }

    var val = $('[name="payment_date"]').val();
    if( val.length<1 ){
      $('[name="payment_date"]').addClass('bg-warning').focus();
      throw new Error('支払予定日を入力してください');
    }
    if( !moment(val, 'YYYY MM/DD').isValid() ){
      $('[name="payment_date"]').addClass('bg-warning').focus();
      throw new Error('支払予定日に日付を入力してください');
    }

    $('#mainform .jpcurrency').each(function(){
      if( !$(this).val().match(/\b\d{1,3}(,\d{3})*\b/)){
        $(this).addClass('bg-warning').focus();
        throw new Error('数値を入力してください('+ $(this).val()+')');
      }
    });

    $('#mainform [name="item_name"]').each(function(){
      if( $(this).val().length<1 ){
        $(this).addClass('bg-warning').focus();
        throw new Error('品名を入力してください('+ $(this).val()+')');
      }
    });


  }catch(err){
    toastr.options = {
      "positionClass": "toast-top-left",
      "timeOut": "1500",
    };
    toastr.error(err.message);
    return false;
  }
  return true;
}

var postdata;

function save(){
  if(!validate()){
    return;
  }

  var details=[];
  $('#detaillist tbody tr').each(function(){
    details.push({
      item_name:$(this).find('[name="item_name"]').val(),
      unit_price:$(this).find('[name="unit_price"]').val(),
      qty:$(this).find('[name="qty"]').val(),
      unit_id:$(this).find('[name="unit"]').attr('data-unit-id'),
      total_price:$(this).find('[name="total_price"]').val(),
      tax:$(this).find('[name="tax"]').val(),
      taxed_price:$(this).find('[name="taxed_price"]').val()
    });
  });

  postdata = {
    order_id:order_id,
    cont_id:$('[name="cont_name"').attr('data-id'),
    cont_name:$('[name="cont_name"').val(),
    order_date:$('[name="order_date"').val(),
    order_to_id:$('[name="order_to_id"').val(),
    order_to_name:$('[name="order_to_name"').val(),
    total_price:$('#mainform [name="total_price"').val(),
    tax:$('#mainform [name="tax"').val(),
    order_price:$('#mainform [name="order_price"').val(),
    order_user_id:$('#mainform [name="order_user_name"').attr('data-id'),
    order_user_name:$('#mainform [name="order_user_name"').val(),
    recept_date:$('#mainform [name="recept_date"').val(),
    recepted_date:$('#mainform [name="recepted_date"').val(),
    recepted_user_id:$('#mainform [name="recepted_user_id"').val(),
    recepted_user_name:$('#mainform [name="recepted_user_name"').val(),
    rowdata:details
  }

}

  </script>

<table class="hidden" id="rowtemplate">
  <tr data-id="0">
    <td class="p-0">
        <input type="text" class="form-control px-1 border-0" name="item_name" value="">
    </td>
    <td class="p-0">
      <input type="text" class="form-control text-right p-1 border-0 jpcurrency" name="unit_price" value="0">
    </td>
    <td class="p-0">
      <input type="text" class="form-control text-right p-1 border-0 jpcurrency" name="qty" value="0">
    </td>
    <td class="p-0">
      <input type="text" class="form-control text-right p-1 border-0 readonly col_unit" name="unit" data-unit-id="1" value="日">
    </td>
    <td class="p-0">
      <input type="text" class="form-control text-right p-1 border-0 jpcurrency" name="total_price" value="0">
    </td>
    <td class="p-0">
      <input type="text" class="form-control text-right p-1 border-0 jpcurrency" name="tax" value="0">
    </td>
    <td class="p-0">
      <input type="text" class="form-control text-right p-1 border-0 jpcurrency" name="taxed_price" value="0">
    </td class="p-0">
    <td class="text-center">
      <span class="iconify clickable" data-icon="fa-solid:trash-alt" data-inline="false" data-toggle="modal" data-target="#confirmdel"></span>
    </td>
  </tr>
</table>

<div class="modal" id="confirmdel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content  bg-light">
      <div class="modal-header ">
        <h5 class="modal-title" id="exampleModalLabel">確認</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        削除します。よろしいですか？
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">はい</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
      </div>
    </div>
  </div>
</div>



@component('components.listSelector')
@slot('compo_id')
compselector
@endslot
@endcomponent


@endsection
