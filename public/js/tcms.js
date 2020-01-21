/*****/const CONSTTYPES = [
/*****/ {id:"101",code:"",title:"土木一式 ",desc:"土木一式工事 "},
/*****/ {id:"102",code:"",title:"建築一式",desc:"建築一式工事"},
/*****/ {id:"103",code:"",title:"大工",desc:"大工工事"},
/*****/ {id:"104",code:"",title:"左官",desc:"左官工事"},
/*****/ {id:"105",code:"",title:"とび",desc:"とび・土工・コンクリート工事"},
/*****/ {id:"106",code:"",title:"土工",desc:"とび・土工・コンクリート工事"},
/*****/ {id:"107",code:"",title:"コンクリート",desc:"とび・土工・コンクリート工事"},
/*****/ {id:"108",code:"",title:"石",desc:"石工事"},
/*****/ {id:"109",code:"",title:"屋根",desc:"屋根工事"},
/*****/ {id:"110",code:"",title:"電気",desc:"電気工事"},
/*****/ {id:"111",code:"",title:"管",desc:"管工事"},
/*****/ {id:"112",code:"",title:"ブロック",desc:"タイル・れんが・ブロック工事"},
/*****/ {id:"113",code:"",title:"鋼構造物",desc:"鋼構造物工事"},
/*****/ {id:"114",code:"",title:"舗装",desc:"舗装工事"},
/*****/ {id:"115",code:"",title:"しゅんせつ",desc:"しゅんせつ工事"},
/*****/ {id:"116",code:"",title:"板金",desc:"板金工事"},
/*****/ {id:"117",code:"",title:"ガラス",desc:"ガラス工事"},
/*****/ {id:"118",code:"",title:"塗装",desc:"塗装工事"},
/*****/ {id:"119",code:"",title:"防水",desc:"防水工事"},
/*****/ {id:"120",code:"",title:"内装仕上",desc:"内装仕上工事"},
/*****/ {id:"121",code:"",title:"機器設置",desc:"機械器具設置工事"},
/*****/ {id:"122",code:"",title:"熱絶縁",desc:"熱絶縁工事"},
/*****/ {id:"123",code:"",title:"電気通信",desc:"電気通信工事"},
/*****/ {id:"124",code:"",title:"造園",desc:"造園工事"},
/*****/ {id:"125",code:"",title:"さく井",desc:"さく井工事"},
/*****/ {id:"126",code:"",title:"建具",desc:"建具工事"},
/*****/ {id:"127",code:"",title:"水道施設",desc:"水道施設工事"},
/*****/ {id:"128",code:"",title:"消防施設",desc:"消防施設工事"},
/*****/ {id:"129",code:"",title:"清掃施設 ",desc:"清掃施設工事 "},
/*****/ ];

/*****/const SUBJECTS = [
/*****/ {id:100,text:"材料費"},
/*****/ {id:200,text:"労務費"},
/*****/ {id:300,text:"外注費"},
/*****/ {id:400,text:"機械（自社"},
/*****/ {id:401,text:"機械（リース"},
/*****/];

/*****/const CONTSTATE =[
/*****/{id:1,text:"未着手"},
/*****/{id:2,text:"準備中"},
/*****/{id:3,text:"進行中"},
/*****/{id:4,text:"完工"},
/*****/{id:5,text:"決済中"},
/*****/{id:1,text:"完了"},
/*****/];
/*****/
/*****/ const DATEFORMAT = "YY.MM/DD"
function tcms_num3(v) {
    if (v == null) {
        return "";
    }
    return v.toString()
        .replace(/[^0-9]/g, '')
        .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
}

function attachNum3(selector) {
    var elm = $(selector)
    elm.on('input', function() {
        $(this).val(tcms_num3($(this).val()));
    })
    .attr('ime-mode','disabled');
    return elm;
}

var lastAttachedObject;

function CCSKEY() {
    var keytime = moment();
    return CybozuLabs.MD5.calc(keytime.format('YYYYMMDD HH:mm:ss dddd'));
}


document.addEventListener('DOMContentLoaded', function() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    attachNum3('.jpcurrency');

    $(document).ajaxSend(function() {
         $("#overlay").fadeIn(300);　
     }).ajaxComplete(function(){
       setTimeout(function(){
 				$("#overlay").fadeOut(300);
 			  },500);
     });

    jQuery.fn.extend({
        attachNum3: function() {
            $(this).on('input', function() {
                $(this).val(tcms_num3($(this).val()))
            });
            lastAttachedObject = this;
            return $(this);
        }
    });

    //moment.locale("ja");
    console.log('DOMContentLoaded');
    attachNum3('.jpcurrency')

    $('.datepicker').pikaday({
        format:DATEFORMAT,
        toString(date, format) {
            // you should do formatting based on the passed format,
            // but we will just return 'D/M/YYYY' for simplicity
            return moment(date).format(format);
        },
        parse(dateString, format) {
            // dateString is the result of `toString` method
            const parts = dateString.split('/');
            const day = parseInt(parts[0], 10);
            const month = parseInt(parts[1], 10) - 1;
            const year = parseInt(parts[2], 10);
            return moment(date, format);
        }
    });

    $('.jpcurrency')
      .attr("autocomplete","off")

});

function UUID(){
  let strong = 1000;
  return (
    new Date().getTime().toString(16) +
    Math.floor(strong * Math.random()).toString(16)
  );
}
