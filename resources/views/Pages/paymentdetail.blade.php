@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-10">
      <div class="row">
        <div class="input-group col-2 small">
          <div class="input-group-prepend input-group-text input-group-sm">
            発注日
          </div>
          <input type="button" readonly class="form-control text-left" data-uk-datepicker="{format:'YYYY MM/DD'}" name="order_date" value="{{$order->order_date->format('Y m/d')}}" maxlength="4">
        </div>
        <div class="input-group col-8 small">
          <div class="input-group-prepend input-group-text input-group-sm clickable">
            発注先
            <span class="iconify" data-icon="bx:bx-add-to-queue" data-inline="false" onclick="selectCompany()"></span>
          </div>
            <input type="text" readonly class="form-control text-left small" name="order_to_name" value="{{$order->order_to}}" maxlength="4">
        </div>
        <div class="input-group col-2">
          <div class="input-group-prepend input-group-text input-group-sm">
            発注金額
          </div>
          <input type="text" readonly class="form-control text-left jpcurrency px-1" name="order_price"  value="{{number_format($order->order_price)}}" data-org="{{number_format($order->order_price)}}" maxlength="15">
        </div>
      </div>
      <div class="row">
        <div class="input-group col-6 small">
          <div class="input-group-prepend input-group-text input-group-sm clickable">
            発注元工事
            <span class="iconify" data-icon="bx:bx-add-to-queue" data-inline="false" onclick="selectContruct()"></span>
          </div>
          <input type="text" readonly class="form-control text-left small" name="order_to_name" value="{{$order->cont_name}}" maxlength="64">
        </div>
        <div class="input-group col-md-2">
          <div class="input-group-prepend input-group-text input-group-sm">
            発注者
          </div>
            <input type="button" readonly class="form-control text-left" name="order_user_name" value="{{$order->order_user_name}}" data-id="{{$order->order_by}}" data-org-id="{{$order->order_by}}" data-org="{{$order->order_user_name}}" maxlength="12">
        </div>
        <div class="input-group col-2 small">
          <div class="input-group-prepend input-group-text input-group-sm">
            納期
          </div>
          <input type="button" readonly class="form-control text-left" data-uk-datepicker="{format:'YYYY MM/DD'}" name="order_date" value="{{ $order->recept_date != null ? $order->recept_date->format('Y m/d') : '' }}" maxlength="12">
        </div>
        <div class="input-group col-2 small">
          <div class="input-group-prepend input-group-text input-group-sm">
            納品日
          </div>
          <input type="button" class="form-control text-left" data-uk-datepicker="{format:'YYYY MM/DD'}" name="order_date" value="{{ $order->recepted_date!=null ? $order->recepted_date->format('Y m/d') : '' }}" maxlength="12">
        </div>
        <div class="input-group col-2 small">
          <div class="input-group-prepend input-group-text input-group-sm">
            請求受領日
          </div>
          <input type="button" class="form-control text-left" data-uk-datepicker="{format:'YYYY MM/DD'}" name="order_date" value="{{ $data->claim_date!=null ? $data->claim_date->format('Y m/d') : '' }}" maxlength="12">
        </div>
        <div class="input-group col-2 small">
          <div class="input-group-prepend input-group-text input-group-sm">
            請求受領者
          </div>
          <input type="text" class="form-control text-left p-1" name="claim_recept_user_name" data-id="{{$data->claim_recept_user_id}}" value="{{ $data->claim_recept_user_name}}" maxlength="12">
        </div>
        <div class="input-group col-2 small">
          <div class="input-group-prepend input-group-text input-group-sm">
            支払日
          </div>
          <input type="button" class="form-control text-left" data-uk-datepicker="{format:'YYYY MM/DD'}" name="recepted_date" value="{{ $data->recepted_date!=null ? $data->recepted_date->format('Y m/d') : '' }}" maxlength="12">
        </div>
        <div class="input-group col-2 small">
          <div class="input-group-prepend input-group-text input-group-sm">
            支払担当
          </div>
          <input type="text" class="form-control text-left" name="order_date" data-id="{{$data->recept_user_id}}" value="{{ $data->recepted_user_name }}" maxlength="12">
        </div>

      </div>
      <div class="row">
      </div>
    </div>
    <div class="col-2 card p-0 px-0">
      <div class="card-header small px-2">Memo</div>
      <table class="table " id="memolist">
        <tbody>
          <tr>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="row">
    <div class="col-12 p-0" style="overflow-x:scroll">
      <table class="table-bordered mt-3 px-1 " id="detaillist">
        <thead class="border-top-0 thead-hilight">
          <tr>
            <th class="dcol-1" >品名</th>
            <th class="dcol-2">単価</th>
            <th class="dcol-3" colspan="2">数量</th>
            <th class="dcol-4" >金額</th>
            <th class="dcol-5" >消費税</th>
            <th class="dcol-6" >税込金額</th>
          </tr>
        </thead>
        <tbody class="p-0" >
        </tbody>
      </table>
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
     //row.find('[data-id]').attr('data-id',itm.odrdetail_id);
     row.find('[name="item_name"]').val(itm.item_name);
     row.find('[name="unit_price"]').val(tcms_num3(itm.unit_price));
     row.find('[name="qty"]').val(tcms_num3(itm.qty));
     row.find('[name="total_price"]').val(tcms_num3(itm.total_price));
     row.find('[name="tax"]').val(tcms_num3(itm.tax));
     row.find('[name="taxed_price"]').val(tcms_num3(itm.taxed_price));
   });

   $('#detaillist input').addClass('bg-white');
   //attachNum3($('#detaillist .jpcurrency'));
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
var complist =[];

