@extends('layouts.parentCommittee')

@section('head')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@endsection

@section('content')

<div class="content-wrapper">

    <div class="row">

        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Event Participants</h4>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br />
                            @endif

                        <div class="card-body card-block">
                        <form class="form-horizontal" method="put" action="{{ route('event.add.attach', $events->id) }}">
                            @csrf

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Select</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="select" id="select" class="form-control">
                                        <option>Select Item</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" name="id">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mx-auto">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                            </div>
                        </form>

                </div>
            </div>
        </div>
    </div>

        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Event Participants</h4>

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
                            <th> Email </th>
                            <th> Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($events->users as $user)

                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->mobile}}</td>
                                <td>{{$user->email}}</td>
                                <td style="text-align: center">
                                    <form action="{{ route('event.detach', ['eid'=>$events->id, 'uid'=>$user->id]) }}" method="put">
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger" type="submit"
                                        onclick="return confirm('Are you sure you want to remove this participant')">
                                        Remove</button>
                                    </form>
                                </td>
                            </tr>
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

