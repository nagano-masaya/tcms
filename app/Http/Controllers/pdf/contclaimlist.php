<?php

namespace App\Http\Controllers\pdf;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use TCPDF;

class contclaimlist
{
  public static function generate(Request $req ){
    $pdf =  new TCPDF("Landscape");
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->setHeaderMargin(0);
    $pdf->setFooterMargin(0);
    $pdf->setMargins(5.0,5.0,5.0);
    $pdf->SetAutoPageBreak(false,0);

//    $pdf->AddPage();
    $pdf->SetFont("kozminproregular", "", 9);

    $htmlA = <<< EOF
    <style>
      h1 {
        font-size: 16px;
        color: #333;
      }
      ul {
        list-style-type: none;
      }
      .table {
        border:10px solid #c0c0c0;
      }
      th{
        font:bold;
        background-color:#eee;
      }
      h1{
        width:50%
      }
      .w-50{
        width:50%
      }
      div{
        display:inline-box;
      }
      .even{
        background-color:#ffffff;
      }
      .odd{
        background-color:#f0f0f0;
      }
    </style>
    <table border="0" cellspacing="8" cellpadding="0">
      <tr >
        <td><h1>未収一覧</h1></td>
        <td align="right" vertical-align="bottom">作成:2019年12月15日<br>18:24:30</td>
      </tr >
    </table>
    <table  border="1" style="border:10px solid #c0c0c0;width:100%" cellspacing="0" cellpadding="4">
        <tr>
            <th style="width:12%">取引先</th>
            <th style="width:22%" align="left">工事名</th>
            <th style="width:14%">工期</th>
            <th style="width:8%">契約金額<br>(税込)</th>
            <th style="width:8%">請求額<br>(累積)</th>
            <th style="width:8%">入金額<br>(累積)</th>
            <th style="width:7%">請求残</th>
            <th style="width:7%">入金残</th>
            <th style="width:7%">最終請求日</th>
            <th style="width:7%">最終入金日</th>
        </tr>
EOF;

    //-----------------------------------------------------
    // データを取得
    $res = \App\claims::select()
      ->leftJoin('company','claims.company_id','company.company_id')
      ->get();

    //-----------------------------------------------------
    //  結果を出力
    $i=0;
    $rowsInPage = 25;
    $html = "";


    foreach($res as $rec){
      $subs = json_decode($rec->details);
      $j = 0;
      $attr=   ' rowspan="'.count($subs).'"' ;
      foreach($subs as $item){
        if( ($i%$rowsInPage) == 0 ){
          if( $i!=0 ){
            $html.="</table>";
            $pdf->writeHtml($html);
          }
          $pdf->AddPage();
          $html = $htmlA;
        }
        $html = $html
          //取引先 工事名 工期 契約金額(税込) 請求額(累積) 入金額(累積) 請求残 入金残 最終請求日 最終入金日
          .'<tr class="'.($i%2 ? "odd" : "even").'">'
          .($attr=="" ? "" : '<td'.$attr.'>'.($j>0? "" : $rec->nickname).'</td>')
          .'<td>'.$item->cont_text.'</td>'
          .'<td></td>'
          .'<td'.$attr.'>'.($j>0? "" : $rec->nickname).'</td>'
          .'<td'.$attr.'>'.($j>0? "" : $rec->nickname).'</td>'
          .'<td'.$attr.'>'.($j>0? "" : $rec->nickname).'</td>'
          .'<td'.$attr.'>'.($j>0? "" : $rec->nickname).'</td>'
          .'<td'.$attr.'>'.($j>0? "" : $rec->nickname).'</td>'
          .'<td'.$attr.'>'.($j>0? "" : $rec->nickname).'</td>'
          .'<td'.$attr.'>'.($j>0? "" : $rec->nickname).'</td>'
          .'</tr>';
        $attr="";
        $j++;
        $i++;
      }
    }
    for(; ($i%$rowsInPage)!=0; $i++ ){
      $html .= '<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
    }
    $html.="</table>";
    $pdf->writeHtml($html);
    $pdf->output('未収一覧.pdf' , "I");
  }
}
