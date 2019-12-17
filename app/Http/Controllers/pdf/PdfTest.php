<?php

namespace App\Http\Controllers\pdf;

use TCPDF;
use Illuminate\Http\Request;

class PdfTest
{
  public static function generate(Request $req ){
    $pdf =  new TCPDF("Landscape");

    $pdf->AddPage();
    $pdf->SetFont("kozminproregular", "", 9);
    $html = <<< EOF
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
        background-color:#ccc;
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
    </style>
    <table border="0" cellspacing="8" cellpadding="0">
      <tr>
        <td><h1>未収一覧</h1></td>
        <td align="right" vertical-align="bottom">作成:2019年12月15日<br>18:24:30</td>
      </tr>
    </table>
    <table  border="1" style="border:10px solid #c0c0c0" cellspacing="0" cellpadding="4">
        <tr>
            <th>取引先</th>
            <th align="left">工事名</th>
            <th>工期</th>
            <th>契約金額(税込)</th>
            <th>請求額（累積）</th>
            <th>入金額（累積）</th>
            <th>請求残</th>
            <th>入金残</th>
            <th>最終請求日</th>
            <th>最終入金日</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>'
    EOF;

    $pdf->writeHtml($html);
    $pdf->output('test.pdf' , "I");
  }
}
