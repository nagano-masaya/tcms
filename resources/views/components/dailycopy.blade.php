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
    <div class="container">

      <div class="row">
        <div class="col-2 p-0 h-50" style="overflow:scroll;">
          <ul class="metismenu w-100">
            <li><a href="#">20.01/10</a></li>
            <li><a href="#">20.01/09</a></li>
            <li><a href="#">20.01/08</a></li>
            <li><a href="#">20.01/06</a></li>
            <li><a href="#">20.01/05</a></li>
            <li><a href="#">20.01/05</a></li>
            <li><a href="#">20.01/05</a></li>
            <li><a href="#">20.01/05</a></li>
            <li><a href="#">20.01/05</a></li>
            <li><a href="#">20.01/05</a></li>
            <li><a href="#">20.01/05</a></li>
            <li><a href="#">20.01/05</a></li>
            <li><a href="#">20.01/05</a></li>
            <li><a href="#">20.01/05</a></li>
            <li><a href="#">20.01/05</a></li>
            <li><a href="#">20.01/05</a></li>
            <li><a href="#">20.01/05</a></li>
            <li><a href="#">20.01/05</a></li>
            <li><a href="#">20.01/05</a></li>
            <li><a href="#">20.01/05</a></li>
          </ul>
        </div>
        <div class="col-10 p-0">

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

$(window).on('DOMContentLoaded' ,function(){
    $(window).on('resize', function(){
      elm = $('#dailycopydlg .modal-body');
      p = $('#dailycopydlg .metismenu').parent();
      $(p).height(  $(elm).height() - $(p).offset().top );
      console.log("w:" + $(elm).width() + " h:" + $(elm).height() );
    })
});
</script>

@endcomponent
