@extends('layouts.app')

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
<div class="container">
  <div class="row">
    <div class="input-group col-md-6 small">
      <div class="input-group-prepend input-group-text input-group-sm clickable">
        発注先
        <span class="iconify" data-icon="bx:bx-add-to-queue" data-inline="false" onclick="selectCompany()"></span>
      </div>
        <input type="hidden" name="order_to_id" value="{{$order->company_id}}" maxlength="4">
        <input type="text" class="form-control text-left small" name="order_to_name" value="{{$order->nickname}}" maxlength="4">
    </div>
    <div class="input-group col-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        発注額合計
      </div>
        <input type="input" class="form-control text-left jpcurrency px-1" name="total_price"  value="{{number_format($order->order_price)}}" data-org="{{number_format($order->order_price)}}" maxlength="4">
    </div>
    <div class="input-group col-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        消費税
      </div>
        <input type="input" class="form-control text-left jpcurrency px-1" name="tax"  value="{{number_format($order->order_price)}}" data-org="{{number_format($order->order_price)}}" maxlength="12">
    </div>
    <div class="input-group col-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        発注金額
      </div>
        <input type="text" class="form-control text-left jpcurrency px-1" name="taxed_price"  value="{{number_format($order->order_price)}}" data-org="{{number_format($order->order_price)}}" maxlength="12">
    </div>
  </div>
  <div class="row">
    <div class="input-group col-md-3">
      <div class="input-group-prepend input-group-text input-group-sm">
        発注元
      </div>
        <input type="button" class="form-control text-left" name="cont_name" value="{{$order->cont_name}}" data-id="{{$order->cont_id}}" data-org-id="{{$order->cont_id}}" data-org="{{$order->cont_name}}" maxlength="4">
    </div>
    <div class="input-group col-md-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        発注者
      </div>
        <input type="button" class="form-control text-left" name="order_user_name" value="{{$order->order_user_name}}" data-id="{{$order->order_by}}" data-org-id="{{$order->order_by}}" data-org="{{$order->order_user_name}}" maxlength="12">
    </div>
    <div class="input-group col-md-3">
      <div class="input-group-prepend input-group-text input-group-sm">
        支払条件
      </div>
        <input type="text" class="form-control text-left" name="terms" value="掛け" maxlength="4">
    </div>
    <div class="input-group col-md-2 small">
      <div class="input-group-prepend input-group-text input-group-sm">
        納期
      </div>
      <input type="button" class="form-control text-left" data-uk-datepicker="{format:'YYYY MM/DD'}" name="delivery_date" value="2019 02/10" maxlength="4">
    </div>
    <div class="input-group col-md-2 small">
      <div class="input-group-prepend input-group-text input-group-sm">
        支払予定日
      </div>
      <div class="input-group m-0 p-0 flex">
        <input type="button" class="form-control text-left" data-uk-datepicker="{format:'YYYY MM/DD'}"  name="payment_date" value="2019 02/10" maxlength="4">
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
  <div class="row">
    <div class="">
      <table class="table table-bordered mb-0">
        <thead class="thead-light">
          <tr>
            <th  style="width:27.8rem">品名</th>
            <th style="width:8rem">単価</th>
            <th class="" style="width:6rem">数量</th>
            <th class="" style="width:8rem">金額</th>
            <th class="" style="width:8rem">消費税</th>
            <th class="" style="width:8rem">税込金額</th>
            <th class="" style="width:4rem"></th>
          </tr>
        </thead>
      </table>

      <table class="table-bordered mt-0 border-top-0 px-1" id="detaillist">
        <thead class="border-top-0">
          <tr>
            <th class="p-0" style="width:27.8rem"></th>
            <th class="p-0" style="width:8rem"></th>
            <th class="p-0" style="width:6rem"></th>
            <th class="p-0" style="width:8rem"></th>
            <th class="p-0" style="width:8rem"></th>
            <th class="p-0" style="width:8rem"></th>
            <th class="p-0" style="width:4rem"></th>
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
        <input  type="button" class="btn btn-primary form-control col-6" name="regist" value="登録" onclick="validate()"></input>
        <input type="button"  class="btn form-control col-6"name="button" value="キャンセル"></input>
      </div>
    </div>
  </div>
</div>

<script type="application/javascript">
$(document).ready(function(){
   $('#detaillist input').addClass('border-0');
   var rows=[
     @foreach($details as $item)
     {
        odrdetail_id:{{$item->odrdetail_id}},
        item_name:"{{$item->item_name}}",
        unit_price:{{$item->unit_price/10000}},
        qty:{{$item->qty/10000}},
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
  $('.bg-danger').removeClass('bg-danger');
  try{
    $('.jpcurrency').each(function(elm){
      if( !elm.val().match(/\b\d{1,3}(,\d{3})*\b/)){
        throw new ObjectException(elm,'数値を入力してください');
      }
    });

  }catch(e){
    $(e.object).addClass('.bg-danger');
    toastr.options = {
      "positionClass": "toast-top-left",
      "timeOut": "1500",
    };
    toastr.error(e.message);
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
