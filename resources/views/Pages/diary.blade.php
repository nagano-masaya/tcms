@extends('layouts.app')

@section('content')

<input type="hidden" name="claim_id" value=""/>
<input type="hidden" name="user_id" value=""/>
<input type="hidden" name="company_id" value=""/>
<input type="hidden" name="details" value=""/>
<input type="hidden" name="claim_make_date" value=""/>
<input type="hidden" name="claim_sent_date" value=""/>
<div class="container">
  <div class="row">
    <div class="col">
      <h4>日報入力</h4>
    </div>
  </div>
  <div class="row">
    <div class="px-0 col-2">
      <div class=" input-group-text input-group-sm">
        日付
      </div>
    </div>
    <div class="px-0 col-1">
      <div class="input-group-text input-group-sm">
        工事名
      </div>
    </div>
    <div class="px-0 col">
      <div class="dropdown">
        <button type="button" id="dropdown_cont"
            class="btn  dropdown-toggle w-100 text-left"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false">
        </button>
        <div class="dropdown-menu w-100" aria-labelledby="dropdown_cont">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="px-0 col-2 input-group">
      <div class="input-group-prepend p-1 lead text-glay">
        <i class="fas fa-caret-left pt-1 clickable h3" name="daily_date_prev"></i>
      </div>
      <input type="button" class="form-control text-left datepicker" name="daily_date" value="" maxlength="128">
      <div class="input-group-append p-1 lead text-glay">
        <i class="fas fa-caret-right pt-1 clickable h3" name="daily_date_next"></i>
      </div>
    </div>
    <div class="px-0 col-1">
      <div class="input-group-prepend input-group-text input-group-sm">
        現場名
      </div>
    </div>
    <div class="px-0 col-9">
      <div class="dropdown">
        <button type="button" id="dropdown_const"
            class="btn dropdown-toggle w-100 text-left"
            data-id=""
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false">
        </button>
        <div class="dropdown-menu w-100" aria-labelledby="dropdown_const">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row mt-2">
    <div class="col-8">
明細
    </div>
    <div class="col-2 text-right text-primary clickable" onclick="showDataCopy()">
      <i class="far fa-copy"></i><span>明細コピー</span>
    </div>
    <div class="col-2 text-right text-primary clickable" onclick="newItem()">
      <i class="far fa-plus-square"></i>
      <span>新規</span>
    </div>
  </div>
  <div class="row">
    <table class="list-table table py-0 my-0">
      <thead>
        <tr>
          <th class="small text-gray">
            <div class="row text-center">
              <div class="col-2 p-0 border">科目</div>
              <div class="col-3 p-0 border">発注先</div>
              <div class="col-7 p-0 border">名称</div>
            </div>
            <div class="row text-center">
              <div class="col-2 border ">数量</div>
              <div class="col-10">
                <div class="row">
                  <div class="col-3 border">単価</div>
                  <div class="col-3 border">小計</div>
                  <div class="col-3 border">消費税</div>
                  <div class="col-3 border">計</div>
                </div>
              </div>
            </div>
          </th>
        </tr>
      </thead>
    </table>
    <table class="list-table table table-bordered" id="detaillist">
      <tbody>
        <tr data-id="#daily_id#" data-uid="#user_id#" data-rowid="#rowid#">
          <td>
              <div class="row">
                <div class="col-2 p-0 dropdown">
                  <input type="button" class="form-control dropdown-toggle p-1" name="subject" data-toggle="dropdown" data-id="#subject_id#" value="#subject#" placeholder="科目">
                  <ul class="dropdown-menu">
                    #subject_menu_item#
                  </ul>
                </div>
                <div class="col-3 p-0 input-group">
                  <input type="text" class="form-control p-1 border-right-0" name="supplier" data-supid="#supplier_id#" value="#supplier_text#" placeholder="発注先" autocomplete="off">
                  <div class="input-group-append border border-left-0">
                    <div class="far fa-list-alt mx-1 px-1 pt-3 align-text-bottom text-gray small"></div>
                  </div>
                </div>
                <div class="col-7 p-0"><input type="text" class="form-control p-1" name="item_name" value="#item_name#" data-supid="#supplier_id#" data-iid="#item_id#" data-pid="#person_id#" placeholder="名称" autocomplete="off"></div>
              </div>
              <div class="row rowbreak">
                <div class="col-2 p-0 input-group">
                  <input type="text" class="form-control p-1 jpcurrency" name="qty" value="#qty#" placeholder="数量">
                  <div class="input-group-apped" style="line-height:2.1rem">
