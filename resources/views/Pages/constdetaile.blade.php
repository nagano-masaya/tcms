@extends('layouts.app')

@section('content')

<script type="application/javascript">
var memos = [
    {"date":"2019-12-14 09:40","user":"利用者1","memo":"メモ１" },
    {'date':'2019-12-15 16:10','user':'利用者2','memo':'メモ2' }
  ];
{{--メモ初期化--}}
function onClickMemo(){
  targetElm = $(this);
  $('#memoarea').val($(targetElm).text());
  $('#memoarea').focus().select();
}
function onMenuEditEnd(){
  if(targetElm === null){
    targetElm = $('#memotbl tbody').prepend('<tr><td><div class="card" data-toggle="modal" data-target="#memoeditor"><div class="table-secondary"></div><pre class="content m-0"></pre></div></td></tr>')
      .find('.content').first();
  }

  $(targetElm).text($('#memoarea').val());
  t=new moment();
  title = t.format('YYYY-MM-DD HH:mm')+" "+"{{ Auth::user()->name }}";
  $(targetElm).parent().children().filter('.table-secondary').text(title);
  targetElm=null;
}
function initMemo(){
    //既存要素を削除
    $('#memotbl tbody tr').remove();

    memos.forEach(function(itm){
      console.log(itm);
      $('#memotbl tbody').append('<tr><td><div class="card" data-toggle="modal" data-target="#memoeditor"><div class="table-secondary">'+itm.date + " "+ itm.user +'</div><pre class="content m-0">'+itm.memo+'</pre></div></td></tr>')
    });
    $('#memotbl tbody [data-toggle] .content').click(onClickMemo);
}

initMemo();

{{--資材/機材初期化--}}
var resources = [
      {"date":"2019-12-14 11:24","name":"BH0.2","price":250000,"order_to":"南陽" },
      {'date':'2019-12-15 15:51','name':'利用者2','price':25000,"order_to":"川端"  }
];

function initResources(){
  $('#resourcetbl tbody tr').remove();
  var base = $('#resourcetbl tbody');
  resources.forEach(function(itm){
    $(base).append('<tr><td>'
              +itm.date+'</td><td>'
              +itm.name+'</td><td>'
              +itm.price+'</td><td>'
              +itm.order_to+'</td></tr>');
  });
}

initResources();

{{--出面追加--}}
var members = [
  {"name":"麻川","days":8,"hour":64.0,"unit_price":1680,"price":107520 },
  {'name':'高藤','days':7,"hour":56.0,"unit_price":1680, "price":94080 }
];

function initMembers(){
  $('#membertbl tbody tr').remove();
  var base = $('#membertbl tbody');
  members.forEach(function(itm){
    $(base).append('<tr><td>'+itm.name+'</td><td>'+itm.hour+'h </td><td>'+itm.unit_price+'</td><td>'+itm.price+'</td></tr>');
  });
}
initMembers();

</script>

<input type="hidden" class="form-control" name="cont_id" value="{{$cont->cont_id}}">
<input type="hidden" class="form-control" name="const_id" value="{{$con->const_id}}">
<div class="container">
  <div class="row">
    <div class="form-group input-group col-md-12">
      <div class="input-group-prepend input-group-text input-group-sm">
        <span>{{$cont->name}}</span>
      </div>
    </div>
  </div>
</div>

<div class="container form-group">
  <div class="row">
    <div class="input-group col-md-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        {{--工種	工事名	工期	状況	進捗	資材	出面--}}
        工種
      </div>
      <input type="text" class="form-control" name="cont_name" value="{{$con->name}}" maxlength="128">
    </div>
    <div class="input-group col-md-8">
      <div class="input-group-prepend input-group-text input-group-sm">
        現場名
      </div>
      <input type="text" class="form-control" name="cont_name" value="{{$con->name}}" maxlength="128">
    </div>
    <div class="input-group col-md-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        進捗
      </div>
      <div class="input-group" style="display:flex">
        <input type="text" class="form-control" name="cont_name" value="{{$con->name}}" maxlength="128">
        <div class="input-group-append">
          <span class="input-group-text">%</span>
        </div>
      </div>

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
    <div class="input-group col-9">
      <div class="input-group-prepend input-group-text input-group-sm">
        所在地
      </div>
      <input type="text" class="form-control" name="cont_name" value="{{$con->name}}" maxlength="128">
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="form-group input-group col-md-6">
      <div class="input-group-prepend input-group-text input-group-sm">
        <span>資材/機材</span>
      </div>
      <table class="small col-md-12" id="resourcetbl">
        <tbody>
          <tr>
            <td>1</td>
          </tr>
          <tr>
            <td>2</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="form-group input-group col-md-3">
      <div class="input-group-prepend input-group-text input-group-sm">
        <span>出面</span>
      </div>
      <table class="small col-md-12" id="membertbl">
        <tbody>
          <tr>
            <td>1</td>
          </tr>
          <tr>
            <td>2</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="form-group input-group col-md-3">
      <div class="input-group-prepend input-group-text input-group-sm form-row">
        <span class="col text-left">Memo</span><span data-toggle="modal" data-target="#memoeditor" class="iconify medium clickable" data-width="16px" data-icon="bx:bx-add-to-queue" data-inline="false" onclick="targetEml=null;$('#memoarea').val('');"></span>
      </div>
      <table class="small col-md-12" id="memotbl">
        <tbody>
          <tr>
            <td>1</td>
          </tr>
          <tr>
            <td>2</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script type="application/javascript">
  var targetElm = null;

</script>
@component('components.modal')
@slot('title')
メモの編集
@endslot
@slot('compo_id')
memoeditor
@endslot
@slot('on_click')
onMenuEditEnd()
@endslot
<textarea id="memoarea" rows="8" ></textarea>
@endcomponent

@endsection
