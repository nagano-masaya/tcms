@extends('layouts.app')

@push('style')
<style media="screen">

table th,td{
  padding: 0;
}
</style>
@endpush

@section('content')
<script type="application/javascript">
  var claim_date = new moment('{{$con->claim_date}}');
  var claim_sent_date = new moment('{{$con->claim_sent_date}}');
  var claim_id = {{$con->claim_id}};
  var company_id = {{$con->company_id}};
  var pay_price = {{$con->pay_price}};
  var details = [
  @foreach($details as $itm)
      {
        clmdetail_id:{{$itm->clmdetail_id}},
        claim_id:{{$itm->claim_id}},
        cont_id:{{$itm->cont_id}},
        cont_text:"{{$itm->cont_text}}",
        text:"{{$itm->title}}",
        unit_price:{{$itm->unit_price/10000}},
        qty:{{$itm->qty/10000}},
        price:{{$itm->total_price/10000}},
        tax:{{$itm->tax/10000}},
        taxed_price:{{$itm->taxed_price/10000}},
        offset_price:{{$itm->offset_price/10000}},
        discount_price:{{$itm->discount_price/10000}},
        deleted:false
      },
  @endforeach
  ];//{cont_id,cont_text,text,unit_price,qty,price,tax}
function _n(s){
  return parseInt(s.replace(/[^0-9]+/g,""));
}

function calcPrices(){
  var subtotal = 0;
  var tax = 0;
  var total = 0;
  var offset = 0;
  var discount = 0;

  $('#detaillist tbody tr [name="total_price"]').each(function(){
    subtotal += _n($(this).val());
  });
  $('#detaillist tbody tr [name="tax"]').each(function(){
    tax += _n($(this).val());
  });
  $('#detaillist tbody tr [name="taxed_price"]').each(function(){
    total += _n($(this).val());
  });
  $('#detaillist tbody tr [name="offset_price"]').each(function(){
    offset += _n($(this).val());
  });
  $('#detaillist tbody tr [name="discount_price"]').each(function(){
    discount += _n($(this).val());
  });



}