<!--                    <span class="px-1 small" style="line-height:0.6rem;vertical-align:bottom">ダース</span> -->
                    <input type="button" class="small border-0" name="unit" data-id="#unit_id#" value="#unit_text#" onclick="showUnitMenu(this)">
                  </div>
                </div>
                <div class="col-10 p-0">
                  <div class="row">
                    <div class="col-3 p-0"><input type="text" class="form-control jpcurrency p-1" name="unit_price" value="#unit_price#" placeholder="単価" autocomplete="off"></div>
                    <div class="col-3 p-0"><input type="text" class="form-control jpcurrency p-1" name="sub_total" value="#sub_total#" placeholder="小計"></div>
                    <div class="col-3 p-0"><input type="text" class="form-control jpcurrency p-1" name="tax" value="#tax#" placeholder="消費税"></div>
                    <div class="col-3 p-0 input-group">
                      <input type="text" class="form-control jpcurrency p-1" name="total_price" value="#total_price#" placeholder="計">
                      <div class="input-group-append text-right pr-1" style="width:1.3rem">
                        <span class="fas fa-trash-alt px-2 pt-3 align-text-bottom text-gray clickable"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </td>
        </tr>
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

<div  style="position:relative;" id="complist">
  <ul class="dropdown-menu" style="position:absolute;" id="compmenu">
  </ul>
  <div class="backdrop-hidden" style="  position:absolute;z-index:10000">
    <ul class="metismenu shadow" tabindex="-1" style="position:absolute;" id="unitmenu"/>
  </div>
</div>

@component('components.dailycopy')
@slot('onCommit')
onCommitCopy
@endslot
@endcomponent

<script type="application/javascript" id="unitdata">

function onCommitCopy(arr){
  arr.forEach(function(item){
    item.daily_id = 0;
    item.daily_date = moment($('[name="daily_date"]').val(),DATEFORMAT);
    item.const_id = $('#dropdown_const').prop('data-id');
    newrow(item);
  });
}


  var unitparents=[];

  var units = [
@foreach($units as $item)
  {id:{{$item->unit_id}}, text:"{{$item->unit_title}}", type:"{{$item->unittype_title}}"},
@endforeach
  ];

</script>
<script type="application/javascript">

var conts = [
@php
$cur = "";
foreach($consts as $const){
  if($cur != $const->cont_name){
    $cur = $const->cont_name;
    print "{id:".$const->cont_id.',text:"'.$const->cont_name.'"},'."\n";
  }
}
@endphp
];

var consts = [
  @foreach($consts as $item)
    {id:{{$item->const_id}},cont_id:{{$item->cont_id}},text:"{{$item->const_type_name}}:{{$item->const_name}}"},
  @endforeach
];

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

