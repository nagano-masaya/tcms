@extends('layouts.app')

@section('content')
<script type="application/javascript">
  var claim_date = new moment('{{$con->claim_date}}');
  var claim_sent_date = new moment('{{$con->claim_sent_date}}');
  var claim_id = {{$con->claim_id}};
  var company_id = {{$con->company_id}};
  var pay_price = {{$con->pay_price}};
  var details = [

  @foreach(json_decode($con->details) as $itm)
      {
        cont_id:{{$itm->cont_id}},
        cont_text:"{{$itm->cont_text}}",
        text:"{{$itm->text}}",
        unit_price:{{$itm->unit_price}}/10000,
        qty:{{$itm->qty}},
        price:{{$itm->price}}/10000,
        deleted:false
      },
  @endforeach
  ];//{cont_id,cont_text,text,unit_price,qty,price,tax}




  var objs;
  function initDetails(){
    $("#detaillist tbody").children().remove();
    var num=1;
    details.forEach(function(itm){
      var templ=$('#rowbase').html();

      if(!itm.deleted && templ !== undefined ){
        $("#detaillist tbody").append(
          '<tr><td>'
          + templ
          .replace("#row#",num)
          .replace("#text#",itm.text)
          .replace("#unit_price#",itm.unit_price)
          .replace("#qty#",itm.qty)
          .replace("#price#",itm.price)
          .replace("#cont_text#",itm.cont_text)
          .replace("#cont_id#",itm.cont_id)
          +'</td></tr>'
        );
      }
      num++;
    });


    $("#detaillist tbody .col_qty,.col_uprice").keyup(function(){
      num=1;
      objs = $(this).parent().find('.col_qty,.col_uprice');
        try{
          $(this).parent().find('.col_qty,.col_uprice').each(function(idx,itm){
            num = num * parseInt($(itm).val().replace( /,/g, ''));
          });
          if(!isNaN(num)){
            $(this).siblings('.col_price').val(String(num).replace( /(\d)(?=(\d\d\d)+(?!\d))/g, '$1,'));
          }
        }catch(e){
            console.log(e);
        }
      console.log(num);
    });
  }
  function saveDetails(){
    var arr=[];
    $("#detaillist td").each(function(){
        arr.push(
          {
            cont_id:parseInt($(this).find('[cid]').attr('cid')),
            cont_text:$(this).find('[cid]').text(),
            text:$(this).find('.col_text').val(),
            unit_price:parseInt($(this).find('.col_uprice').val()),
            qty:parseInt($(this).find('.col_qty').val()),
            price:parseInt($(this).find('.col_price').val()),
            deleted:false
          }
        )
    });
    details=arr;
    $('[name="details"]').val(JSON.stringify(arr));
  }


  function validate(){
    saveDetails();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    console.log($('input[name="company_id"]').val());
    $.ajax({
        url: 'claimdetail',
        type: 'POST',
        data: {_token: CSRF_TOKEN,
          claim_id:parseInt($("input[name='claim_id']").val()),
          company_id:parseInt($("input[name='company_id']").val()),
          user_id:parseInt($("input[name='user_id']").val()),
          price:parseInt($("input[name='price']").val()),
          claim_date:$("input[name='claim_date']").val(),
          claim_make_date:$("input[name='claim_make_date']").val(),
          claim_sent_date:$("input[name='claim_sent_date']").val(),
          pay_date:$("input[name='pay_date']").val(),
          pay_price:parseInt($("input[name='pay_price']").val()),
          price_total:parseInt($("input[name='price_total']").val()),
          tax_rate:parseInt($("input[name='tax_rate']").val()),
          tax:parseInt($("input[name='tax']").val()),
          taxed_price:parseInt($("input[name='taxed_price']").val()),
          discount_price:parseInt($("input[name='discount_price']").val()),
          offset_price:parseInt($("input[name='offset_price']").val()),
          details:$("input[name='details']").val(),
          history:$("input[name='history']").val(),
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



  initDetails();
</script>

<input type="hidden" name="claim_id" value="{{$con->claim_id}}"/>
<input type="hidden" name="user_id" value="{{$con->user_id}}"/>
<input type="hidden" name="company_id" value="{{$con->company_id}}"/>
<input type="hidden" name="details" value="{{json_encode($con->details)}}"/>
<input type="hidden" name="claim_make_date" value="{{$con->claim_make_date->format('Y-m-d')}}"/>
<input type="hidden" name="claim_sent_date" value="{{$con->claim_sent_date->format('Y-m-d')}}"/>
<div class="container">
  <div class="row">
    <div class="input-group col-md-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        請求日
      </div>
      <input type="button" class="form-control text-left" name="claim_date" value="{{$con->claim_date->format('Y-m-d')}}" maxlength="128">
    </div>
    <div class="input-group col-md-6">
      <div class="input-group-prepend input-group-text input-group-sm">
        請求先
      </div>
      <input type="button" class="form-control text-left" name="cont_name" value="{{$con->nickname}}" maxlength="128">
    </div>
    <div class="input-group col-md-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        請求額
      </div>
      <input type="text" class="form-control jpcurrency" name="price" value="{{$con->price}}" maxlength="12">
    </div>
    <div class="input-group col-md-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        受領額
      </div>
      <input type="text" readonly class="form-control jpcurrency" name="pay_price" value="{{$con->pay_price}}" maxlength="12">
    </div>
  </div>
  <div class="row">
    <div class="input-group col-md-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        合計金額
      </div>
      <input type="text" class="form-control text-right jpcurrency" name="price_total" value="{{$con->price_total}}" maxlength="12">
    </div>
    <div class="input-group col-md-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        消費税率(%)
      </div>
      <input type="text" class="form-control text-left" name="tax_rate" value="{{$con->tax_rate}}" maxlength="3">
    </div>
    <div class="input-group col-md-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        消費税
      </div>
      <input type="text" class="form-control text-right jpcurrency" name="tax" value="{{$con->tax}}" maxlength="12">
    </div>
    <div class="input-group col-md-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        税込金額
      </div>
      <input type="text" class="form-control text-right jpcurrency" name="taxed_price" value="{{$con->price_total}}" maxlength="12">
    </div>
    <div class="input-group col-md-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        相殺
      </div>
      <input type="text" class="form-control text-right jpcurrency" name="offset_price" value="{{$con->offset_price}}" maxlength="12">
    </div>
    <div class="input-group col-md-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        値引
      </div>
      <input type="text" class="form-control text-right jpcurrency" name="discount_price" value="{{$con->discount_price}}" maxlength="12">
    </div>
  </div>
</div>

<div class="container">
  <div class="row mt-2">
    <div class="col-10">
明細
    </div>
    <div class="col-2 text-right">
      <span class="iconify" data-icon="bx:bx-add-to-queue" data-inline="false"></span>
      <span>新規</span>
    </div>
  </div>
  <div class="row">
    <table class="">
      <thead  class="card-header">
        <tr>
          <th>
            <div class="container">
              <div class="row">
                <div class="col-7">項目</div>
                <div class="col-2">単価</div>
                <div class="col-1">数量</div>
                <div class="col-2">金額</div>
              </div>
            </div>
          </th>
        </tr>
        <tr>
          <th><div class="col-12">
            関連工事
          </div></th>
        </tr>
      </thead>
    </table>
    <table class="table table-striped" id="detaillist">
      <tbody>
      </tbody>
    </table>
  </div>
</div>

<input class="form-control" type="button" name="" onclick="validate()" value="　保存　"/>
<input class="form-control" type="button" name="" onclick="" value="　保存せずに戻る　"/>

{{-- このコンポーネントは #rowbaseより前に定義すること　※#rowbaseが表示される--}}
@component('components.modal')
@slot('title')
工事の選択
@endslot
@slot('compo_id')
constselector
@endslot
@slot('on_click')
onContSelectionEnd()
@endslot
<script type="application/javascript">
var conts = [
  @foreach($conts as $cont)
  {
    cont_id:{{$cont->cont_id}},
    cont_name:"{{$cont->name}}"
  },
  @endforeach
];
  var selected_cont_id;
  var selected_cont_name;
  var caller;
  function showContSelector(call){
      caller = $(call);
      $('#constselector').modal('show');
  }

  function onClickContItem(){
    selected_cont_id = $(this).attr('data-cid');
    selected_cont_name = $(this).text();
  }
  function initContList(){
    conts.forEach(function(itm){
      $('#contlist tbody').append(
        '<tr><td><div data-cid="'+itm.cont_id+'">'+itm.cont_name+'</div></td></tr>"'
      );
      $('#contlist [data-cid]').click(onClickContItem);
    });
  };

  initContList();

  function onContSelectionEnd(){
    caller.text(selected_cont_name);
    caller.attr('cid',selected_cont_id);
  }
</script>
<table class="table table-hover table-striped" id="contlist">
  <tbody>
  </tbody>
</table>
@endcomponent

<div id="rowbase" style="visibility:hidden;width:0px;height:0px">
  <div class="container" data-rowid="#row#">
    <div class="row">
      <input type="text" class="form-control col-7 col_text" value="#text#"/>
      <input type="text" class="form-control col-2 col_uprice  text-right jpcurrency" value="#unit_price#"/>
      <input type="text" class="form-control col-1 col_qty" value="#qty#"/>
      <input type="text" class="form-control col-2 col_price text-right jpcurrency" value="#price#"/>
      </div>
    </div>
    <div class="row clickable">
     <div class="col-11 small">
      <button class="form-control text-left" onclick="showContSelector(this)"  cid="#cont_id#">
        #cont_text#
      </button>
     </div>
     <div class="col-1">
       <span class="iconify clickable" data-icon="bx:bx-arrow-from-bottom" data-inline="false"></span>
       <span class="iconify clickable" data-icon="bx:bx-arrow-from-top" data-inline="false"></span>
       <span class="iconify clickable" data-icon="fa-solid:trash-alt" data-inline="false" onclick="delete_cont('#row#')"></span>
    </div>
</div>


{{--
  <pre>
  {{var_dump($con)}}
  </pre>
--}}
@endsection
