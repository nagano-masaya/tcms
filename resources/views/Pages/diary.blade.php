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
    <div class="card-header py-0 dropdown col-9">
      <input type="text" class="form-control bg-transparent border-0 dropdown-toggle" data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false" value="" readonly>
      <div class="dropdown-menu" aria-labelledby="dropdown1" id="constmenu">
      </div>
    </div>

<script type="application/javascript">
  var parents=[];

  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  function initConstMenu(){
    $('#constmenu').children().remove();

    $.ajax({
        url: 'listconstructs',
        type: 'POST',
        data: {_token: CSRF_TOKEN
        },
        dataType: 'JSON'
    }).always(function(data) {
        var cont_id="";
        var root = $('#constmenu');
        var parent = null;
        data.data.forEach(function(itm){
          console.log(itm.name + " : " + itm.const_name);
          if(cont_id != itm.cont_id){
            if( parent !== null ){
              parents.push(parent);
              root.append(parent);
            }
            parent = $('<div>'+ itm.name +'</div>')
              .attr("data-toggle","collapse")
              .attr("role","button");
            ;
            cont_id = itm.cont_id;
          }
          parent.append(
            $('<div>'+ itm.const_name +'<div>')
              .attr('data-id', itm.const_id)
              .attr('data-cont', itm.name)
              .attr('data-parent',"#constmenu")
              .attr('role',"button")
              .addClass("collapse")
          )
        });
        if( parent !== null ){
          parents.push(parent);
          root.append(parent)
        }
        root.children().collapse();
    });

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
                <div class="col-2 border ">
                  <input class="form-control" type="button" name="subject" value="">
                </div>
                <div class="col-7 border ">
                  <input class="form-control" type="text" name="item_name" value="">
                </div>
                <div class="col-2 border  text-right" name="">
                  <input class="form-control" type="text" name="qty" value="">
                </div>
                <div class="col-1 border text-left">
                  <input class="form-control" type="button" name="unit" value="">
                </div>
              </div>
              <div class="row">
                <div class="col-4 border">
                  <input class="form-control jpcurrency" type="button" name="order_to" data-id="" value="">
                </div>
                <div class="col-2 border text-right">
                  <input class="form-control jpcurrency" type="text" name="unit_price" value="">
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
  initConstMenu();
});

</script>

@endsection
