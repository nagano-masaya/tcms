@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-10">
      請求一覧
    </div>
    <div class="col-2 clickable">
      <span class="iconify" data-icon="bx:bx-add-to-queue" data-inline="false"></span>
      <span>新規</span>
    </div>

  </div>
<script type="application/javascript">
  function showDetail(){
    var cid=$(this).attr('cid');
    if( cid!==null ){
      window.location.href="claimdetail?cid="+cid;
      return;
    }
    window.location.href="claimdetail";
  }
</script>

  <div class="row">
    <div class="col-12">
      <div class="{{$cons}}">

      </div>
      <table class="table small">
        <thead>
          <th class="card-header" style="width:6rem"><span>請求日</span></th>
          <th class="card-header" style="width:4rem"><span>発送日</span></th>
          <th class="card-header" style="width:auto"><span>請求先</span></th>
          <th class="card-header" style="width:6rem"><span>請求額</span></th>
          <th class="card-header" style="width:6rem"><span>受領額</span></th>
          </th>
        </thead>
        <tbody>
          @foreach($cons as $con)
            <tr cid="{{$con->claim_id}}" onclick="showDetail()">
              <td>{{$con->claim_date->format('Y/m/d')}}</td>
              <td>{{$con->claim_sent_date->format('m/d')}}</td>
              <td>{{$con->nickname}}</td>
              <td class="text-right">{{$con->price/10000}}</td>
              <td class="text-right">{{$con->pay_price/10000}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
