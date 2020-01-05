<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\File;

use \Flow\Config as FlowConfig;
use \Flow\Request as FlowRequest;
use \Flow\ConfigInterface;
use \Flow\RequestInterface;


class fileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function check(Request $request){
      return response('OK',200);
    }


    public function upload( Request $req){
      $config = new \Flow\Config();
      $config->setTempDir( storage_path() . '/app/chunks'); //小分けファイルの一時保存先指定
      $file = new \Flow\File($config);

      $request = new FlowRequest();


      if($file->validateChunk()){
          $file->saveChunk();
      }else{
          return \Response::json(["result"=>"NG","message"=>"アップロードに失敗しました"] ,204);
      }

      $uploadFile = $request->getFile() ;
      $srcPath = pathinfo($uploadFile['name']);
      $tempDir = storage_path() . '/app/tmp/';
      $filename = md5($uploadFile['name'] .'-' . time())  . "." . $srcPath['extension'];

      if($file->validateFile() && $file->save( $tempDir . $filename ) ){
        return \Response::json(["result"=>"OK","data"=>["src"=>$srcPath, "up"=>$filename] ],200);
      }

    }

}
