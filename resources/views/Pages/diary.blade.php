@extends('layouts.app')

@section('content')
<div class="container ">
  <div class="row">
    <div class="col-10 bold">
      <h3>日報入力</h3>
    </div>
    <div class="col-2">
    </div>
  </div>
  <div class="row">
    <div class="col-2 border">
      <div class="row card-header">
        <div class="col-1 px-0">
          <span class="iconify" data-width="20" data-icon="bx:bx-caret-left" data-inline="false"></span>
        </div>
        <div class="col-10 text-center px-0 lead clickable">19.12/12</div>
        <div class="col-1 px-0">
          <span class="iconify" data-width="20" data-icon="bx:bx-caret-right" data-inline="false"></span>
        </div>
      </div>
    </div>
    <div class="card-header py-0 col-9">
      <input type="text" class="form-control bg-transparent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="" readonly>
      <div class="dropdown-menu" aria-labelledby="dropdown1" id="constmenu">
      </div>
    </div>

<script type="application/javascript">
  var parents=[];

  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  function initUnitMenu(){
    $('#unitmenu').children().remove();
    $.ajax({
        url: 'listunits',
        type: 'POST',
        data: {_token: CSRF_TOKEN
        },
        dataType: 'JSON'
    }).done(function(data) {
        var unittype="";
        var utype ="";
        var root = $('#unitmenu');
        var parent = null;
        var submenu = null;
        data.data.forEach(function(itm){
          console.log(itm.unit_title + " : " + itm.unittype_title);
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
          root.append(parent)
        }

        $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
          if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
          }
          var $subMenu = $(this).next('.dropdown-menu');
          $subMenu.toggleClass('show');


          $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
            $('.dropdown-submenu .show').removeClass('show');
          });


          return false;
        });

        $('#unitmenu')
          .dropdown('hide')
    });

  }

  function onClickUnitMenu(){
    console.log("click:" + $(this).text());
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
</script>
    <div class="col-1 clickable text-rigjt">
      <span class="iconify" data-width="20" data-icon="icomoon-free:copy" data-inline="false"></span>
    </div>
  </div>
  <div class="row card-header small mt-2">
    <div class="col-2">科目</div>
    <div class="col-7">名称</div>
    <div class="col-2">数量</div>
    <div class="col-1">単位</div>
  </div>
  <div class="row card-header">
    <div class="col-4">発注先</div>
    <div class="col-2">単価</div>
    <div class="col-2">金額</div>
    <div class="col-2">消費税</div>
    <div class="col-2">税込価格</div>
  </div>
  <div class="row">
    <div class="col-12 ">
      <table class="table" id="itemlist">
        <tbody>
          <tr>
            <td>
              <div class="row">
                <div class="col-2 border dropdown">
                  <input class="form-control dropdown-toggle" type="button" name="subject" value="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <ul class="dropdown-menu" name="subjectmenu">
                  </ul>
                </div>
                <div class="col-7 border ">
                  <input class="form-control" type="text" name="item_name" value="">
                </div>
                <div class="col-2 border  text-right" name="">
                  <input class="form-control" type="text" name="qty" value="">
                </div>
                <div class="col-1 border text-left dropdown dropleft">
                  <input class="form-control dropdown-toggle" type="button" name="unit" value="" data-toggle="dropdown">
                  <ul class="dropdown-menu" id="unitmenu">
                  </ul>
                </div>
              </div>
              <div class="row">
                <div class="col-4 border dropdown">
                  <input class="p-1 form-control dropdown-toggle dropdown-toggle-split" type="text" name="order_to" data-id="" value="" placeholder="発注先↓キーで一覧表示">
                </div>
                <div class="col-2 border text-right">
                  <input class="form-control jpcurrency" type="text" name="unit_price" value="" placeholder="単価">
                </div>
                <div class="col-2 border text-right">
                  <input class="form-control jpcurrency" type="text" name="sub_total" value="">
                </div>
                <div class="col-2 border text-right">
                  <input class="form-control jpcurrency" type="text" name="tax" value="">
                </div>
                <div class="col-2 border text-right">
                  <input class="form-control jpcurrency" type="text" name="total_price" value="" readonly>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script type="text/javascript">
var rowtepl;

$(window).on('load',function(){
  rowtempl = $('#itemlist tbody').html();
  initUnitMenu();
  initSubjectMenu();
  initSupplierMenu();

  $('.dropdown-item').addClass('clickable');
});

</script>




@endsection
