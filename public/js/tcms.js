function tcms_num3(v){
  return v
  .replace( /,/g, '')
  .replace( /(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
}

$(document).ready( function(){
  $('.jpcurrency').on('input',function(){
    $(this).val(      tcms_num3($(this).val())
    );
  });
});
