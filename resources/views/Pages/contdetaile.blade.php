@extends('layouts.app')


@section('content')
<input type="hidden" class="form-control" name="cont_id" value="{{$con->cont_id}}">
<div class="container shadow p-2">
  <div class="row">
    <div class="input-group col-md-9">
      <div class="input-group-prepend input-group-text input-group-sm">
        工事名
      </div>
      <input type="text" class="form-control" name="cont_name" value="{{$con->name}}" maxlength="128">
    </div>

    <div class="input-group col-md-3">
      <div class="input-group-prepend input-group-text">
        受注額
      </div>
      <input type="text" class="form-control" name="price" value="{{ number_format($con->price/10000)}}" style="text-align: right; " maxlength="16">
    </div>
  </div>
  <div class="row">
    <div class="input-group col-3">
      <div class="input-group-prepend input-group-text">
        工期
      </div>
      <div class="row-cols-2">
        <input type="button" class="form-control" name="condate_from"  data-uk-datepicker="{format:'YYYY-MM-DD'}">
        <input type="button" class="form-control " name="condate_to" value=""  data-uk-datepicker="{format:'YYYY-MM/DD'}">
      </div>
      <script type="application/javascript">

        var dtFrom = new UltraDate("{{$con->date_from}}");
        var dtTo = new UltraDate("{{$con->date_to}}");
        //alert(dtFrom.format("ge.M/d"));
        //$("#contdate").val(dtFrom.format("ge.M/d") + " - " + dtTo.format("ge.M/d"));
        var str="";
        var strData="";
        if( !isNaN(dtFrom)){
          str=dtFrom.format("yyyy-MM-dd");
          strData = dtFrom.format("yyyy-MM-dd")
        }
        $('input[name="condate_from"]').val(str);

        str="";
        var strData="";
        if( !isNaN(dtTo)){
          str=dtTo.format("yyyy-MM-dd");
          strData = dtTo.format("yyyy-MM-dd")
        }
        $('input[name="condate_to"]').val(str);

      </script>
    </div>
    <div class="input-group col-6">
      <div class="input-group-prepend input-group-text">
        施　主
      </div>
      <input type="text" class="form-control" name="customer" value="{{$con->customer}}" maxlength="64">
    </div>
    <div class="input-group col-3">
      <div class="input-group-prepend input-group-text">
        実行予算
      </div>
      <input type="text" class="form-control text-right" name="exec_budget" value="{{ number_format($con->exec_budget/10000)}}" maxlength="64">
    </div>
　</div>

<div class="row">
  <div class="input-group col-3 input-group">
    <div class="input-group-prepend input-group-text">
      状況
    </div>
    <input type="button" class="form-control" name="state" value="{{$con->state}}">
  </div>
  <div class="input-group col-6">
    <div class="input-group-prepend input-group-text">
      発注元
    </div>
    <input type="hidden" class="form-control" name="cust_company_id" value="{{$con->cust_company_id}}" maxlength="64">
    <input type="text" class="form-control" name="cust_company" value="{{$con->cust_company}}" maxlength="64">
  </div>
  <div class="input-group col-3">
    <div class="input-group-prepend input-group-text">
      予算残
    </div>
    <input type="button" class="form-control" name="budget_remain" value="{{ number_format($con->budget_remain/10000)}}" style="text-align: right; ">
  </div>
　</div>
<div class="row">
  <div class="input-group col-4 input-group">
    <div class="input-group-prepend input-group-text">
      受注額（税込）
    </div>
    <input type="text" class="form-control text-right" name="price_taxed" value="{{ number_format($con->price_taxed/10000)}}" maxlength="16">
  </div>
  <div class="input-group col-4">
    <div class="input-group-prepend input-group-text">
      請求残
    </div>
    <input type="button" class="form-control text-right" name="claim_remain" value="{{number_format($con->claim_remain/10000)}}" >
  </div>
  <div class="input-group col-4">
    <div class="input-group-prepend input-group-text">
      入金残
    </div>
    <input type="button" class="form-control" name="deposit_remain" value="{{number_format($con->deposit_remain/10000)}}">
  </div>
