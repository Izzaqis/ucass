@extends('layouts.parentAdmin')

@section('head')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@endsection

@section('content')

<div class="content-wrapper">

    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-home"></i>
        </span> Dashboard
      </h3>
    </div>
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Committee Information</h4>
            <div class="table-responsive">

                <div class="search-field d-none d-md-block col-md-6 float-right mb-3" >
                    <div class="d-flex align-items-center h-100" >
                      <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                          <i class="input-group-text border-0 mdi mdi-magnify"></i>
                        </div>
                        <input type="text" id="myInput" onkeyup="myFunction()" class="form-control bg-transparent border-2" placeholder="Search ...">
                      </div>
                    </div>
                </div>

              <table class="table" id="myTable">
                <thead>
                  <tr>
                    <th> Name </th>
                    <th> Mobile </th>
                    <th> Address </th>
                    <th> City </th>
                    <th> Poscode </th>
                    <th> Email </th>
                    <th>Edit</th>
                    <th>Student</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    @if ($user->is_admin == 0 && $user->is_commitee == 1)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->mobile}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->city}}</td>
                        <td>{{$user->poscode}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                        {{-- <a href="{{route('users.approve', $user->id)}}" class="btn btn-success">Approve</a> --}}
                            <form action="{{ route('users.student', $user->id) }}">
                                {{-- @method('PATCH')  --}}
                                @csrf
                                <button class="btn btn-primary" type="submit"
                                onclick="return confirm('Are you sure you want to make this user as a student?')">
                                Approve</button>
                          </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- content-wrapper ends -->

@endsection

@section('script')

<script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>

@endsection

