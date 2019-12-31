<div class="modal" id="{{$compo_id}}" tabindex="-1">
  <div class="modal-dialog modal-sm modal-dialog-scrollable">

    <!-- 3.モーダルのコンテンツ -->
    <div class="modal-content">
      <!-- 4.モーダルのヘッダ -->
      <div class="modal-header ">
        <h4 class="modal-title" id="{{$compo_id}}_modal-label"></h4>
        <span aria-hidden="true">&times;</span>
      </div>
      <!-- 5.モーダルのボディ -->
      <div class="modal-body">
        <script type="application/javascript">
          $.fn.fnok = function(){};
          $.fn.showSelector =
          function(title,datalist,fnOk){
              $.fn.fnok=fnOk;
              //$('#{{$compo_id}}').fnok = function(){alert("55")};
              $('#{{$compo_id}} .modal-label').html(title);
              $('#{{$compo_id}} tbody').children().remove();
              datalist.forEach(function(itm){
                $('#{{$compo_id}} tbody').append(
                  '<tr><td class="p-0"><div class="border-0 list-group-item" data-cid="'+itm.id+'">'+itm.title+'</div></td></tr>"'
                );
              });
              $('#{{$compo_id}} [data-cid]').click(function(){
                if( $(this).hasClass('active') ){
                  $('#{{$compo_id}} [data-ok]').click();
                  return;
                }
                $('#{{$compo_id}} tbody .active').removeClass('active');
                $(this).addClass('active');

              });

              $('#{{$compo_id}} [data-ok]').click(function(){
                var sel = $('#{{$compo_id}} tbody .active');
                var id = $(sel).attr('data-cid');
                $('#{{$compo_id}}').fnok($(sel).attr('data-cid'), $(sel).text());
              });
              $('#{{$compo_id}}').modal('show');
          };


        </script>
        <table class="table table-hover table-condensed" id="contlist">
          <tbody>
          </tbody>
        </table>
      </div>
      <!-- 6.モーダルのフッタ -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" data-cancel >キャンセル</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" data-ok >OK</button>
      </div>
    </div>
  </div>
</div>
{{--
  @component('components.listSelector')
  @slot('compo_id')
  memoeditor
  @endslot
  @endcomponent

  タグに次の属性を追加
  data-toggle="modal" data-target="#memoeditor"

--}}
