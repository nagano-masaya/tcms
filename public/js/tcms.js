function tcms_num3(v){
  return v
  .replace( /[^0-9]/g, '')
  .replace( /(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
}

function attachNum3(selector){
  $(selector).on('input',function(){
    $(this).val(      tcms_num3($(this).val())
    );
  });
}

$(document).ready( function(){
  attachNum3('.jpcurrency');
});

function CCSKEY(){
  var keytime = moment();
  return CybozuLabs.MD5.calc( keytime.format('YYYYMMDD HH:mm:ss dddd'));
}
