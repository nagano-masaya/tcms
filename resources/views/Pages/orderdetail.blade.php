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
      <div class="input-group-prepend input-group-text input-group-sm">
        発注先
      </div>
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
        <input type="text" class="form-control text-left" name="order_to_name" value="掛け" maxlength="4">
    </div>
    <div class="input-group col-md-2 small">
      <div class="input-group-prepend input-group-text input-group-sm">
        納期
      </div>
        <input type="button" class="form-control text-left" name="order_to_name" value="2019 02/10" maxlength="4">
    </div>
    <div class="input-group col-md-2 small">
      <div class="input-group-prepend input-group-text input-group-sm">
        支払予定日
      </div>
        <input type="button" class="form-control text-left" name="order_to_name" value="2019 02/10" maxlength="4">
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
@foreach($details as $item)
          <tr data-id="{{$item->odrdetail_id}}">
            <td>
                <input type="text" class="form-control " name="item_name" value="{{$item->item_name}}" data-id="{{$item->odrdetail_id}}">
            </td>
            <td>
              <input type="text" class="form-control text-rigjt jpcurrency" name="unit_price" value="{{number_format($item->unit_price/10000)}}">
            </td>
            <td>
              <input type="text" class="form-control text-rigjt jpcurrency" name="qty" value="{{number_format($item->qty/10000)}}">
            </td>
            <td>
              <input type="text" class="form-control text-rigjt jpcurrency" name="total_price" value="{{number_format($item->total_price/10000)}}">
            </td>
            <td>
              <input type="text" class="form-control text-rigjt jpcurrency" name="tax" value="{{number_format($item->tax/10000)}}">
            </td>
            <td>
              <input type="text" class="form-control text-rigjt jpcurrency" name="taxed_price" value="{{number_format($item->taxed_price/10000)}}">
            </td>
            <td class="text-center"><span class="iconify clickable" data-icon="fa-solid:trash-alt" data-inline="false"  data-toggle="modal" data-target="#confirmdel"></span></td>
          </tr>
@endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="row">
    <div class="col-9">
    </div>
    <div class="col-3">
      <div class="row card-header">
        <input  type="button" class="btn form-control col-6" name="regist" value="登録" onclick="validate()"></input>
        <input type="button"  class="btn form-control col-6"name="button" value="キャンセル"></input>
      </div>
    </div>
  </div>
</div>

<script type="application/javascript">
$(document).ready(function(){
   $('#detaillist input').addClass('border-0');
});

function newrow(){
  console.log($('#rowtemplate tbody').html());
  $('#detaillist tbody').append(
    $('#rowtemplate tbody').html()
  );
}

function deleterow(elm){
  $(elm).parents('[data-id]').addClass("hidden");
}
</script>

<table class="hidden" id="rowtemplate">
  <tr data-id="0">
    <td>
        <input type="text" class="form-control " name="item_name" value="">
    </td>
    <td>
      <input type="text" class="form-control text-rigjt jpcurrency" name="unit_price" value="0">
    </td>
    <td>
      <input type="text" class="form-control text-rigjt jpcurrency" name="qty" value="0">
    </td>
    <td>
      <input type="text" class="form-control text-rigjt jpcurrency" name="total_price" value="0">
    </td>
    <td>
      <input type="text" class="form-control text-rigjt jpcurrency" name="tax" value="0">
    </td>
    <td>
      <input type="text" class="form-control text-rigjt jpcurrency" name="taxed_price" value="0">
    </td>
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

@endsection
