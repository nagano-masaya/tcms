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
      <div class="row">
        <div class="col-1 px-0">
          <span class="iconify" data-width="20" data-icon="bx:bx-caret-left" data-inline="false"></span>
        </div>
        <div class="col-10 text-center px-0 large">
          2019 12/20
        </div>
        <div class="col-1 px-0">
          <span class="iconify" data-width="20" data-icon="bx:bx-caret-right" data-inline="false"></span>
        </div>
      </div>
    </div>
    <div class="col-9 border">
      現場１－２
    </div>
    <div class="col-1 clickable text-rigjt">
      <span class="iconify" data-width="20" data-icon="icomoon-free:copy" data-inline="false"></span>
    </div>
  </div>
  <div class="row card-header small">
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
      <table class="table">
        <tbody>
          <tr>
            <td>
              <div class="row">
                <div class="col-2 border table-primary">労務費</div>
                <div class="col-7 border table-primary">社員A</div>
                <div class="col-2 border table-primary text-right">8.0</div>
                <div class="col-1 border text-left">h</div>
              </div>
              <div class="row">
                <div class="col-4 border">宇佐建設</div>
                <div class="col-2 border text-right">1,500</div>
                <div class="col-2 border text-right">12,000</div>
                <div class="col-2 border text-right">1,200</div>
                <div class="col-2 border text-right">13,200</div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="row">
                <div class="col-2 border table-primary">労務費</div>
                <div class="col-7 border table-primary">社員A</div>
                <div class="col-2 border table-primary text-right">8.0</div>
                <div class="col-1 border text-left">h</div>
              </div>
              <div class="row">
                <div class="col-4 border">宇佐建設</div>
                <div class="col-2 border text-right">1,500</div>
                <div class="col-2 border text-right">12,000</div>
                <div class="col-2 border text-right">1,200</div>
                <div class="col-2 border text-right">13,200</div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="row">
                <div class="col-2 border table-primary">材料費</div>
                <div class="col-7 border table-primary">アルミ平板</div>
                <div class="col-2 border table-primary text-right">10</div>
                <div class="col-1 border text-left">枚</div>
              </div>
              <div class="row">
                <div class="col-4 border">MISUMI</div>
                <div class="col-2 border text-right">1,500</div>
                <div class="col-2 border text-right">12,000</div>
                <div class="col-2 border text-right">1,200</div>
                <div class="col-2 border text-right">13,200</div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>



</div>

@endsection
