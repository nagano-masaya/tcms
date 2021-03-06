@extends('layouts.app')

@section('content')
<input type="hidden" name="depo_id" value="{{$did}}"/>
<input type="hidden" name="user_id" value="{{$dep->nickname}}"/>
<script type="application/javascript">
  var claims=[];
  //-----------------------------------------
  //  新規分の請求を請求IDをキーとして追加
  //-----------------------------------------
  @foreach($claimrows as $item)
  claims['{{$item->clmdetail_id}}'] = {
     clmdetail_id:{{$item->claim_id}},
     claim_date:new moment('{{$item->claim_date}}'),
     claim_sent_date:new moment('{{$item->claim_sent_date}}'),
     details:"{{$item->title}}",
     claim_price:{{$item->total_price/10000}},
     payed_amount:{{($item->pay_price)/10000}},
     claim_remain:{{($item->total_price - $item->pay_price)/10000}},
     apply_price:0,
     is_new:true
  };
  @endforeach
  //-----------------------------------------
  //  既存分の請求を、請求IDをキーとして追加
  //  ※結果として新規分がオーバーライドされる
  //-----------------------------------------
  @foreach($disps as $item)
  claims['{{$item->clmdetail_id}}'] = {
     clmdetail_id:{{$item->clmdetail_id}},
     claim_date:new moment('{{$item->claim_date}}'),
     claim_sent_date:new moment('{{$item->claim_sent_date}}'),
     details:"{{$item->text}}",
     claim_price:{{$item->total_price/10000}},
     payed_amount:{{($item->pay_price - $item->disp_price)/10000}},
     claim_remain:{{($item->total_price - $item->pay_price - $item->disp_price)/10000}},
     apply_price:{{$item->apply_price/10000}},
     is_new:false
  };
  @endforeach

var histText = '{{$dep->history}}';
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


var history=[];

$(document).ready(function(){
  $('#claimlist tbody').children().remove();
  claims.forEach(function(v){
    var title="";
    $('#claimlist tbody').append(
        $('#rowtemplate tbody').html()
        .replace(/#date#/g,v.claim_date.format("Y M/D") )
        .replace(/#sent_date#/g,v.claim_sent_date.format("Y M/D") )
        .replace(/#title#/g,v.details )
        .replace(/#claim_price#/g,tcms_num3(v.claim_price.toString()))
        .replace(/#claim_remain#/g,tcms_num3(v.claim_remain.toString()))
        .replace(/#payed_price#/g,tcms_num3(v.payed_amount.toString()))
        .replace(/#id#/g,v.claim_id )
        .replace(/#price#/g,tcms_num3(v.apply_price.toString()) )
//          .replace('#price#',$this.disp_price)
    ) ;
    $('#claimlist .jpcurrency').on('input',function(){
      var v =null;
      $(this).val( tcms_num3($(this).val())  );
      recalcAmount();
    });
    recalcAmount();
  });

  history =eval("[]");
});



var postdata;
var hitem;

function validate(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

  var claims = [];
  $('#claimlist input[data-id]').each(function(index,elm){
    claims.push({
      claim_id:$(elm).attr('data-id'),
      price:parseInt($(elm).val().replace( /,/g, ''))
    });
  });

  postdata = {
   _token: CSRF_TOKEN,
   depo_id:parseInt($("input[name='depo_id']").val()),
   company_id:parseInt($("input[name='company_id']").val()),
   user_id:{{Auth::user()->id}},
   price:parseInt($("input[name='price']").val().replace( /,/g, '') ),
   depo_date:$("input[name='depo_date']").val().replace( /,/g, ''),
   claims:claims,
   history:"{{$dep->history}}"
 };

  hitem = {
    update_date:new Date(),
    depo_id:postdata.depo_id,
    company_id:postdata.company_id,
    user_id:postdata.user_id,
    price:postdata.price,
    depo_date:postdata.depo_date

  };

  $.ajax({
      url: 'depositdetail',
      type: 'POST',
      data: postdata,
      dataType: 'JSON'
  }).done(function (data,status,xhr) {
      console.log(data);
      //toastr.info('登録しました。');
      window.alert('登録しました');
  }).success(
    function(){alert("OK")}
  ).fail(
    function(){alert("NG")}
  )



}


</script>

<div class="container">
  <div class="row">
    <div class="input-group col-md-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        入金日
      </div>
        <input type="button" class="form-control text-left" name="depo_date" data-uk-datepicker="{format:'YYYY MM/DD'}" value="{{$dep->depo_date == null ? '' : $dep->depo_date->format('Y m/d')}}" data-org="{{$dep->depo_date == null ? '' : $dep->depo_date->format('Y m/d')}}" maxlength="4">
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
    <div class="row mt-3 mb-0">
      <div class="col-10 font-weight-bolder">
        {{$dep->nickname}} 様宛　請求書一覧
      </div>
      <div class="col-2">
      </div>
    </div>
    <div class="row mt-0">
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
    <div class="row">
      <div class="col-8">
      </div>
      <div class="col-4">
        <div class="row card-header">
          <input  type="button" class="btn form-control col-6" name="regist" value="登録" onclick="validate()"></input>
          <input type="button"  class="btn form-control col-6"name="button" value="キャンセル"></input>
        </div>
      </div>
    </div>
</div>


<div class="hidden" id="rowtemplate">
  <table>
    <tbody>
      <tr>
        <td class="col_date ">#date#</td>
        <td class="col_date ">#sent_date#</td>
        <td class="text-truncate">#title#</td>
        <td class="col_price text-right">#claim_price#</td>
        <td class="col_price text-right">#payed_price#</td>
        <td class="col_price text-right">#claim_remain#</td>
        <td class="col_price" >
          <input type="text" class="border-0 form-control-plaintext text-right jpcurrency py-0 " name="price" value="#price#" data-id="#id#" data-org="#price#" maxlength="15"/>
        </td>
      </tr>
    </tbody>
  </table>
</div>

@endsection
