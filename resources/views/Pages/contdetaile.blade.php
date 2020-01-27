@extends('layouts.app')


@section('content')
<script type="application/javascript">
/* {{ $DATEFORMAT=config('app.dateformat')}} */
</script>
<input type="hidden" class="form-control" name="cont_id" value="{{$con->cont_id}}">
<div class="container shadow">
<div class="row mt-3 p-2">
    <div class="col-9">
        <div class="row">
          <div class="col-10 p-0">
            <div class="input-group-prepend input-group-text input-group-sm">
              工事名
            </div>
            <input type="text" class="form-control" name="cont_name" value="{{$con->name}}" maxlength="128">
          </div>
          <div class="col-2 p-0">
            <div class="input-group-prepend input-group-text input-group-sm">
              状況
            </div>
            <script type="application/javascript">
            </script>
            <div class="dropdown" name="cont_state_menu">
              <input type="button" class="form-control" name="cont_state" value="未着手" data-toggle="dropdown">
            	<ul class="dropdown-menu" role="menu">
            	</ul>
            </div>
            </div>
        </div>
        <div class="row">
          <div class="col-2 p-0">
              <div class="input-group-prepend input-group-text input-group-sm">
                契約日
              </div>
              <input type="button" class="form-control datepicker" name="cont_name" value="{{$con->name}}" maxlength="128">
          </div>
          <div class="col-4 p-0">
              <div class="input-group-prepend input-group-text">
                工期
              </div>
              <div class="input-group">
                  <input type="button" class="form-control datepicker" name="condate_from" value="{{$con->date_from->format($DATEFORMAT)}}">
                  <input type="button" class="form-control datepicker" name="condate_to" value="{{$con->date_to->format($DATEFORMAT)}}">
              </div>
          </div>
          <div class="col-2  p-0">
              <div class="input-group-prepend input-group-text input-group-sm">
                着手日
              </div>
              <input type="button" class="form-control datepicker" name="cont_name" value="{{$con->name}}" maxlength="128">
          </div>
          <div class="col-2  p-0">
              <div class="input-group-prepend input-group-text input-group-sm">
                完工日
              </div>
              <input type="button" class="form-control datepicker" name="cont_name" value="" maxlength="128">
          </div>
          <div class="col-2  p-0">
              <div class="input-group-prepend input-group-text input-group-sm">
                進捗(%)
              </div>
              <input type="button" class="form-control" name="cont_name" value="{{$con->name}}" maxlength="128">
          </div>
        </div>
        <div class="row">
          <div class="col-3  p-0">
            <div class="input-group-prepend input-group-text">
              受注額(税抜)
            </div>
            <input type="text" class="form-control jpcurrency" name="price" value="{{ number_format($con->price/10000)}}" style="text-align: right; " maxlength="16">
          </div>
          <div class="col-3  p-0">
            <div class="input-group-prepend input-group-text">
              受注額(税込)
            </div>
            <input type="text" class="form-control jpcurrency" name="price_taxed" value="{{ number_format($con->price/10000)}}" style="text-align: right; " maxlength="16">
          </div>
          <div class="col-3  p-0">
            <div class="input-group-prepend input-group-text">
              実行予算
            </div>
            <input type="text" class="form-control text-right jpcurrency" name="exec_budget" value="{{ number_format($con->exec_budget/10000)}}" maxlength="64">
          </div>
          <div class="col-3  p-0">
            <div class="input-group-prepend input-group-text">
              予算残
            </div>
            <input type="text" class="form-control jpcurrency" name="budget_remain" value="{{ number_format($con->budget_remain/10000)}}" style="text-align: right;">
          </div>
        </div>
        <div class="row">
          <div class="col-6  p-0">
            <div class="input-group-prepend input-group-text">
              発注元
            </div>
            <input type="hidden" class="form-control" name="cust_company_id" value="{{$con->cust_company_id}}" maxlength="64">
            <input type="text" class="form-control" name="cust_company" value="{{$con->cust_company}}" maxlength="64">
          </div>
          <div class="col-6  p-0">
            <div class="input-group-prepend input-group-text">
              施　主
            </div>
            <input type="text" class="form-control" name="prime_customer" value="{{$con->customer}}" maxlength="64">
          </div>
        </div>
        <div class="row mt-2 ">
          <div class="col-3  p-0">
            <div class="input-group-prepend input-group-text">
              請求額(累計)
            </div>
            <input type="text" class="form-control text-right jpcurrency" name="total_claim" value="{{number_format($con->claim_remain/10000)}}" >
          </div>
          <div class="col-3  p-0">
            <div class="input-group-prepend input-group-text">
              請求残
            </div>
            <input type="text" class="form-control text-right jpcurrency" name="claim_remain" value="{{number_format($con->claim_remain/10000)}}" >
          </div>
          <div class="col-3  p-0">
            <div class="input-group-prepend input-group-text">
              入金額(累計)
            </div>
            <input type=" jpcurrency" class="form-control text-right" name="total_deposit" value="{{number_format($con->claim_remain/10000)}}" >
          </div>
          <div class="col-3  p-0">
            <div class="input-group-prepend input-group-text">
              入金残
            </div>
            <input type="button" class="form-control text-right" name="deposit_remain" value="{{number_format($con->claim_remain/10000)}}" >
          </div>
        </div>
    </div>
    <div class="col-3 p-0  p-0">