{{--/*  */--}}
var ev;
function initUnitMenu(){
  var root = $('#unitmenu');
  $(root).children().remove();
  var unittype="";
  var utype ="";
  var parent = null;
  var submenu = null;
  units.forEach(function(itm){
    if(unittype != itm.type){
      if( parent !== null ){
        unitparents.push(parent);
        root.append(parent);
      }
      submenu = $('<ul></ul>')
      parent = $('<li class=" "></li>')
      .append($('<a class="has-arrow" href="#" >'+ itm.type +'</a>'))
      .append(submenu)
      ;
      unittype = itm.type;
    }
    submenu.append(
      $('<li></li>')
        .append(
          $('<a>'+itm.text+'</a>')
            .attr('href',"#")
            .attr('data-id',itm.id)
            .on('click',onClickUnitMenu)
        )
    );
  });
  if( parent !== null ){
    unitparents.push(parent);
    root.append(parent);
  }
  $('#unitmenu').parent().on('click',function(e){
    ev=e;
    if($(e.target).hasClass("backdrop-show")){
      $(this)
        .toggleClass('backdrop-hidden')
        .toggleClass('backdrop-show');
        return false;
    }
  })
  .offset({top:0,left:0})
  .width(0)
  .height(0);

  $(root).metisMenu();
}

function showUnitMenu(elm)
  {
    $('#unitmenu')
    .attr('data-target',$(elm).parentsUntil('tbody').last().attr('data-rowid'))
    .parent()
      .toggleClass('backdrop-hidden')
      .toggleClass('backdrop-show')
      .offset({top:0,left:0})
      .height($(document).height())
      .width($(document).width())

    $('#unitmenu')
    .attr('data-elm',$(elm) )
    .offset({
      top:$(elm).offset().top + $(elm).outerHeight() - $('#unitmenu').outerHeight(),
      left:$(elm).offset().left + $(elm).outerWidth(),
    });

  }

  function onClickUnitMenu(){
    $('#unitmenu').parent()
      .toggleClass('backdrop-hidden')
      .toggleClass('backdrop-show');
    $('#unitmenu .mm-show').removeClass('mm-show');

    $('[data-rowid="'+ $('#unitmenu').attr('data-target') +'"] input[name="unit"]')
      .val( $(this).text() )
      .attr( "data-id",$(this).attr('data-id') );
  }

  function onClickSubject(elm){
    console.log("click " +$(elm).text() + " id" + $(elm).attr('data-id'));
    $(elm).parent().parent().find('input')
        .attr('data-id',$(elm).attr('data-id'))
        .val($(elm).text());
  }

  function initSubjectMenu(){
    var parent = $('ul[name="subjectmenu"]');
    SUBJECTS.forEach(function(itm){
      parent.append(
        $('<li>'+ itm.text +'</li>')
          .attr('data-id',itm.id)
          .on('click',function(){
            $('[name=subject]').val($(this).text())
              .attr($(this).attr('data-id'))
          })
      )
    });
    parent.dropdown();
  }

  var sups={
@foreach($supplier as  $item)
    "{{$item->nickname}}":{{$item->company_id}} ,
@endforeach
  };
  function initSupplierMenu(){

  }

function initContMenu(){
    var menu = $('[aria-labelledby="dropdown_cont"]');
    menu.children().remove();
    conts.forEach(function(item){
      $('<div class="clickable"><a data-id="'+item.id+'">'+item.text +'</a></div>')
          .appendTo(menu)
          .on('click',function(){
            var elm = $(this).find('a');
            $('#dropdown_cont')
              .attr('data-id',$(elm).attr('data-id'))
              .html($(elm).text());
              loadConstData($(elm).attr('data-id'));
          });
    });
    menu.dropdown();
}


function loadConstData(cont_id){
    $.ajax({
        url: 'listconstructs',
        type: 'POST',
        data: {_token: CSRF_TOKEN,
          cont_id:cont_id,
        },
        dataType: 'JSON'
    }).done(function(data){
      recvdata = data;
      consts = [];
      var parent = $('#detaillist tbody');
      data.data.forEach(function(data){
        consts.push({id:data.const_id, text:data.const_name});
      });
      initConstMenu();
    })
}

