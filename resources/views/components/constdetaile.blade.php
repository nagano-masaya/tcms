<script type="application/javascript">
</script>
<div class="modal fade in" id="constdetail" tabindex="-1" role="dialog" style="display:none" style="width:80rem">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">

    <!-- 3.モーダルのコンテンツ -->
    <div class="modal-content">
      <!-- 4.モーダルのヘッダ -->
      <div class="modal-header ">
        <h4 class="modal-title" id="modal-label">現場編集</h4>
        <span aria-hidden="true">&times;</span>
      </div>
      <!-- 5.モーダルのボディ -->
      <div class="modal-body row m-3">


<input type="hidden" class="form-control" name="cont_id" value="">
<input type="hidden" class="form-control" name="const_id" value="">
<div class="col">
  <div class="row">
    <div class="form-group col-12">
      <div class="input-group-prepend input-group-text input-group-sm">
        <span name="cont_name"></span>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-1 p-0">
      <div class="input-group-prepend input-group-text input-group-sm">
        {{--工種	工事名	工期	状況	進捗	資材	出面--}}
        工種
      </div>
      <div class="dropdown" name="const_type_box">
      	<input class="small form-control btn-default dropdown-toggle text-left" type="button" data-toggle="dropdown" name="const_type"/>
      	<ul class="dropdown-menu scrollable-menu" role="menu">
      		<li role="presentation"><a href="#">リンクのリスト１</a></li>
      	</ul>
      </div>
    </div>
    <div class="col-8 p-0">
      <div class="input-group-prepend input-group-text input-group-sm">
        現場名
      </div>
      <input type="text" class="form-control small" name="const_name" value="" maxlength="128">
    </div>
    <div class="col-2 p-0">
      <div class="input-group-prepend input-group-text input-group-sm">
        担当
      </div>
      <div class="input-group">
          <input type="text" class="form-control small" name="const_person" value="" maxlength="128">
      </div>
    </div>
    <div class="col-1 p-0">
      <div class="input-group-prepend input-group-text input-group-sm">
        進捗(%)
      </div>
      <div class="input-group">
          <input type="text" class="form-control small" name="const_progress" value="" maxlength="128">
      </div>
    </div>
  </div>
  <div class="row">
      <div class="col-5">
          <div class="row">
              <div class="col-6">{{--/*  工期*/--}}
                 <div class="row">
                   <div class="col p-0">
                     <div class="input-group-prepend input-group-text">
                     工期
                     </div>
                  </div>
                 </div>
                 <div class="row">
                     <div class="col-6 p-0">
                        <input type="button" class="form-control datepicker small" name="const_date_from">
                     </div>
                     <div class="col-6 p-0">
                        <input type="button" class="form-control datepicker small" name="const_date_to" value="">
                     </div>
                 </div>
              </div>
              <div class="col-3 p-0">
                  <div class="input-group-prepend input-group-text input-group-sm">
                  着手日
                  </div>
                  <input type="button" class="form-control datepicker small" name="const_date_start" value="">
              </div>
              <div class="col-3 p-0">
                  <div class="input-group-prepend input-group-text input-group-sm">
                  完了日
                  </div>
                  <input type="button" class="form-control datepicker small" name="const_date_end" value="">
              </div>
            </div>
      </div>
      <div class="col-6">
          <div class="row">
              <div class="col-4 p-0">
                  <div class="input-group-prepend input-group-text input-group-sm">
                  実行予算
                  </div>
                  <input type="text" class="form-control small jpcurrency" name="exec_budget" value="">
              </div>
              <div class="col-4 p-0">
                  <div class="input-group-prepend input-group-text input-group-sm">
                  予算消化
                  </div>
                  <input type="text" class="form-control small jpcurrency" name="budget_used" value="" readonly>
              </div>
              <div class="col-4 p-0">
                  <div class="input-group-prepend input-group-text input-group-sm">
                  予算残
                  </div>
                  <input type="text" class="form-control small jpcurrency" name="budget_remain" value=""  readonly>
               </div>
         </div>
      </div>
      <div class="col-1 p-0">
        <div class="input-group-prepend input-group-text input-group-sm">
          消化率(%)
        </div>
        <div class="input-group">
            <input type="text" class="form-control small text-right" name="budget_used_rate" value="" maxlength="128" readonly>
        </div>
      </div>
  </div>
  <div class="row">
    <div class="form-group col-6 p-0">
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
    <div class="form-group col-3 p-0">
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
    <div class="form-group col-3 p-0">
      <div class="input-group-prepend input-group-text input-group-sm form-row">
        <span class="col text-left">Memo</span><span data-toggle="modal" data-target="#constmemoeditor" class="iconify medium clickable" data-width="16px" data-icon="bx:bx-add-to-queue" data-inline="false" onclick="targetEml=null;$('#memoarea').val('');"></span>
      </div>
      <table class="table small col-md-12" id="memotbl">
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
</div>
<!-- 6.モーダルのフッタ -->
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
  <button type="button" class="btn btn-primary btn_ok" data-dismiss="modal">OK</button>
</div>
</div>
</div>
</div>

<script type="application/javascript">
var _constdata;

