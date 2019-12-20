@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-6">
          入金一覧
    </div>
    <div class="col-2 clickable" onclick="$('#custselector').modal('show')">
      <span class="iconify" data-icon="bx:bx-add-to-queue" data-inline="false"></span>
      <span>新規</span>
    </div>
  </div>
  <div class="row">
    <table class="col-8 table table-hover table-bordered text-center mb-0">
      <thead>
        <th class="text-center card-header" style="width:6rem">日付</th>
        <th class="card-header">取引先</th>
        <th class="text-center card-header" style="width:10rem">金額</th>
      </thead>
    </table>
  </div>
  <div class="row">
    <table class="col-8 table table-hover table-bordered">
      <tbody>
@foreach($depos as $item)
        <tr class="clickable" data-cid="{{$item->depo_id}}">
          <td class="small" style="width:6rem">
            {{$item->depo_date->format('Y m/d')}}
          </td>
          <td class="small">
            {{$item->nickname}}
          </td>
          <td class="small text-right" style="width:10rem">
            {{number_format($item->price)}}
          </td>
        </tr>
@endforeach
      </tbody>
    </table>
  </div>
</div>
<script type="application/javascript">
  $('[data-cid]').click(function(){
    window.location.href = "{{ url('/depositdetail') }}?did=" + $(this).attr('data-cid');
  });
function onSelect(){
  window.location.href = "{{ url('/depositdetail') }}?cid=" + sel_cust_id;
}

var sel_cust_text;
var sel_cust_id;

</script>

@component('components.modal')
@slot('title')
入金元の取引先を選択してください
@endslot
@slot('compo_id')
custselector
@endslot
@slot('on_click')
onSelect()
@endslot
<div class="component">
  <div class="row">
    <table class="table table-hover">
      <tbody>
        @foreach($coms as $cst)
          <tr><td data-custid="{{$cst->company_id}}">{{$cst->nickname}}</td></tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<script type="application/javascript">

  $("#custselector [data-custid]").click(function(){
    $('#custselector [data-custid]').removeClass('active');
    $(this).addClass('active');
    sel_cust_text = $(this).text();
    sel_cust_id = $(this).attr('data-custid');
    console.log($(this).text());
  });
</script>
@endcomponent



@endsection
