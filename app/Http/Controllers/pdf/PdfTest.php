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
        background-color:#f0f0f0;
      }
      .odd{
        background-color:#ffffff;
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
            <th style="width:7%">取引先</th>
            <th style="width:27%" align="left">工事名</th>
            <th style="width:14%">工期</th>
            <th style="width:8%">契約金額<br>(税込)</th>
            <th style="width:8%">請求額<br>(累積)</th>
            <th style="width:8%">入金額<br>(累積)</th>
            <th style="width:7%">請求残</th>
            <th style="width:7%">入金残</th>
            <th style="width:7%">最終請求日</th>
            <th style="width:7%">最終入金日</th>
        </tr>
        <tr class="odd">
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
        <tr class="even">
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
