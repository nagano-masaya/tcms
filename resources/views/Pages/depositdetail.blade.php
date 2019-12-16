@extends('layouts.app')

@section('content')
<input type="hidden" name="depo_id" value="{{$did}}"/>
<input type="hidden" name="user_id" value="{{$dep->nickname}}"/>

<script type="application/javascript">
  var claims=[
      @foreach($disps as $item)
      {
         claim_id:{{$item->claim_id}},
         claim_date:new moment('{{$item->claim_date}}'),
         claim_sent_date:new moment('{{$item->claim_sent_date}}'),
         details:[
           @foreach(json_decode($item->details) as $detail)
             "{{$detail->text}}",
           @endforeach
         ],
         claim_price:{{$item->price/10000}},
         payed_amount:{{($item->pay_price - $item->disp_price)/10000}},
         claim_remain:{{($item->price - $item->pay_price - $item->disp_price)/10000}},
         disp_price:{{$item->disp_price/10000}}
      },
    @endforeach
  ];

var obj;
var v1;

function recalcAmount(){
  var ttl=0;
  $('#claimlist .jpcurrency').each(function(){
    ttl += parseInt("0"+$(this).val().replace( /[^0-9]/g, ''));
  })
  v1 = parseInt( $('input[name="price"]').val().replace( /,/g, '') ) - ttl;
  $('input[name="dept_remain"]').val(tcms_num3(v1.toString()));
}

$(document).ready(function(){
  $('#claimlist tbody').children().remove();
  claims.forEach(function(v){
    var title="";
    obj = v.details;
    obj.forEach(function(detail){
      title = title + detail + '<br>';
    });
    $('#claimlist tbody').append(
        $('#rowtemplate tbody').html()
        .replace(/#date#/g,v.claim_date.format("Y M/D") )
        .replace(/#sent_date#/g,v.claim_sent_date.format("Y M/D") )
        .replace(/#title#/g,title )
        .replace(/#claim_price#/g,tcms_num3(v.claim_price.toString()))
        .replace(/#claim_remain#/g,tcms_num3(v.claim_remain.toString()))
        .replace(/#payed_price#/g,tcms_num3(v.payed_amount.toString()) )
        .replace(/#id#/g,v.claim_id )
        .replace(/#price#/g,tcms_num3(v.disp_price.toString()) )
//          .replace('#price#',$this.disp_price)
    ) ;
    $('#claimlist .jpcurrency').on('input',function(){
      var v =null;
      $(this).val( tcms_num3($(this).val())  );
      recalcAmount();
    });
    recalcAmount();
  })
});


</script>

<div class="container">
  <div class="row">
    <div class="input-group col-md-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        入金日
      </div>
        <input type="button" class="form-control text-left" name="claim_date" value="{{$dep->dep_date == null ? '' : $dep->dep_date->format('Y-m-d')}}" maxlength="4">
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
      <input type="text" class="form-control jpcurrency" name="price" value="{{number_format($dep->price/10000)}}" maxlength="12">
    </div>
    <div class="input-group col-md-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        振分残
      </div>
        <input type="text" readonly class="form-control px-0 jpcurrency" name="dept_remain" value="{{number_format($dep->pay_price/10000)}}" maxlength="12">
      </div>
    </div>
    <div class="row mt-2">
      <table class="table table-bordered table-responsive small" style="table-layout: fixed" id="claimlist">
        <thead class="thead-light">
          <th class="col_date">請求日</th>
          <th class="col_date">送付日</th>
          <th class="" style="width:40rem">内容</th>
          <th class="col_price">請求額</th>
          <th class="col_price">受領額</th>
          <th class="col_price">未収</th>
          <th class="col_price">請求充当額</th>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
</div>


<div class="hidden" id="rowtemplate">
  <table>
    <tbody>
      <tr>
        <td class="col_date small">#date#</td>
        <td class="col_date small">#sent_date#</td>
        <td class="text-truncate">#title#</td>
        <td class="col_price text-right small">#claim_price#</td>
        <td class="col_price text-right small">#payed_price#</td>
        <td class="col_price text-right small">#claim_remain#</td>
        <td class="col_price" data-id="#id" data-org="#price">
          <input type="text" class="border-0 form-control-plaintext text-right jpcurrency small py-0 " name="price" value="#price#" maxlength="15"/>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<pre>
  {{$dep}}
</pre>
@endsection
