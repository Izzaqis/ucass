@extends('layouts.parentCommittee')

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
            <h4 class="card-title">Club Profile</h4>
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
                    <th> Role </th>
                    <th> Club </th>
                    <th> Save</th>
                    <th> Cancel</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    @if ($user->is_admin == 0 || $user->is_commitee == 1)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->mobile}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->city}}</td>
                        <td>{{$user->poscode}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->club}}</td>
                        <td>
                            <a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" type="submit"
                              onclick="return confirm('Are you sure you want to delete this user?')">
                                Delete</button>
                            </form>
                        </td>
                        {{-- <td> --}}
                        {{-- <a href="{{route('users.approve', $user->id)}}" class="btn btn-success">Approve</a> --}}
                            {{-- <form action="{{ route('users.committee', $user->id) }}"> --}}
                                {{-- @method('PATCH')  --}}
                                {{-- @csrf --}}
                                {{-- <button class="btn btn-primary" type="submit" --}}
                                {{-- onclick="return confirm('Are you sure you want to make this user as a committee?')"> --}}
                                {{-- Approve</button> --}}
                          {{-- </form> --}}
                        {{-- </td> --}}
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

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Recent Updates</h4>
              <div class="d-flex">
                <div class="d-flex align-items-center mr-4 text-muted font-weight-light">
                  <i class="mdi mdi-account-outline icon-sm mr-2"></i>
                  <span>jack Menqu</span>
                </div>
                <div class="d-flex align-items-center text-muted font-weight-light">
                  <i class="mdi mdi-clock icon-sm mr-2"></i>
                  <span>October 3rd, 2018</span>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-6 pr-1">
                  <img src="assets/images/dashboard/img_1.jpg" class="mb-2 mw-100 w-100 rounded" alt="image">
                  <img src="assets/images/dashboard/img_4.jpg" class="mw-100 w-100 rounded" alt="image">
                </div>
                <div class="col-6 pl-1">
                  <img src="assets/images/dashboard/img_2.jpg" class="mb-2 mw-100 w-100 rounded" alt="image">
                  <img src="assets/images/dashboard/img_3.jpg" class="mw-100 w-100 rounded" alt="image">
                </div>
              </div>
              <div class="d-flex mt-5 align-items-top">
                <img src="assets/images/faces/face3.jpg" class="img-sm rounded-circle mr-3" alt="image">
                <div class="mb-0 flex-grow">
                  <h5 class="mr-2 mb-2">School Website - Authentication Module.</h5>
                  <p class="mb-0 font-weight-light">It is a long established fact that a reader will be distracted by the readable content of a page.</p>
                </div>
                <div class="ml-auto">
                  <i class="mdi mdi-heart-outline text-muted"></i>
                </div>
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

