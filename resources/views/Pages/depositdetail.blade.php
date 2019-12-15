@extends('layouts.app')

@section('content')
<input type="hidden" name="depo_id" value="{{$did}}"/>
<input type="hidden" name="user_id" value="{{$dep->nickname}}"/>


{{--
<input type="hidden" name="company_id" value="{{$dep->company_id}}"/>
<div class="container">
  <div class="row">
    <div class="input-group col-md-3">
      <div class="input-group-prepend input-group-text input-group-sm">
        入金日
      </div>
      <input type="button" class="form-control text-left" name="claim_date" value="{{$dep->dep_date->format('Y-m-d')}}" maxlength="4">
    </div>
    <div class="input-group col-md-6">
      <div class="input-group-prepend input-group-text input-group-sm">
        取引先
      </div>
      <input type="hidden" name="company_id" value="{{$dep->company_id}}"/>
      <input type="button" class="form-control text-left" name="nickname" value="{{$dep->nickname}}" maxlength="128">
    </div>
    <div class="input-group col-md-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        入金額
      </div>
      <input type="text" class="form-control jpcurrency" name="price" value="{{$dep->price}}" maxlength="12">
    </div>
    <div class="input-group col-md-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        振分残
      </div>
      <input type="text" readonly class="form-control jpcurrency" name="dept_remain" value="{{$con->pay_price}}" maxlength="12">
    </div>
  </div>
</div>
--}}

@endsection
