<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="container">
        <h2>รายละเอียดเอกสาร หมายเลข <strong>{{$book->booknumber}}</strong></h2>
      <table class="table table-striped">
      <thead>
        <tr>
          <th>ชื้อ</th>
          <th>รายละเอียด</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><h4>เรื่อง  :</h4></td>
          <td><h4>{{$book->booknumber}}</h4></td>
        </tr>
        <tr>
          <td><h4>รายละเอียด  :</h4></td>
          <td><h2>{{$book->detail}}</h2></td>
        </tr>
        <tr>
          <td><h4>อ้างอิง  :</h4></td>
          <td><h4>{{$book->refer}}</h4></td>
        </tr>
        <tr>
          <td><h4>ความเร็ว  :</h4></td>
          <td><h4>{{$book->speed}}</h4></td>
        </tr>
        <tr>
          <td><h4>ส่งเอกสารจาก  :</h4></td>
          <td><h4>{{$fromdrp->namedrp}}</h4></td>
        </tr>
        <tr>
          <td><h4>ส่งเอกสารถึง  :</h4></td>
          <td><h4>{{$todrp->namedrp}}</h4></td>
        </tr>
        <tr>
          <td><h4>สถานะหนังสือ  :</h4></td>
          <td><h4>{{$typeSelect->type}}</h4></td>
        </tr>
        <tr>
          <td><h4>วันที่สร้างเอกสาร  :</h4></td>
          <td><h4>{{$book->start}}</h4></td>
        </tr>
        <tr>
          <td><h4> เอกสาร  :</h4></td>
          <td><a href="{{action('DowloadController@show', $book['id'])}}" dowload="" class="btn btn-primary">ูคลิกเพื่อดาวน์โหลด</a></td>
        </tr>
      </tbody>
    </div>
@endsection
