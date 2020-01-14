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
<div class="tab-content">
  <div class="tab-pane fade show active" id="item1" role="tabpanel" aria-labelledby="item1-tab">
    <div class="d-flex">
      <div class="input-group-text">
        工事名
      </div>
      <div class="flex-grow-1">
        <input class="form-control" type="text" name="" value="" data-id="0">
      </div>
    </div>
    <div class="d-flex">
      <div class="input-group-text">
        現場名
      </div>
      <div class="flex-grow-1">
        <input class="form-control" type="text" name="" value="" data-id="0">
      </div>
    </div>
    <div class="container p-0">

      <div class="d-flex">
        <div class="p-0" style="overflow-y:scroll;overflow-x:hidden;width:7rem;">
          <ul class="metismenu small">
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
          <ul class="metismenu">
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

$(window).on('DOMContentLoaded' ,function(){
    $('#dailycopydlg').on('shown.bs.modal',function(){
      calcDailyCopyHeight();
    });
    $(window).on('resize', function(){
      calcDailyCopyHeight();
    })
    calcDailyCopyHeight();
});
</script>

@endcomponent