　</div>

</div>

{{-- 工事一覧 --}}
<div class="container shadow p-2">
  <div class="row">
    <div class="col-md-11 ">
      工種/現場一覧
    </div>
    <div class="col-md-1 text-right clickable">
      <span class="iconify" data-icon="bx:bx-add-to-queue" data-inline="false"></span>
      <span>新規</span>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 ">
      <table class="table table-condensed table-striped table-responsive input-group-text">
        <thead>
          <th class="card-header" style="width:5rem">工種</th>
          <th class="card-header" style="width:80rem">工事名</th>
          <th class="card-header" style="width:20rem">工期</th>
          <th class="card-header" style="width:5rem">状況</th>
          <th class="card-header" style="width:5rem">進捗</th>
          <th class="card-header" style="width:12rem">資材</th>
          <th class="card-header" style="width:8rem">出面</th>
          <th class="card-header">
              <button type="button" class="btn btn-outline-dark btn-md" id="constmenu" data-icon="bx:bx-add-to-queue" value="+">
              </button>
            </div>
          </th>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-10">
    </div>
    <div class="col-2 input-group-text">
      <input class="form-control" type="button" name="" onclick="validate()" value="　保存　"/>
    </div>
  </div>
</div>

<script type="application/javascript">
var actions = [{
  name: '工種/現場を追加',
  onClick: function() {
    window.location.href='constdetaile?cont=0'
  }
}, {
  name: '削除取り消し',
  onClick: function() {
    toastr.info("'Another action' clicked!");
  }
}];
var tdata = 1;

var menu1 = new BootstrapMenu('#constmenu', {
  menuEvent: 'click', // default value, can be omitted
  menuSource: 'element',
  menuPosition: 'belowLeft', // default value, can be omitted
  actions: actions/* ... */
});

function validate(){
  var  numTest = v8n()
                  .passesAnyOf(
                    v8n().numeric(),
                    v8n().pattern(/\b\d{1,3}(,\d{3})*\b/)
                  );

  if( !numTest.test($('input[name="price"]').val()) ){
    alert("受注額には数字を入力してください");
    $('input[name="price"]').focus().select();
    return;
  }
  if( !numTest.test($('input[name="exec_budget"]').val()) ){
    alert("実行予算には数字を入力してください");
    $('input[name="exec_budget"]').focus().select();
    return;
  }
  if( !numTest.test($('input[name="price_taxed"]').val()) ){
    alert("受注額(税込)には数字を入力してください");
    $('input[name="price_taxed"]').focus().select();
    return;
  }

  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

  $.ajax({
      url: 'contdetaile',
      type: 'POST',
      data: {_token: CSRF_TOKEN,
        cont_id:$("input[name='cont_id']").val(),
        name:$("input[name='cont_name']").val(),
        date_from:$("input[name='condate_from']").val(),
        date_to:$("input[name='condate_to']").val(),
        customer:$("input[name='customer']").val(),
        cust_company:$("input[name='cust_company']").val(),
        cust_person:$("input[name='cust_person']").val(),
        price:$("input[name='price']").val(),
        budget_remain:$("input[name='budget_remain']").val(),
        state:$("input[name='state']").val(),
        exec_budget:$("input[name='exec_budget']").val(),
        price_taxed:$("input[name='price_taxed']").val(),
        claim_remain:$("input[name='claim_remain']").val(),
        deposit_remain:$("input[name='deposit_remain']").val(),
        documents:$("input[name='documents']").val(),
        comment:$("input[name='comment']").val(),
        sales_person:$("input[name='sales_person']").val(),
        update_by:$("input[name='cont_id']").val(),
      },
      dataType: 'JSON',
      success: function (data) {
          console.log(data);
          //toastr.info('登録しました。');
          alert('登録しました');
      }
  }).done(function (data,status,xhr) {
      console.log(data);
      //toastr.info('登録しました。');
      window.alert('登録しました');
  });

}


</script>

@endsection
