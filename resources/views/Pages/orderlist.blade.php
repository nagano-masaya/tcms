@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-10">
      発注一覧
    </div>
    <div class="col-2 clickable">
      <span class="iconify" data-icon="bx:bx-add-to-queue" data-inline="false"></span>
      <span>新規</span>
    </div>

  </div>
<script type="application/javascript">
 var elm;
 var param;
  function showDetail(evt){
    var cid=evt;
    if( cid!==null ){
      window.location.href="orderdetail?cid="+cid+"&t="+CCSKEY();
      return;
    }
    window.location.href="orderdetail";
  }
</script>

  <div class="row">
    <div class="col-12">
      <div class="">

      </div>
      <table class="table small table-bordered">
        <thead>
          <th class="card-header" style="width:6rem"><span>発注日</span></th>
          <th class="card-header" style="width:8rem"><span>工事</span></th>
          <th class="card-header" style="width:auto"><span>品名</span></th>
          <th class="card-header" style="width:6rem"><span>金額</span></th>
          <th class="card-header" style="width:6rem"><span>納品日</span></th>
          </th>
        </thead>
        <tbody>
            @foreach($orders as $con)
            <tr cid="{{$con->order_id}}" onclick="showDetail({{$con->order_id}})">
              <td>{{$con->order_date->format('Y/m/d')}}</td>
              <td>{{$con->cont_name }}</td>
              <td>{{$con->item_name}}</td>
              <td class="text-right">{{$con->price/10000}}</td>
              <td class="text-right">{{$con->recept_date == null ? "-" : $con->recept_date->format('Y/m/d')}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