var memos = [
    {"date":"2019-12-14 09:40","user":"利用者1","memo":"メモ１" },
    {'date':'2019-12-15 16:10','user':'利用者2','memo':'メモ2' }
  ];


  var resources = [
  ];

  var members = [
  ];

  var const_used_budget
  {{--/* 読み込み時の処理*/--}}
  function initConstDetail(){
    $.ajax({
        url: 'listconstructs',
        type: 'POST',
        data: {_token: CSRF_TOKEN,
          cont_id:cont_id,
        },
        dataType: 'JSON'
    }).done(function(data){
        var total_cost = 0;
        data.rescost.forEach(function(item){
          total_cost += item.price;
        });
        data.personcost.forEach(function(item){
          total_cost += item.price;
        });
        $('#constdetail [name="budget_used"]').val(tcms_num3(total_cost));
    });
  }

  function initConstCosts(){
      $('#resourcetbl tbody tr').remove();
      var base = $('#resourcetbl tbody');
      resources.forEach(function(itm){
        $(base).append('<tr><td>'
                  +itm.name+'</td><td>'
                  +itm.price+'</td></tr>');
      });

      $('#membertbl tbody tr').remove();
      var base = $('#membertbl tbody');
      members.forEach(function(itm){
        $(base).append('<tr><td>'+itm.name+'</td><td>'+itm.hour+'h </td><td>'+itm.unit_price+'</td><td>'+itm.price+'</td></tr>');
      });
  }

  function initMemo(){
    $('#memotbl tbody tr').remove();
    memos.forEach(function(itm){
        $('#memotbl tbody').append('<tr><td><div class="card" data-toggle="modal" data-target="#constmemoeditor"><div class="table-secondary">'+itm.date + " "+ itm.user +'</div><pre class="content m-0">'+itm.memo+'</pre></div></td></tr>')
    });
    $('#memotbl tbody [data-toggle] .content').click(onClickMemo);
    {{--/* 工種ドロップダウン初期化*/--}}
    {{--/*  		<li role="presentation"><a href="#">リンクのリスト１</a></li> */--}}
    var target = $('#constdetail [name="const_type_box"] ul');
    target.children().remove();
    CONSTTYPES.forEach(function(itm){
       target.append(
         $('<li></li>',{
            role:"presentation",
          })
          .append(
            $('<a>'+itm.title+'</a>',{href:"#"})
          )
      );
    });

    target.children().on('click',function(){
        $('#constdetail input[name="const_type"]').val($(this).text());
    });

    $('#constdetail [name="exec_budget"]').on("input",constdetail_calc);
}


$('#constdetail .btn_ok').on("click",function(){
      //--constdata.row_id = $('#constdetail [name=""]').val();
      //--constdata.const_id = $('#constdetail [name=""]').val();
      {{$data}}.const_name = $('#constdetail [name="const_name"]').val();
      {{$data}}.const_type = $('#constdetail [name="const_type"]').val();
      {{$data}}.const_person_id = $('#constdetail [name="const_person"]').attr("data-id");
      {{$data}}.const_person_name = $('#constdetail [name="const_person"]').val();
      {{$data}}.const_progress = $('#constdetail [name="const_progress"]').val();
      {{$data}}.const_date_from = $('#constdetail [name="const_date_from"]').val();
      {{$data}}.const_date_to = $('#constdetail [name="const_date_to"]').val();
      {{$data}}.const_date_start = $('#constdetail [name="const_date_start"]').val();
      {{$data}}.const_date_end = $('#constdetail [name="const_date_end"]').val();
      {{$data}}.exec_budget =   $('#constdetail [name="exec_budget"]').val();
      //--constdata.resource_const
      //--constdata.person_cost

      {{$on_click}};
});


function onClickMemo(){

}

{{--/* モーダル表示直前の処理*/--}}

$('#constdetail').on('show.bs.modal',function(){
    _constdata = {{$data}};
    $('#constdetail input[name="const_type"]').val( _constdata.const_type);
    $('#constdetail [name="const_name"]').val( _constdata.const_name);
    $('#constdetail [name="const_person"]')
              .val( _constdata.const_person_name)
              .attr('data-id', _constdata.const_person_id);
    $('#constdetail [name="const_progress"]').val( _constdata.const_progress);
    $('#constdetail [name="const_date_from"]').val( _constdata.const_date_from);
    $('#constdetail [name="const_date_to"]').val( _constdata.const_date_to);
    $('#constdetail [name="const_date_start"]').val( _constdata.const_date_start);
    $('#constdetail [name="const_date_end"]').val( _constdata.const_date_end);
    $('#constdetail [name="exec_budget"]').val( _constdata.exec_budget);

    $('#constdetail span[name="cont_name"]').text({{$title}});
});

var used = null;
var sum = null;
var const_used_budget;
var res = [];
function constdetail_calc(){
    var remain ;
    var rate;
    var budget;
    btext =  tcms_num3($('#constdetail [name="exec_budget"]').val());

      budget = parseInt(btext.replace( /\,+/g , '' ));

      remain="";
      rate = "";
      if( !isNaN(budget) && budget!=0 ){
        remain =tcms_num3( budget  - const_used_budget);
        rate =  (const_used_budget * 100 / budget).toFixed(2) ;
      }
    $('#constdetail [name="budget_remain"]').val( remain);
    $('#constdetail [name="budget_used_rate"]').val( rate );

}

</script>
