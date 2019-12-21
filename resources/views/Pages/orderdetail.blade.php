@extends('layouts.app')

@section('content')
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

<div class="container">
  <div class="row">
    <div class="input-group col-6">
      <div class="input-group-prepend input-group-text input-group-sm">
        品名
      </div>
        <input type="text" class="form-control text-left" name="item_name" value="{{$order->item_name}}" maxlength="128">
    </div>
    <div class="input-group col-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        合計
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
        <input type="input" class="form-control text-left jpcurrency px-1" name="taxed_price"  value="{{number_format($order->order_price)}}" data-org="{{number_format($order->order_price)}}" maxlength="12">
    </div>
  </div>
  <div class="row">
    <div class="input-group col-md-5">
      <div class="input-group-prepend input-group-text input-group-sm">
        発注先
      </div>
        <input type="button" class="form-control text-left" name="order_to_name" value="{{$order->nickname}}" maxlength="4">
    </div>
    <div class="input-group col-md-5">
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
  </div>
</div>

@endsection