function newItem(){
  //$('#constselector').show();
 var templ=$('#rowbase').html();
  num = $("#detaillist tbody tr").length;
  $("#detaillist tbody").append(
      '<tr data-rowid="'+num+'"><td>'
    + templ
    .replace("#clmdid#",0)
    .replace(/#row#/g,num)
    .replace("#text#","")
    .replace("#unit_price#",0)
    .replace("#qty#",0)
    .replace("#price#",0)
    .replace("#cont_text#","")
    .replace("#tax#","")
    .replace("#taxed_price#","")
    .replace("#offset_price#","")
    .replace("#discount_price#","")
    .replace("#cont_id#","")
    +'</td></tr>'
  ).find('.jpcurrency').each(function(){
      $(this).on(
        'input', function(){
          $(this).val(
            tcms_num3($(this).val())
          );
        }
      )
   });
}

var objs;
function initDetails(){
  $("#detaillist tbody").children().remove();
  var parent = $("#detaillist tbody");
  var num=0;
  details.forEach(function(itm){
    var templ=$('#rowbase').html();

    if(!itm.deleted && templ !== undefined ){
      var rowid=UUID()+num;
      var elm = $(
        '<tr data-rowid="'+rowid+'"><td>'
        + templ
        .replace("#clmdid#",itm.clmdetail_id)
        .replace(/#row#/g,rowid)
        .replace("#text#",itm.text)
        .replace("#unit_price#",itm.unit_price)
        .replace("#qty#",itm.qty)
        .replace("#price#",itm.price)
        .replace("#cont_text#",itm.cont_text)
        .replace("#cont_id#",itm.cont_id)
        .replace("#tax#",itm.tax)
        .replace("#taxed_price#",itm.taxed_price)
        .replace("#offset_price#",itm.offset_price)
        .replace("#discount_price#",itm.discount_price)
        +'</td></tr>'
      );

      elm.appendTo(parent)
        .find('.jpcurrency').attachNum3();
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
          rowid:$(this).find('[data-rowid]').attr('data-rowid'),
          clmdetail_id:$(this).find('[data-id]').attr('data-id'),
          cont_id:$(this).find('[cid]').attr('cid'),
          cont_text:$(this).find('[cid]').text(),
          text:$(this).find('.col_text').val(),
          unit_price:$(this).find('.col_uprice').val(),
          qty:$(this).find('.col_qty').val(),
          price:$(this).find('.col_price').val(),
          tax:$(this).find('[name="tax"]').val(),
          taxed_price:$(this).find('[name="taxed_price"]').val(),
          offset_price:$(this).find('[name="offset_price"]').val(),
          discount_price:$(this).find('[name="discount_price"]').val(),
          deleted:$(this).find('[data-rowid]').hasClass('hidden')
        }
      )
  });
  details=arr;
  $('[name="details"]').val(JSON.stringify(arr));
}

var recvData="";

function validate(){
  var elm = null;
  var crText = v8n()
      .not.null()
      .minLength(1)
      .maxLength(64);

  try{
    $("#detaillist .col_text").each(function(){
      elm = $(this);
      crText.check(elm.val());
      $(elm).removeClass('bg-error');
    });
    saveData();
  }catch(ex){
    $(elm)
      .addClass('bg-error')
      .focus();
  }
}

function saveData(){

  saveDetails();
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

  //console.log($('input[name="company_id"]').val());
  $.ajax({
      url: 'claimdetail',
      type: 'POST',
      data: {_token: CSRF_TOKEN,
        claim_id:parseInt($("#claim_id").val()),
        company_id:parseInt($("#company_id").val()),
        user_id:{{Auth::user()->id}},
        price:parseInt($("#price").val().replace( /,/g, '')),
        claim_date:$("#claim_date").val(),
        claim_make_date:$("#claim_make_date").val(),
        claim_sent_date:$("#claim_sent_date").val(),
        pay_date:$("#pay_date").val(),
        pay_price:parseInt($("#pay_price").val().replace( /,/g, '')),
        total_price:parseInt($("#total_price").val().replace( /,/g, '')),
        tax_rate:parseInt($("#tax_rate").val()),
        tax:parseInt($("#tax").val().replace( /,/g, '')),
        taxed_price:parseInt($("#taxed_price").val().replace( /,/g, '')),
        offset_price:parseInt($("#offset_price").val().replace( /,/g, '')),
        discount_price:parseInt($("#discount_price").val().replace( /,/g, '')),
        details:details
      },
      dataType: 'JSON'
  }).done(function(data) {
      data.data.forEach(function(itm){
        $('[data-rowid="'+itm.rowid+'"]').attr('data-id',itm.clmdetail_id);
      });
      toastr.options = {
        "positionClass": "toast-bottom-right",
        "timeOut": "1500",
      };
      toastr.info('保存しました。');
    })
};


$(document).ready(function(){
  initDetails();
  initContMenu();

  $('.jpcurrency').each(function(){
    $(this).val(
      tcms_num3($(this).val())
    );
  });
});

</script>

<input type="hidden" id="claim_id" name="claim_id" value="{{$con->claim_id}}"/>
<input type="hidden" id="user_id" name="user_id" value="{{$con->user_id}}"/>
<input type="hidden" id="company_id" name="company_id" value="{{$con->company_id}}"/>
<input type="hidden" id="claim_make_date" name="claim_make_date" value="{{is_null($con->claim_make_date) ? date('y-m-d') : $con->claim_make_date->format('y.m/d')}}"/>
<input type="hidden" id="claim_sent_date" name="claim_sent_date" value="{{is_null($con->claim_sent_date) ? "" : $con->claim_sent_date->format('y.m/d')}}"/>
<div class="container">
  <div class="row">
    <div class="px-0 col-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        請求日
      </div>
      <input type="button" class="form-control text-left datepicker" id="claim_date" name="claim_date" value="{{is_null($con->claim_date) ? date('y.m/d') : $con->claim_date->format('y.m/d')}}" maxlength="128">
    </div>
    <div class="px-0 col-6">
      <div class="input-group-prepend input-group-text input-group-sm">
        請求先
      </div>
      <input type="button" class="form-control text-left" id="cont_name" name="cont_name" value="{{$con->nickname}}" maxlength="128">
    </div>
    <div class="px-0 col-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        請求額
      </div>
      <input type="text" class="form-control jpcurrency" id="price" name="price" value="{{$con->price/10000}}" maxlength="15" autocomplete="off">
    </div>
    <div class="px-0 col-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        受領額
      </div>
      <input type="text" readonly class="form-control jpcurrency" id="pay_price" name="pay_price" value="{{$con->pay_price/10000}}" maxlength="15"  autocomplete="off">
    </div>
  </div>
  <div class="row">
    <div class="px-0 col-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        合計金額
      </div>
      <input type="text" class="form-control text-right jpcurrency" id="total_price" name="total_price" value="{{$con->price_total/10000}}" maxlength="15"  autocomplete="off">
    </div>
    <div class="px-0 col-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        消費税率(%)
      </div>
      <input type="text" class="form-control text-left" id="tax_rate" name="tax_rate" value="{{$con->tax_rate}}" maxlength="3"  autocomplete="off">
    </div>
    <div class="px-0 col-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        消費税
      </div>
      <input type="text" class="form-control text-right jpcurrency" id="tax" name="tax" value="{{$con->tax/10000}}" maxlength="15" autocomplete="off">
    </div>
    <div class="px-0 col-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        税込金額
      </div>
      <input type="text" class="form-control text-right jpcurrency" id="taxed_price" name="taxed_price" value="{{$con->taxed_price/10000}}" maxlength="15" autocomplete="off">
    </div>
    <div class="px-0 col-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        相殺
      </div>
      <input type="text" class="form-control text-right jpcurrency" id="offset_price" name="offset_price" value="{{$con->offset_price/10000}}" maxlength="15" autocomplete="off">
    </div>
    <div class="px-0 col-2">
      <div class="input-group-prepend input-group-text input-group-sm">
        値引
      </div>
      <input type="text" class="form-control text-right jpcurrency" id="discount_price" name="discount_price" value="{{$con->discount_price/10000}}" maxlength="15" autocomplete="off">
    </div>
  </div>
</div>

<div class="container">
  <div class="row mt-2">
    <div class="col-10">
明細
    </div>
    <div class="col-2 text-right clickable" onclick="newItem()">
      <span class="iconify" data-icon="bx:bx-add-to-queue" data-inline="false" ></span>
      <span>新規</span>
    </div>
  </div>
  <div class="row">
    <table class="list-table table py-0 my-0">
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
    <table class="list-table table table-striped" id="detaillist">
      <tbody>
      </tbody>
    </table>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-8">
    </div>
    <div class="col-4 input-group-text">
      <input class="form-control" type="button" name="" onclick="validate()" value="　保存　"/>
      <input class="form-control" type="button" name="" onclick="" value="　戻る　"/>
    </div>
  </div>
</div>


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
function initContMenu(){
  conts.forEach(function(itm){
    $('#contlist tbody').append(
      '<tr><td><div data-cid="'+itm.cont_id+'">'+itm.cont_name+'</div></td></tr>"'
    );
    $('#contlist [data-cid]').click(onClickContItem);
  });
};


function onContSelectionEnd(){
  caller.text(selected_cont_name);
  caller.attr('cid',selected_cont_id);
}

function delete_claim(itm){
  $('[data-rowid="'+itm+'"]').addClass('hidden');
}

</script>
<table class="table table-hover table-striped" id="contlist">
  <tbody>
  </tbody>
</table>
@endcomponent



<div id="rowbase" style="visibility:hidden;width:0px;height:0px">
  <div class="container" data-rowid="#row#" data-id="#clmdid#">
    <div class="row">
      <input type="text" class="form-control col-6 col_text" value="#text#"/ placeholder="※明細として記載する内容を入力">
      <div class="col-5 small">
       <button class="form-control text-left" onclick="showContSelector(this)"  cid="#cont_id#">#cont_text#</button>
      </div>
      <div class="col-1">
        <span class="iconify clickable" data-icon="bx:bx-arrow-from-bottom" data-inline="false"></span>
        <span class="iconify clickable" data-icon="bx:bx-arrow-from-top" data-inline="false"></span>
        <span class="iconify clickable" data-icon="fa-solid:trash-alt" data-inline="false" onclick="delete_claim('#row#')"></span>
      </div>
    </div>
    <div class="row">
      <div class="col-7">
          <div class="row">
            <input type="text" class="form-control col-3 col_uprice text-right jpcurrency" name="unit_price" value="#unit_price#"/>
            <input type="text" class="form-control col-2 col_qty" value="#qty#"/>
            <input type="text" class="form-control col-4 col_price text-right jpcurrency" name="price" value="#price#"/>
            <input type="text" class="form-control col-3 col_price text-right jpcurrency" name="tax" value="#tax#" placeholder="消費税" autocomplete="false"/>
          </div>
      </div>
      <div class="col-5">
        <div class="row">
          <input type="text" class="form-control col-5 col_price text-right jpcurrency" name="taxed_price" value="#taxed_price#" placeholder="税込金額" autocomplete="false"/>
          <input type="text" class="form-control col-4 col_price text-right jpcurrency" name="offset_price" value="#offset_price#" placeholder="相殺" autocomplete="false"/>
          <input type="text" class="form-control col-3 col_price text-right jpcurrency" name="discount_price" value="#discount_price#" placeholder="値引" autocomplete="false"/>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
