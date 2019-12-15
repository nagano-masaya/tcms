<div class="modal" id="{{$compo_id}}" tabindex="-1">
  <div class="modal-dialog modal-sm">

    <!-- 3.モーダルのコンテンツ -->
    <div class="modal-content">
      <!-- 4.モーダルのヘッダ -->
      <div class="modal-header ">
        <h4 class="modal-title" id="modal-label">{{ $title }}</h4>
        <span aria-hidden="true">&times;</span>
      </div>
      <!-- 5.モーダルのボディ -->
      <div class="modal-body">
        {{$slot}}
      </div>
      <!-- 6.モーダルのフッタ -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="{{$on_click}}">登録</button>
      </div>
    </div>
  </div>
</div>
{{--
  @component('components.modal')
  @slot('title')
  メモの編集
  @endslot
  @slot('compo_id')
  memoeditor
  @endslot
  @slot('on_click')
  onMenuEditEnd()
  @endslot
  <textarea id="memoarea" rows="8" ></textarea>
  @endcomponent

  タグに次の属性を追加
  data-toggle="modal" data-target="#memoeditor"

--}}
