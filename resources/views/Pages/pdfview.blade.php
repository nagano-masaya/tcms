@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-8">
      test
    </div>
    <div class="col-4">

    </div>
  </div>
  <div class="row">
    <div class="col-12">
        <object data="pdftest.pdf" type="application/pdf" style="width:100%;height:1200px;">alt : <a href="https://tcpdf.org/files/examples/example_021.pdf">example_021.pdf</a></object>
    </div>
  </div>
</div>

@endsection