</script>

<table class="hidden" id="rowtemplate">
  <tr data-id="0">
    <td class="p-0">
        <input type="text" class="form-control px-1 border-0" name="item_name" value="" readonly>
    </td>
    <td class="p-0">
      <input type="text" class="form-control text-right p-1 border-0 jpcurrency" name="unit_price" value="0"  readonly>
    </td>
    <td class="p-0">
      <input type="text" class="form-control text-right p-1 border-0 jpcurrency" name="qty" value="0"  readonly>
    </td>
    <td class="p-0">
      <input type="text" class="form-control text-right p-1 border-0 readonly col_unit" name="unit" data-unit-id="1" value="日" readonly>
    </td>
    <td class="p-0">
      <input type="text" class="form-control text-right p-1 border-0 jpcurrency" name="total_price" value="0" readonly>
    </td>
    <td class="p-0">
      <input type="text" class="form-control text-right p-1 border-0 jpcurrency" name="tax" value="0" readonly>
    </td>
    <td class="p-0">
      <input type="text" class="form-control text-right p-1 border-0 jpcurrency" name="taxed_price" value="0" readonly>
    </td class="p-0">
  </tr>
</table>


@component('components.listSelector')
@slot('compo_id')
compselector
@endslot
@endcomponent
<script type="application/javascript">
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

var contlist =[];

function selectContruct(){
  if(contlist.length == 0){
    $.ajax({
        url: 'orderdetail',
        type: 'POST',
        data: {_token: CSRF_TOKEN,cid:'contlist',param:""}
    }).always(function(rdata) {
        contlist = [];
        data = JSON.parse(rdata);
        data.data.forEach(function(item){
          contlist.push({id:item.id, title:item.text});
        });
        selectContruct(); //{{-- !!!recursive call!!! --}}
    });
  };
  $('#compselector').showSelector('工事の選択',complist,function(id,text){
    $('[name="order_to_id"]').val(parseInt(id));
    $('[name="order_to_name"]').val(""+text);
  });

}
</script>

@component('components.listSelector')
@slot('compo_id')
contselector
@endslot
@endcomponent


@endsection
