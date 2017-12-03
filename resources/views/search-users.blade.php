<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')

<div class="container">
  <table  class="table table-striped">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th colspan="2">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @if($book->count())
                              @foreach($book as $key => $item)
                                  <tr>
                                      <td>{{ $item->id }}</td>
                                      <td>{{ $item->booknumber }}</td>
                                      <td>{{ $item->heading }}</td>
                                      <td><a href="{{action('ManageBookController@edit', $item->id)}}" class="btn btn-warning">Edit</a></td>
                                      <td>
                                        <form action="{{action('ManageBookController@destroy', $item->id)}}" method="post">
                                          {{csrf_field()}}
                                          <input name="_method" type="hidden" value="DELETE">
                                          <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                      </td>
                                  </tr>
                              @endforeach
                          @else
                              <tr>
                                  <td colspan="4">There are no data.</td>
                              </tr>
                          @endif
                      </tbody>
                  </table>
</div>

@endsection
