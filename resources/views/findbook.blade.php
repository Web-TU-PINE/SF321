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
          <form method="POST" action="/">
                      {{ csrf_field() }}
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="booknumber">เลขที่หนังสือ</label>
                        <input type="email" class="form-control"  placeholder="เลขที่หนังสือ">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="sender">ชื่อผู้ส่ง</label>
                        <input type="text" class="form-control" placeholder="ชื่อผู้ส่ง">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="sender">เรื่อง</label>
                        <input type="text" class="form-control" placeholder="เรื่อง">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputState">สถานะหนังสือ</label>
                        <select class="form-control">
                          <option selected>Choose...</option>
                          <option>หนังสือที่ยังไม่ได้รับ</option>
                          <option>หนังสือที่ได้รับแล้ว</option>
                          <option>หนังสือที่แจกจ่ายแล้ว</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="sender">จากหน่วยงาน</label>
                        <select  class="form-control">
                          <option selected>Choose...</option>
                          <option>A</option>
                          <option>B</option>
                          <option>C</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="reciever">ถึงหน่วยงาน</label>
                        <select  class="form-control">
                          <option selected>Choose...</option>
                          <option>A</option>
                          <option>B</option>
                          <option>C</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputZip">จากวันที่</label>
                        <input type="date" class="form-control">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputZip">ถึงวันที่</label>
                        <input type="date" class="form-control">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                  </form>
    </div>
@endsection