@component('components.memo')
@endcomponent
    </div>
</div>
</div>

{{-- /*工事一覧*/ --}}
<div class="container shadow mt-2 pt-3">
  <div class="row">
    <div class="col-10 ">
      工種/現場一覧
    </div>
    <div class="col-2 text-right">
      <span class="clickable" onclick="showconst()"><i class="fas fa-plus-square"></i>追加</span>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 ">
      <table class="table table-condensed table-bordered table-striped table-responsive font08 font-weight-bold" id="constlist">
        <thead>
          <th class="card-header" style="width:10rem">工種</th>
          <th class="card-header" style="width:80rem">工事名</th>
          <th class="card-header" style="width:20rem">工期</th>
          <th class="card-header" style="width:5rem">状況</th>
          <th class="card-header" style="width:5rem">進捗</th>
          <th class="card-header" style="width:8rem">資材</th>
          <th class="card-header" style="width:8rem">出面</th>
          <th class="card-header">
                <i class="fas fa-bars font08 clickable " ></i>
            </div>
          </th>
        </thead>
        <tbody class="row-small">
            <tr data-id="#const_id#" data-rowid="#rowid#">
              <td class="align-middle">#const_type#</td>
              <td>#const_name#</td>
              <td>#const_term#</td>
              <td>#state#</td>
              <td class="text-right">#progress#</td>
              <td class="text-right">#resource#</td>
              <td class="text-right"> #person#</td>
              <td><i class="fas fa-trash-alt clickable"></i></td>
            </tr>
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


<script type="application/javascript" id="initialdata">
/*
{{var_dump($consts)}}
*/
var fmt = "{{$DATEFORMAT}}";
var consts = {
@foreach($consts as $item)
  "{{ $key = md5( date('YMdhis').$item->title.number_format($item->const_id) )  }}":{
        row_id: "{{ $key  }}",
        const_id:"{{$item->const_id}}",
        const_name:"{{$item->const_name}}",
        const_type:"{{$item->const_type_name}}",
        const_person_id:"{{$item->person_id}}",
        const_person_name:"{{$item->person_name}}",
        const_progress:"{{ $item->progress}}",
        const_date_from: "{{ $item->date_from == null  ? '' : $item->date_from->format($DATEFORMAT) }}",
        const_date_to:   "{{ $item->date_to == null    ? '' : $item->date_to->format($DATEFORMAT) }}",
        const_date_start:"{{ $item->date_start == null ? '' : $item->date_start->format($DATEFORMAT) }}",
        const_date_end:  "{{ $item->date_end == null   ? '' : $item->date_end->format($DATEFORMAT) }}",
        exec_budget:"{{ number_format($item->exec_budget/10000) }}",
        resource_cost:"{{ number_format($item->resource_cost/10000) }}",
        person_cost:"{{ number_format($item->person_cost/10000) }}",
        deleted:false
  },
@endforeach
};

var memos={!! is_null($con->memo) ? "[]":$con->memo !!};

</script>
<script type="application/javascript">

var actions = [
  {
      name: '工種/現場を追加',
      onClick: function() {
                window.location.href='constdetaile?cont=0'
                }
    },
    {
      name: '削除取り消し',
      onClick: function() {
                  toastr.info("'Another action' clicked!");
                }
    }
];

var tdata = 1;

{{--/*  画面初期化 */--}}
var constlist_tmpl;

