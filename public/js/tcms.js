function tcms_num3(v){
  return v.toString()
  .replace( /[^0-9]/g, '')
  .replace( /(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
}

function attachNum3(selector){
  var elm = $(selector)
  elm.on('input',function(){
    $(this).val(      tcms_num3($(this).val())
    );
  });
  return elm;
}

$(document).ready( function(){
  attachNum3('.jpcurrency');
});

function CCSKEY(){
  var keytime = moment();
  return CybozuLabs.MD5.calc( keytime.format('YYYYMMDD HH:mm:ss dddd'));
}