function initConstMenu(){
    var menu = $('[aria-labelledby="dropdown_const"]');
    menu.children().remove();
    $('#dropdown_const').html("");

    consts.forEach(function(item){
      var cont_id = parseInt($('#dropdown_cont').attr('data-id'));
      $('<div class="clickable"><a data-id="'+item.id+'">'+item.text +'</a></div>')
          .appendTo(menu)
          .on('click',function(){
            var elm = $(this).find('a');
            $('#dropdown_const')
              .attr('data-id',$(elm).attr('data-id'))
              .html($(elm).text());
              initDialy();
          });
    });
    menu.dropdown();
    {{--/* 最初のアイテムを選択状態にする*/--}}
    elm = menu.find('a').first();
    $('#dropdown_const')
      .attr('data-id',$(elm).attr('data-id'))
      .html($(elm).text());
    console.log("initConstMenu " + $(elm).attr('data-id') + ":" +$(elm).text() + " - " + elm.html())
    initDialy();
}

var recvdata;
function initDialy(){
  var strval = $('#dropdown_const').attr('data-id');
  if(strval.match(/^[0-9]+$/g) === null){
    return ;
  }
  const_id = parseInt(strval);
  var strdate = $('[name="daily_date"]').val();
  if(!moment(strval,DATEFORMAT).isValid())
    return ;

  parent = $('#detaillist tbody');
  parent.children().remove();

  $.ajax({
      url: 'listdaily',
      type: 'POST',
      data: {_token: CSRF_TOKEN,
        const_id:const_id,
        daily_date:strdate
      },
      dataType: 'JSON'
  }).done(function(data){
    recvdata = data;
    var parent = $('#detaillist tbody');
    data.data.forEach(function(data){
      $(newrow(data)).appendTo(parent);
    })
  })
}

var companies=[
@foreach($companies as $item)
     {!! json_encode($item) !!} ,
@endforeach
];

function onclickCompMenu(elm)
{
  if( compMenuCaller===null)
    return;

  $(compMenuCaller).attr('data-id',$(elm).attr('data-id') )
    .val($(elm).text());
}

{{--/*====================================*/--}}
{{--/*   取引先メニューの初期化　                                              */--}}
{{--/*====================================*/--}}
var compMenuCaller=null;
function initCompMenu(){
  $.ajax({
      url: 'listcompanies',
      type: 'POST',
      data: {_token: CSRF_TOKEN,
          company_id:id,
          critaria:critaria
      },
      dataType: 'JSON'
  }).done(function(data){
      parent = $('#compmenu');
      parent.children().remove();
      data.data.forEach(function(item){
          $('<li class="dropdown-item px-1 " data-id="'+ item.company_id +'">'+item.nickname+'</li>')
            .appendTo(parent)
            .on('click',onclickCompMenu)
      });
  });


}
var itemaclist = [];

{{--/* clear hash-map  ※autocompleteが参照しているリストオブジェクト＝itemaclistが保持するリストオブジェクトの関係を維持するため、itemaclistの中身は変更させない */--}}
function clearItemACList(){
  keys = Object.keys(itemaclist);
  while(keys.length>0){
    delete itemaclist[keys.pop()];
  }
}

{{--/* 品名のAutoComplete更新  */--}}
function updateItemAC(id,critaria){
    $(elm).parentsUntil('data-rowid')

    $.ajax({
        url: 'listitemsac',
        type: 'POST',
        data: {_token: CSRF_TOKEN,
          company_id:id,
          critaria:critaria
        },
        dataType: 'JSON'
    }).done(function(data){
        clearItemACList();
        for(key in data.data)
          itemaclist[key] = escape('{"item_id":'+data.data[key].item_id+',"person_id":' + data.data[key].person_id + "}");
    });
}