$(document).ready(function(){
   var target = $('#constlist tbody');
   constlist_tmpl = target.html();
   target.children().remove();

    for(key in consts){
        itm = consts[key];
        target.append(constlist_tmpl
          .replace('#rowid#',itm.row_id )
          .replace('#const_id#',itm.const_id )
          .replace('#const_type#',itm.const_type )
          .replace('#const_name#',itm.const_name )
          .replace('#const_term#',itm.const_date_from +" <br>  - "+itm.const_date_to  )
          .replace('#state#',"" )
          .replace('#progress#',itm.const_progress )
          .replace('#resource#',itm.resource_cost )
          .replace('#person#',itm.person_cost )
        )
    };
    target.find('tr').on('click',function(){
        console.log();
        key = $(this).attr('data-rowid')
        constdata = consts[key];
        showconst(consts[key]);
    })

    CONTSTATE.forEach(function(itm){
      $('<li>' + itm.text+ '</li>')
            .attr({"role":"presentation","data-id":itm.id})
            .addClass("dropdown-item")
            .on('click',function(){
              $('input[name="cont_state"]')
                  .val($(this).text())
                  .attr('data-id',$(this).attr('data-id') );
            })
          .appendTo( $('[name="cont_state_menu"] ul') );
    });

    initMemo(memos);
});


var ret_data;

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
        state:$("input[name='cont_state']").val(),
        exec_budget:$("input[name='exec_budget']").val(),
        price_taxed:$("input[name='price_taxed']").val(),
        claim_remain:$("input[name='claim_remain']").val(),
        deposit_remain:$("input[name='deposit_remain']").val(),
        documents:$("input[name='documents']").val(),
        memo:JSON.stringify(getMemo()),
        sales_person:$("input[name='sales_person']").val(),
        update_by:$("input[name='cont_id']").val(),
        consts : JSON.stringify(consts)
      },
      dataType: 'JSON',
      success: function (data) {
        $("input[name='cont_id']").val(data.cont_id);
        ret_data = data;
        for(key in data.consts){
          console.log(key +":" + data.consts[key] );
          console.log('[data_rowid="'+key+'"]');

          consts[key]=data.consts[key];
          $('[data-rowid="'+key+'"]').attr("data-id" , data.consts[key]);
        }
//        data.consts.forEach(function(itm){
//          console.log(itm);
//
//        });
        toastr.options = {
          "positionClass": "toast-bottom-right",
          "timeOut": "1500",
        };
        toastr.info('保存しました。');
      }
  }).done(function (data,status,xhr) {
  });

}



var constdata;

function showconst(param){
    constdata = param;
    if(param == null){
        constdata = {
              row_id:"",
              const_id:0,
              const_type:"",
              const_name:"",
              const_person_id:"",
              const_person_name:"",
              const_progress:20,
              const_date_from:"",
              const_date_to:"",
              const_date_start:"",
              const_date_end:"",
              exec_budget:"",
              resource_cost:"",
              person_cost:"",
              state:"",
              deleted: false
          }
      }
      $('#constdetail').modal({'show':true , backdrop:"static"});
}

function onConstEditEnd(){
      if( constdata.row_id == "" ){
        {{--/* 追加分であればキーを発行し追加*/--}}
        var found = false;
        var retry=1;
        {{--/* 重複しないキーを生成*/--}}
        while(!found && retry<10){
          var newkey = CybozuLabs.MD5.calc( constdata.const_name +":"+moment().format() +":" +constdata.const_type  + retry.toString() );
          found = false;
          for(key in consts){
            if( key == newkey){
              found=true;
              break;
            }
          }
          retry ++ ;
        }
        constdata.row_id=newkey;
        consts[newkey] = constdata;
        var newelm
        $('#constlist tbody').append(
            newelm = $(constlist_tmpl
                .replace('#rowid#',constdata.row_id )
                .replace('#const_id#',constdata.const_id )
                .replace('#const_type#',constdata.const_type )
                .replace('#const_name#',constdata.const_name )
                .replace('#const_term#',constdata.const_date_from +" <br>  - "+constdata.const_date_to  )
                .replace('#state#',"" )
                .replace('#progress#',constdata.const_progress )
                .replace('#resource#',constdata.resource_cost )
                .replace('#person#',constdata.person_cost )
            ).on('click',function(){
                console.log();
                key = $(this).attr('data-rowid')
                constdata = consts[key];
                showconst(consts[key]);
            })
        );
        return;
      }


      tds = $('[data-rowid="'+ constdata.row_id +'"]').children();
      $(tds.get(0)).html(constdata.const_type );
      $(tds.get(1)).html(constdata.const_name);
      $(tds.get(2)).html(constdata.const_date_from + "<br>  - " + constdata.const_date_to );
      $(tds.get(3)).html(constdata.const_state);
      $(tds.get(4)).html(constdata.const_progress);
      $(tds.get(5)).html(constdata.resource_cost);
      $(tds.get(6)).html(constdata.person_cost);
}

</script>
@component('components.constdetaile')
@slot('title')
$('[name="cont_name"]').val()
@endslot

@slot('data')
constdata
@endslot
@slot('on_click')
onConstEditEnd()
@endslot
@endcomponent


@endsection
