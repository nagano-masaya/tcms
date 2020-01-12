<?php

function DBDate(string $s){
   return $s=="" ? null : "20".preg_replace('/[^\d]/','-', unescape($s));
}

function DBInt(?string $s){
 if( is_null( $s))
  return null;

 return intval( preg_replace("/[^0-9]+/","",unescape($s) ) );
}

function unescape($source, $iconv_to = 'UTF-8') {
  $decodedStr = '';
  $pos = 0;
  $len = strlen ($source);
  while ($pos < $len) {
      $charAt = substr ($source, $pos, 1);
      if ($charAt == '%') {
          $pos++;
          $charAt = substr ($source, $pos, 1);
          if ($charAt == 'u') {
              // we got a unicode character
              $pos++;
              $unicodeHexVal = substr ($source, $pos, 4);
              $unicode = hexdec ($unicodeHexVal);
              $decodedStr .= code2utf($unicode);
              $pos += 4;
          }
          else {
              // we have an escaped ascii character
              $hexVal = substr ($source, $pos, 2);
              $decodedStr .= chr (hexdec ($hexVal));
              $pos += 2;
          }
      }
      else {
          $decodedStr .= $charAt;
          $pos++;
      }
  }

  if ($iconv_to != "UTF-8") {
      $decodedStr = iconv("UTF-8", $iconv_to, $decodedStr);
  }

  return $decodedStr;
}

/**
 * Function coverts number of utf char into that character.
 * Function taken from: http://sk2.php.net/manual/en/function.utf8-encode.php#49336
 *
 * @param int $num
 * @return utf8char
 */
function code2utf($num){
  if($num<128)return chr($num);
  if($num<2048)return chr(($num>>6)+192).chr(($num&63)+128);
  if($num<65536)return chr(($num>>12)+224).chr((($num>>6)&63)+128).chr(($num&63)+128);
  if($num<2097152)return chr(($num>>18)+240).chr((($num>>12)&63)+128).chr((($num>>6)&63)+128) .chr(($num&63)+128);
  return '';
}
