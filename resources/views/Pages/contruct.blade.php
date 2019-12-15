@extends('layouts.app')



@section('content')
<div class="container shadow p-2">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card-body">
          <table class="table table-striped table-hover table-condensed">
            <thead>
              <tr>
                <th class="card-header" colspan="3">
                  工事一覧
                </th>
                <th class="card-header text-right clickable"　onclick="window.location.href='contdetaile?cont=0'">
                  <span class="iconify" data-icon="bx:bx-add-to-queue" data-inline="false"></span>
                  <span>新規</span>
                </th>
              </tr>
              <tr>
                <th class="info">工事名</th>
                <th class="info">工期</th>
                <th class="info">受注額</th>
                <th class="info"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($cons as $con)
                <tr>
                  <td target="{{$con->cont_id}}">{{$con->name}}</td>
                  <td target="{{$con->cont_id}}">{{$con->date_from}}<br>～{{$con->date_to}}</td>
                  <td target="{{$con->cont_id}}" class="text-right">
                    <span>{{ number_format($con->price/10000)}}</span>
                  </td>
                  <td class="text-right">
                    <span class="iconify clickable" data-icon="fa-solid:trash-alt" data-inline="false" onclick="delete_cont({{$con->cont_id}})"></span>
                  </td>
                </tr>
              @endforeach
              <script type="application/javascript">
                function delete_cont(cont_id){
                  window.location.href='contruct?cont='+cont_id;
                }
                $('[target]').click(function(){
                  window.location.href='contdetaile?cont='+$(this).attr("target");
                });

              </script>
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
@endsection
