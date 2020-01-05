<div class="card h-100 w-100 input-group " id="memo">
  <div class="row input-group-prepend p-0 m-0 title">
    <div class="col-6 small align-top">
      memo
    </div>
    <div class="col-6 text-right small btn-add align-bottom">
      <span class="clickable"><i class="fas fa-plus-square"></i>追加</span>
    </div>
  </div>
  <div class="row content vscroll-only">
    <div class="col  pr-0">
      <table class="table table-scroll">
        <tbody id="memodata">
          <tr>
            <td>
              <div class="memoframe">
                <div class="row">
                  <div class="col-6 memotime font30p overflow-hidden">
                    #time#
                  </div>
                  <div class="col-6 memouser  font30p text-right" data-id="#id#">
                    #name#
                  </div>
                </div>
                <div class="row">
                  <div class="col-12  small">
                    <textarea class="memotext" name="name" spellcheck="false" >#memotext#</textarea>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script type="application/javascript" defer>
{{--/*  このスクリプトはDOMパース後すぐに実行させる ので、deferred load されるJQueryは使用しない（derer load) */--}}

var elm = document.getElementById("memodata");
var memotemplate;
if( elm.innerHTML != "" ){
    memotemplate = elm.innerHTML;
   elm.innerHTML="";
}
initMemo([]);

$(window).on('load resize',function(){

  $('#memo .content')
    .css('height','')
    .css( 'height', $('#memo').height() - $('#memo .title').outerHeight() );
});

function initMemo(data){
  var target = $('#memodata');
  $('#memo .btn-add').on('click',function(){
    target.append(memotemplate
      .replace('#id#', "{{Auth::user()->id}}")
      .replace('#time#',moment().format('YY\'MM/DD hh:mm' ))
      .replace('#name#',"{{Auth::user()->name}}")
      .replace('#memotext#',"")
    );
  });
  data.forEach(function(item){
        target.append(memotemplate
          .replace('#id#', item.id)
          .replace('#time#',item.date)
          .replace('#name#',item.name)
          .replace('#memotext#',item.memo)
        );
    });

    {{-- /*   recalc content height  */ --}}
    return true;
}
function getMemo(){
  var data = [];
  $('#memodata tr').each(function(itm){
    data.push({
      date:moment(itm.find('memotime').text() ).format(),
      id:parseInt(itm.find('[data-id]').attr('data-id') ),
      name:itm.find('memotime').text(),
      memo:itm.find('memotext').text()
    })
  });
  return data;
}

</script>

{{--
/*

data = [
  {
      date:"2020-10-10 10:01",
      id:1
      name:"user-1",
      memo:"memo-1,"
  }
]
*/
  --}}