{{--/*==========================*/--}}
{{--/*                          */--}}
{{--/* Initialize               */--}}
{{--/*                          */--}}
{{--/*==========================*/--}}
var rowtempl;   {{--/* 明細行のテンプレート保存用 */--}}
$(window).on('DOMContentLoaded',function(){
  rowtempl = $('#detaillist tbody').html();
             $('#detaillist tbody').html('');
  subjectitems = "";
  SUBJECTS.forEach(function(item){
    subjectitems += '<li class="dropdown-item small clickable px-1" data-id="'+item.id+'" onclick="onClickSubject(this)">'+item.text+'</li>';
  });
  rowtempl = rowtempl.replace('#subject_menu_item#',subjectitems);

  {{--/* 日付を変更された時の処理 */--}}
  $('[name="daily_date_next"]')
  $('[name="daily_date"]').val(moment().format(DATEFORMAT));
  $('[name="daily_date"]').on('change',function(e){
    initDialy();
  });
  $('[name="daily_date_prev"]').on('click',function(){
    $('[name="daily_date"]').val(
      moment($('[name="daily_date"]').val(),DATEFORMAT)
                  .subtract(1,'days').format(DATEFORMAT)　);
    initDialy();

  });
  $('[name="daily_date_next"]').on('click',function(){
    $('[name="daily_date"]').val(
      moment($('[name="daily_date"]').val(),DATEFORMAT)
                  .add(1,'days').format(DATEFORMAT))
    initDialy();
  });

  initUnitMenu();
  initSubjectMenu();
  initSupplierMenu();
  initContMenu();
  initCompMenu();


  $('.dropdown-item').addClass('clickable');
  $('.jpcurrency').attachNum3();


});

{{--/*   金額再計算  */--}}
function recalcrow(){
  cells = $(this).parentsUntil('td','.rowbreak').find('.jpcurrency');
  qty = parseInt($(cells[0]).val().replace(/[^0-9]+/g,""));
  unitprice = parseInt($(cells[1]).val().replace(/[^0-9]+/g,""));
  v1 = "";
  v2 = "";
  try{
  console.log('q:'+qty + " u:" + unitprice);
  if(isNaN(qty) || isNaN(unitprice))
    throw new Exception();
  v1 = tcms_num3(qty*unitprice);

  tax=parseInt($(cells[3]).val().replace(/[^0-9]+/g,""));
  console.log('t:'+tax);
  if(isNaN(tax))
    throw new Exeption();

  v2 = tcms_num3(qty*unitprice+tax);

  }catch(e){
  }
  $(cells[2]).val(v1);
  $(cells[4]).val(v2);

}

