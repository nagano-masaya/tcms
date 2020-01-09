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
          <a class="dropdown-item" href="#">Menu #1</a>
          <a class="dropdown-item" href="#">Menu #2</a>
          <a class="dropdown-item" href="#">Menu #3</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="px-0 col-2 input-group">
      <div class="input-group-prepend p-1 lead">
        <i class="fas fa-caret-left pt-1 clickable"></i>
      </div>
      <input type="button" class="form-control text-left datepicker" name="daily_date" value="" maxlength="128">
      <div class="input-group-append p-1 lead">
        <i class="fas fa-caret-right pt-1 clickable"></i>
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
          <a class="dropdown-item" href="#">Menu #1</a>
          <a class="dropdown-item" href="#">Menu #2</a>
          <a class="dropdown-item" href="#">Menu #3</a>
        </div>
      </div>
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
      <thead  class="">
        <tr>
          <th>
            <div class="row text-center">
              <div class="col-3 p-0 border">発注先</div>
              <div class="col-8 p-0 border">名称</div>
              <div class="col-1 p-0 border">科目</div>
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
    <table class="list-table table table-striped" id="detaillist">
      <tbody>
        <tr data-id="#daily_id#" data-uid="#user_id#">
          <td>
              <div class="row">
                <div class="col-3 p-0"><input type="text" class="form-control p-1" name="supplier" data-id="#supplier_id#" value="#supplier_text#" placeholder="発注先"></div>
                <div class="col-7 p-0"><input type="text" class="form-control p-1" name="item_name" value="#item_name#" placeholder="名称"></div>
                <div class="col-2 p-0"><input type="text" class="form-control p-1" name="subject" data-id="#subject_id#" value="#subject#" placeholder="科目"></div>
              </div>
              <div class="row">
                <div class="col-2 p-0"><input type="text" class="form-control p-1" name="qty" value="#qty#" placeholder="数量"></div>
                <div class="col-10 p-0">
                  <div class="row">
                    <div class="col-3 p-0"><input type="text" class="form-control p-1" name="unit_price" value="#unit_price#" placeholder="単価"></div>
                    <div class="col-3 p-0"><input type="text" class="form-control p-1" name="sub_total" value="#sub_total#" placeholder="小計"></div>
                    <div class="col-3 p-0"><input type="text" class="form-control p-1" name="tax" value="#tax#" placeholder="消費税"></div>
                    <div class="col-3 p-0"><input type="text" class="form-control p-1" name="total_price" value="#total_price#" placeholder="計"></div>
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


<script type="application/javascript">

  var parents=[];

  var units = [
@foreach($units as $item)
  {id:{{$item->unit_id}}, text:"{{$item->unit_title}}", type:"{{$item->unittype_title}}"},
@endforeach
  ];

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

  function initUnitMenu(root){
    $(root).children().remove();
    var unittype="";
    var utype ="";
    var root = $('#unitmenu');
    var parent = null;
    var submenu = null;
    units.forEach(function(itm){
      if(unittype != itm.unittype_title){
        if( parent !== null ){
          parents.push(parent);
          root.append(parent);
        }
        submenu = $('<ul></ul>').addClass('dropdown-menu');
        parent = $('<li class="dropdown-submenu"></li>')
        .append($('<a class="dropdown-item dropdown-toggle" href="#">'+ itm.unittype_title +'</a>'))
        .append(submenu)
        ;
        unittype = itm.unittype_title;
      }
      submenu.append(
        $('<li></li>')
          .append(
            $('<a>'+itm.unit_title+'</a>')
              .addClass('dropdown-item')
              .attr('href',"#")
              .attr('data-id',itm.unit_id)
              .on('click',onClickUnitMenu)
          )
      );
    });
    if( parent !== null ){
      parents.push(parent);
      root.append(parent);
    }
  }

  function onClickUnitMenu(){
    $('input[name="unit"]')
    .val( $(this).text() )
    .attr( "data-id",$(this).attr('data-id') );
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
              initConstMenu();
          });
    });
    menu.dropdown();
  }

  function initConstMenu(){
    var menu = $('[aria-labelledby="dropdown_const"]');
    menu.children().remove();
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
    elm = menu.children().first();
    $('#dropdown_const')
      .attr('data-id',$(elm).attr('data-id'))
      .html($(elm).text());
    console.log("initConstMenu " + $(elm).attr('data-id') + "" +$(elm).text() + " - " + elm.html())
    initDialy();
  }

function initDialy(){
  var strval = $('#dropdown_const').attr('data-id');
  if(strval.match(/^[0-9]+$/g) === null){
    return ;
  }
  const_id = parseInt(strval);

  var strval = $('[name="daily_date"]').val();


  var dt = moment("20" + strval.replace(/[^0-9]*/g,""));
  console.log(const_id + ":" + dt);

}

</script>

<script type="text/javascript">
var rowtepl;

$(window).on('load',function(){
  rowtempl = $('#detaillist tbody').html();
             $('#detaillist tbody').html('');

  $('[name="daily_date"]').on('change',function(e){
    initDialy();
  });

  initUnitMenu();
  initSubjectMenu();
  initSupplierMenu();
  initContMenu();

  $('.dropdown-item').addClass('clickable');
});

function newrow(data){
  templ = rowtempl;
  if(data == null){
    templ = rowtempl.replace("#daily_id#","0")
            .replace(/#.+#/g,"");
  }else{
    templ = rowtempl.replace("#daily_id#",data.daily_id)
            .replace("#subject_id#",data.subject_id)
            .replace("#subject#",data.subject)
            .replace("#item_name#",data.item_name)
            .replace("#qty#",data.qty)
            .replace("#unit_id#",data.unit_id)
            .replace("#unit_text#",data.unit_text)
            .replace("#supplier_id#",data.supplier_id)
            .replace("#supplier_text#",data.supplier_text)
            .replace("#unit_price#",data.unit_price)
            .replace("#sub_total#",data.sub_total)
            .replace("#tax#",data.tax)
            .replace("#total_price#",data.total_price)
            .replace("#user_id#",data.user_id);
  }

  row = $(templ)

  $('#detaillist tbody').append(row);
}

function newItem(){
  newrow();
}
</script>




@endsection
