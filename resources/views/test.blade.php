<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Page Title')
<link rel="stylesheet" href="{{asset('css/app.css')}}">

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<div class="container">
  <h2>แก้ไขเอกสาร</h2><br  />
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div><br />
  @endif
  <form method="post" action="{{action('ManageBookController@update', $id)}}">
    {{csrf_field()}}
    <input name="_method" type="hidden" value="PATCH">
    <div class="row">
      <div class="form-group col-md-3">
        <label for="booknumber">เลขที่หนังสือ:</label>
        <input type="text" class="form-control" name="booknumber" value="{{$book->booknumber}}">
      </div>
      <div class="form-group col-md-3">
        <label for="heading">เรื่อง:</label>
        <input type="text" class="form-control" name="heading" value="{{$book->heading}}">
      </div>
      <div class="form-group col-md-3">
        <label for="speed">ระดับความเร็วหนังสือ:</label>
        <input type="text" class="form-control" name="speed" value="{{$book->speed}}">
      </div>
      <div class="form-group col-md-3">
        <label for="refer">อ้างอิง:</label>
        <input type="text" class="form-control" name="refer" value="{{$book->refer}}">
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"></div>
        <div class="form-group col-md-4">
          <label for="detail">รายละเอียด:</label>
          <textarea name="detail" rows="8" cols="80" >{{$book->detail}}</textarea>
        </div>
      </div>
      <div class="form-row">

        <div class="form-group col-md-4">
          <label for="typebook">สถานะหนังสือ</label>
          <select name="typebook" class="form-control">
            @foreach($types as $type)
            <option value="{{ $typeSelect->id }}" {{ ($typeSelect->id == $book->typebook) ? 'selected' : '' }}>{{ $type->type }}</option>
            @endforeach
          </select>
        </div>




        <div class="form-group col-md-4">
          <label for="fromdpm">จากหน่วยงาน</label>
            <select  name="fromdpm" class="form-control">
                <option selected>Choose...</option>
                @foreach( $drps as $drp)
                 <option value="{{ $drp->id}}">{{ $drp->namedrp }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-4">
          <label for="todpm">ถึงหน่วยงาน</label>
            <select  name="todpm" class="form-control">
                <option selected>Choose...</option>
                @foreach( $drps as $drp)
                 <option value="{{ $drp->id}}">{{ $drp->namedrp }}</option>
                @endforeach
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
          <input type="text" name="file" class="form-control">
        </div>
      </div>
     <div class="row">
       <div class="col-md-4"></div>
         <div class="form-group col-md-4">
           <button type="submit" class="btn btn-success" style="margin-left:38px">Update Book</button>
         </div>
   </div>
  </form>
  </div>
@endsection
