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
            <h4 class="card-title">Club Events </h4>
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
                        <th> Type </th>
                        <th> Event Name</th>
                        <th> Participants List</th>
                        <th> Details</th>
                        <th> Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                        @if (Auth::user()->club == $event->name)

                        <tr>
                            <td>{{$event->type}}</td>
                            <td>{{$event->eventname}}</td>
                            <td>
                                <a href="{{ route('events.detail',$event->id)}}" class="btn btn-primary">View</a>
                            </td>
                            <td>
                                <a href="{{ route('event.edit',$event->id)}}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('event.destroy', $event->id)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger" type="submit"
                                  onclick="return confirm('Are you sure you want to delete this events?')">
                                    Delete</button>
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

