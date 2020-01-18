@component('components.modal')
@slot('title')
日報データコピー
@endslot
@slot('compo_id')
dailycopydlg
@endslot
@slot('on_click')
onDailyCopyEnd()
@endslot
<ul class="nav nav-pills" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="item1-tab" data-toggle="tab" href="#item1" role="tab" aria-controls="item1" aria-selected="true">過去の日報から</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="item2-tab" data-toggle="tab" href="#item2" role="tab" aria-controls="item2" aria-selected="false">取引先から</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="item3-tab" data-toggle="tab" href="#item3" role="tab" aria-controls="item3" aria-selected="false">自分が入力したものから</a>
  </li>
</ul>

{{--/* 「過去の日報から」タブペイン  */--}}
<div class="tab-content">
  <div class="tab-pane fade show active" id="item1" role="tabpanel" aria-labelledby="item1-tab">
    <div class="d-flex">
      <div class="input-group-text">
        工事名
      </div>
      <div class="flex-grow-1">
        <input class="form-control" type="text" name="cont_name" value="" data-id="0">
      </div>
    </div>
    <div class="d-flex">
      <div class="input-group-text">
        現場名
      </div>
      <div class="flex-grow-1">
        <input class="form-control" type="text" name="const_name" value="" data-id="0">
      </div>
    </div>
    <div class="container p-0">

      <div class="d-flex">
        <div class="p-0" style="overflow-y:scroll;overflow-x:hidden;width:7rem;">
          <ul class="metismenu small datelsit">
            <li ><a href="#">20.01/10</a></li>
            <li ><a href="#">20.01/09</a></li>
            <li ><a href="#">20.01/08</a></li>
            <li ><a href="#">20.01/07</a></li>
            <li ><a href="#">20.01/06</a></li>
            <li ><a href="#">19.12/28</a></li>
            <li ><a href="#">19.12/27</a></li>
            <li ><a href="#">19.12/26</a></li>
            <li ><a href="#">19.12/25</a></li>
            <li ><a href="#">19.12/24</a></li>
            <li ><a href="#">19.12/22</a></li>
            <li ><a href="#">19.12/21</a></li>
            <li ><a href="#">19.12/20</a></li>
          </ul>
        </div>
        <div class="flex-grow-1" style="overflow-y:scroll;overflow-x:hidden;width:7rem;">
          <div class="d-flex">
            <button role="button" class="btn btn-sm btn-outline-primary rounded-pill select-all">全て選択</button>
            <button role="button" class="btn btn-sm btn-outline-primary rounded-pill select-reset">選択解除</button>
          </div>
          <ul class="metismenu dailylist">
            <li><a href="#">あｓｄなそぢｎ</a></li>
            <li><a href="#">あｓｄなそぢｎ</a></li>
            <li><a href="#">あｓｄなそぢｎ</a></li>
            <li><a href="#">あｓｄなそぢｎ</a></li>
            <li><a href="#">あｓｄなそぢｎ</a></li>
            <li><a href="#">あｓｄなそぢｎ</a></li>
            <li><a href="#">あｓｄなそぢｎ</a></li>
            <li><a href="#">あｓｄなそぢｎ</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="item2" role="tabpanel" aria-labelledby="item2-tab">
  </div>
  <div class="tab-pane fade" id="item3" role="tabpanel" aria-labelledby="item3-tab">
  </div>
</div>

<script type="text/javascript">
function DailyCopyEnd(){
}

function calcDailyCopyHeight(){
  h = $(window).innerHeight()
      - $('#dailycopydlg .modal-footer').outerHeight()
      - $('#dailycopydlg .metismenu').offset().top
      - parseInt($('#dailycopydlg .modal-body').css('padding-bottom'))
      - 45;

  $('#dailycopydlg .metismenu').parent().outerHeight(h);
}

var dcdlg_dailylist=[];
$(window).on('DOMContentLoaded' ,function(){
  inittab1();

})

var selecteddata;
function onDailyCopyEnd(){
  selecteddata=[];
  $('#dailycopydlg #item1 .dailylist .fa-check-square').each(function(){
    var row = $(this).parent();
    console.log('key='  + row.attr('data-parent') + "v=" + row.attr('data-id'));
    selecteddata.push(dcdlg_dailylist[row.attr('data-parent')][row.attr('data-id')]);
  })
  {{$onCommit}}(selecteddata);
}

function inittab1(){
    $('#dailycopydlg').on('shown.bs.modal',function(){
      cont_id= $('#dropdown_cont').attr('data-id');
      const_id = $('#dropdown_const').attr('data-id');

      $('#dailycopydlg').find('[name="cont_name"]')
        .attr('data-id', cont_id )
        .val($('#dropdown_cont').text());
      $('#dailycopydlg').find('[name="const_name"]')
          .attr('data-id', const_id )
          .val($('#dropdown_const').text());

      $('#dailycopydlg .metismenu li').remove();
      $.ajax({
          url: 'listdaily',
          type: 'POST',
          data: {_token: CSRF_TOKEN,
            const_id:const_id
          },
          dataType: 'JSON'
      }).done(function(data){
        var day = "";
        var parentElm = $("#dailycopydlg .metismenu.datelsit");
        data.data.forEach(function(item){
          daily_date =  moment(item.daily_date).format(DATEFORMAT);
          if(day != daily_date){
            day = daily_date;
            dcdlg_dailylist[day] = [];
            $('<li><a href="#">'+ day + '</a></li>' )
            .appendTo(parentElm)
            .on('click',function(){
              var parentElm = $("#dailycopydlg .metismenu.dailylist");
              $(parentElm).children().remove();
              key = $(this).text();
              dcdlg_dailylist[key].forEach(function(item){
                $('<li><a data-id="'+item.daily_id +'" data-parent="'+key+'"><i class="far fa-square pr-1"></i>'+ item.item_name + '</a></li>' )
                .on('click',function(){
                  $(this).find('i')
                    .toggleClass('fa-square')
                    .toggleClass('fa-check-square');
                  return false;
                })
                .appendTo(parentElm)
              });
            })
          }
          dcdlg_dailylist[day][item.daily_id] = item;
        });

      });
      {{--/* 全選択ボタンの処理 */--}}
      $('#dailycopydlg #item1 .select-all').on('click',function(){
        $('#dailycopydlg #item1 .dailylist .fa-square')
          .addClass('fa-check-square')
          .removeClass('fa-square')
      });
      {{--/* 選択解除ボタンの処理 */--}}
      $('#dailycopydlg #item1 .select-reset').on('click',function(){
        $('#dailycopydlg #item1 .dailylist .fa-check-square')
          .addClass('fa-square')
          .removeClass('fa-check-square')
      });

      calcDailyCopyHeight();
    });
    $(window).on('resize', function(){
      calcDailyCopyHeight();
    })
    calcDailyCopyHeight();
};
</script>

@endcomponent