{{-- /*  行追加  */ --}}
function newrow(data){
  templ = rowtempl;
  if(data == null){
    templ = rowtempl.replace("#daily_id#","0")
            .replace("#rowid#",UUID())
            .replace(/#supplier_id#/g,0)
            .replace(/#unit_id#/g,1)
            .replace(/#unit_text#/g,"個")
            .replace(/#.+#/g,"");
  }else{
    console.log("newrow:" + JSON.stringify(data));
    templ = rowtempl.replace("#daily_id#",data.daily_id)
            .replace("#rowid#",UUID())
            .replace("#subject_id#",data.subject_id)
            .replace("#subject#",data.subject)
            .replace('#item_id#',data.item_id)
            .replace('#person_id#',data.person_id)
            .replace("#item_name#",data.item_name)
            .replace("#qty#",data.qty)
            .replace("#unit_id#",data.unit_id)
            .replace("#unit_text#",data.unit_text)
            .replace(/#supplier_id#/g,data.supplier_id)
            .replace("#supplier_text#",data.supplier_text)
            .replace("#unit_price#",tcms_num3(data.unit_price))
            .replace("#sub_total#",tcms_num3(data.sub_total))
            .replace("#tax#",tcms_num3(data.tax))
            .replace("#total_price#",tcms_num3(data.total_price))
            .replace("#user_id#",data.user_id);
  }

  row = $(templ)
  row.find('.jpcurrency')
    .on('input',recalcrow)
    .attachNum3();

  row.find('[name="supplier"]')
      .on('input',function(){
        val = sups[$(this).val()];
        if(val == undefined){
          val="0";
        }
        $(this).attr('data-supid',val);
      })
      .autocomplete({
        treshold:1,
        source:sups,
        onSelectItem:function(data,elm){
          $(elm).attr('data-supid',data.value);
          updateItemAC(data.value,"");

          $(elm).parent().parent().find('input[name="item_name"]').focus();

        }
      });
  row.find('[name="item_name"]').autocomplete({
       treshold:1,
       source:itemaclist,
       onSelectItem:function(data,elm){
         var v = JSON.parse(unescape(data.value));
         $(elm)
            .attr('data-iid', v.item_id)
            .attr('data-pid', v.person_id);
       }
  }).on('focus',function(){

  }).on('input',function(){
    $(this).attr("data-pid","0");
    $(this).attr("data-iid","0");
  });

  $('#detaillist tbody').append(row);
  initSubjectMenu(  row.find('[name="subject"]')  );

}


function showDataCopy(){
  $('#dailycopydlg .modal-dialog')
      .removeClass('modal-sm')
      .addClass('modal-lg');

  $('#dailycopydlg').modal('show');
}

{{--/* 追加ボタン押下時の処理 */--}}
function newItem(){
  try{
    var cont_id = parseInt($('#dropdown_cont').attr('data-id'));
    if(!(cont_id>0)){
      throw "工事を選択してください";
    }

    var const_id = parseInt($('#dropdown_const').attr('data-id'));
    if(!(const_id>0)){
      throw "現場を選択してください";
    }
    var dt = moment($('[name="daily_date"]').val(),DATEFORMAT);
    if(!dt.isValid()){
      throw "日付を指定してください"
    }
    newrow();
  }catch(e){
    toastr.options = {
      "positionClass": "toast-top-left",
      "timeOut": "1500",
    };
    toastr.error(e);
  }
}

{{--/* 保存処理 */--}}
var postdata;
function validate(){
  crnum = v8n()
    .not.null()
    .pattern(/^-?[0-9]{1,3}(,[0-9]{3})*.?\d{0,2}$/);
  crtxt = v8n()
    .not.null();

    src = "[";
    delim = "";

    var const_id = parseInt($('#dropdown_const').attr('data-id'));
    var dt = $('[name="daily_date"]').val();
    $('#detaillist tr').each(function(){
      src += delim + "{"
        +'"rowid":"'+$(this).attr('data-rowid')+'",'
        +'"disp_order":'+this.rowIndex + ','
        +'"const_id":'+const_id + ','
        +'"daily_id":'+$(this).attr("data-id") + ','
        +'"daily_date":"' + dt + '"'
      $(this).find('[name]').each(function(){
        src +=  ',"' + $(this).attr("name") + '":"' + escape($(this).val()) + '"';
        if($(this).is('[data-id]')){
          src +=  ',"' + $(this).attr("name") + '_id":"' + $(this).attr('data-id') + '"';
        }
      });
      src += ',"supplier_id":' + $(this).find('input[name="supplier"]').attr('data-supid');
      src += ',"item_id":' + $(this).find('input[name="item_name"]').attr('data-iid');
      src += ',"person_id":' + $(this).find('input[name="item_name"]').attr('data-pid');

      src += "}";
      delim = ","
    })
    src += "]";
    console.log(src);
    postdata = JSON.parse(src);

    $.ajax({
        url: 'diary',
        type: 'POST',
        data: {_token: CSRF_TOKEN,
          data:postdata
        },
        dataType: 'JSON'
    }).done(function(data){
      for(item in data.daily){
        $('[data-rowid="'+ item +'"]').attr('data-id',data.daily[item].daily_id);
      }
      for(item in data.supplier){
        $('[data-rowid="'+ item +'"] [data-supid]').attr('data-supid',data.supplier[item].supplier_id);
      }
      for(item in data.item){
        $('[data-rowid="'+ item +'"] [name="item_name"]').attr('data-iid',data.item[item].item_id);
      }
      for(item in data.person){
        $('[data-rowid="'+ item +'"] [name="item_name"]').attr('data-pid',data.item[item].person_id);
      }
      toastr.options = {
        "positionClass": "toast-top-left",
        "timeOut": "1500",
      };
      toastr.info('保存しました');
    })
}
</script>



@endsection
