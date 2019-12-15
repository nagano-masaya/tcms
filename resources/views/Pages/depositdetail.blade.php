@extends('layouts.app')

@section('content')
<input type="hidden" name="depo_id" value="{{$did}}"/>
<input type="hidden" name="user_id" value="{{$dep->nickname}}"/>

<script type="application/javascript">
  var claims=[
    @foreach($disps as $item)
      {
         claim_id:{{$item->claim_id}},
         details:[
           @foreach(json_decode($item->details) as $detail)
             "{{$detail->text}}",
           @endforeach
         ],
         claim_price:{{$item->price/10000}},
         disp_price:{{$item->disp_price/10000}}
      },
    @endforeach
  ];

var obj;

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
        .replace('#id#',v.claim_id )
        .replace('#title#',title )
        .replace('#claim_price#',tcms_num3(v.claim_price.toString()))
        .replace('#price#',tcms_num3(v.disp_price.toString()) )
//          .replace('#price#',$this.disp_price)
    ) ;
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
        <input type="text" readonly class="form-control jpcurrency" name="dept_remain" value="{{number_format($dep->pay_price/10000)}}" maxlength="12">
      </div>
    </div>
    <div class="row">
      <div class="col-12">
          <table class="table table-bordered mt-0" id="claimlist">
            <tbody>
            </tbody>
          </table>
      </div>
    </div>
</div>


<div class="hidden" id="rowtemplate">
  <table>
    <tbody>
      <tr>
        <td>#id#</td>
        <td>#title#</td>
        <td class="col_price text-right">#claim_price#</td>
        <td class="col_price text-right">#price#</td>
      </tr>
    </tbody>
  </table>
</div>
@endsection
