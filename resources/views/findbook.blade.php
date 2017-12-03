<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>ค้นหาหนังสือในระบบ</p>
    <div class="container">
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div><br />
      @endif
      @if (\Session::has('success'))
      <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
      </div><br />
      @endif
 <form method="get" action="{{url('search')}}">
                 {{ csrf_field() }}
               <div class="form-row">
                 <div class="form-group col-md-3">
                   <label for="booknumber">เลขที่หนังสือ</label>
                   <input type="text" name="booknumber" class="form-control"  placeholder="เลขที่หนังสือ">
                 </div>
                 <div class="form-group col-md-3">
                   <label for="heading">เรื่อง</label>
                   <input type="text" name="heading" class="form-control" placeholder="เรื่อง">
                 </div>
                 <div class="form-group col-md-3">
                   <label for="speed">ระดับความเร็วหนังสือ</label>
                   <input type="text" name="speed" class="form-control" placeholder="เรื่อง">
                 </div>
                 <div class="form-group col-md-3">
                   <label for="refer">อ้างอิง</label>
                   <input type="text" name="refer" class="form-control" placeholder="เรื่อง">
                 </div>
               </div>
               <div class="form-row">
                 <label for="detail">รายละเอียด</label>
                 <textarea name="detail" rows="8" cols="80"></textarea>
               </div>
               <div class="form-row">
                 <div class="form-group col-md-4">
                   <label for="typebook">สถานะหนังสือ</label>
                   <select name="typebook" class="form-control">
                     <option selected>Choose...</option>
                     <option value="1">หนังสือที่ยังไม่ได้รับ</option>
                     <option value="2">หนังสือที่ได้รับแล้ว</option>
                     <option value="3">หนังสือที่แจกจ่ายแล้ว</option>
                   </select>
                 </div>
                 <div class="form-group col-md-4">
                   <label for="fromdpm">จากหน่วยงาน</label>
                   <select  name="fromdpm" class="form-control">
                     <option selected>Choose...</option>
                     <option value="1">อบต</option>
                     <option value="2">อบจ</option>
                     <option value="3">เทศบาล</option>
                     <option value="4">กฌ</option>
                     <option value="5">การเงิน</option>
                     <option value="6">รายได้</option>
                     <option value="7">ตรวจสอบ</option>
                     <option value="8">บัญชี</option>
                   </select>
                 </div>
                 <div class="form-group col-md-4">
                   <label for="todpm">ถึงหน่วยงาน</label>
                   <select  name="todpm" class="form-control">
                     <option selected>Choose...</option>
                     <option value="1">อบต</option>
                     <option value="2">อบจ</option>
                     <option value="3">เทศบาล</option>
                     <option value="4">กฌ</option>
                     <option value="5">การเงิน</option>
                     <option value="6">รายได้</option>
                     <option value="7">ตรวจสอบ</option>
                     <option value="8">บัญชี</option>
                   </select>
                 </div>
                 <div class="form-group col-md-4">
                   <label for="inputZip" name="start">จากวันที่</label>
                   <input type="date" name="start" class="form-control">
                 </div>
                 <div class="form-group col-md-4">
                   <label name="end" for="inputZip">ถึงวันที่</label>
                   <input type="date" name="end" class="form-control">
                 </div>
                 <div class="form-group col-md-4">
                   <label for="file">ไฟล์เอกสาร</label>
                   <input type="file" name="file" class="form-control">
                 </div>
               </div>
               <button type="submit" class="btn btn-primary">ค้นหา</button>
             </form>
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>เลขที่หนังสือ</th>
        <th>เรื่อง</th>
        <th>อ้างอิง</th>
        <th>รายละเอียด</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($books as $book)
      <tr>
        <td>{{$book['booknumber']}}</td>
        <td>{{$book['heading']}}</td>
        <td>{{$book['refer']}}</td>
        <td><a href="{{action('ManageBookController@edit', $book['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('ManageBookController@destroy', $book['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
@endsection
