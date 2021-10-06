@extends('layouts.parentAdmin')

@section('head')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@endsection

@section('content')

<div class="content-wrapper">

    <div class="card-body card-block">
        <form class="form-horizontal" method="put" action="{{ route('event.add.attach', $event->id) }}">
            @csrf

            <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Participants Information</h4>
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
                            <th> Student ID </th>
                            <th> Event Name </th>
                            <th> Phone Number </th>
                            <th> Email </th>
                            <th> Edit</th>
                            <th> Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($event->users as $user)
                            {{-- @if ($user->is_admin == 0 || $user->is_commitee == 1) --}}
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$event->name}}</td>
                                <td>{{$user->mobile}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('event.detach', ['eid'=>$event->id, 'uid'=>$user->id]) }}" method="put">
                                    {{ csrf_field() }}
                                        <button class="btn btn-danger" type="submit"
                                        onclick="return confirm('Are you sure you want to remove this participants?')">
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
        </form>
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

