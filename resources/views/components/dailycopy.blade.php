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
<ul class="nav nav-tabs" role="tablist">
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
    <div class="input-group">
      <div class="small input-group-prepend">
        <div class="input-group-text">
          現場名
        </div>
      </div>
      <div class="">
        <input class="form-control" type="text" name="" value="" data-id="0">
      </div>
    </div>
    <div class="container">

      <div class="row">
        <div class="col-2">
          <ul class="metismenu">
            <li>20.01/05</li>
            <li>20.01/04</li>
            <li>20.01/03</li>
            <li>20.01/01</li>
          </ul>
        </div>
        <div class="col-10">

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
</script>

@endcomponent
