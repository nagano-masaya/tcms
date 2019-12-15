@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-6  table-primary">
          入金一覧
    </div>
    <div class="col-2 clickable table-primary">
      <span class="iconify" data-icon="bx:bx-add-to-queue" data-inline="false"></span>
      <span>新規</span>
    </div>
  </div>
  <div class="row">
    <table class="table-secondary col-8 table table-hover table-bordered text-center mb-0">
      <thead>
        <th class="text-center" style="width:6rem">日付</th>
        <th>取引先</th>
        <th class="text-center" style="width:10rem">金額</th>
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
</script>
@endsection
