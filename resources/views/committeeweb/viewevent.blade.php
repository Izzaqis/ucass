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
                        <th> Date </th>
                        <th> Event Name</th>
                        <th> Event Description </th>
                        <th> Category </th>
                        <th> Level </th>
                        <th> Organizer </th>
                        <th> Location </th>
                        <th> Time </th>
                        <th> Link </th>
                        <th> Funding (Cash) </th>
                        <th> Funding (Transport) </th>
                        <th> Note </th>
                        <th> Poster </th>
                        <th> Edit</th>
                        <th> Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)

                        <tr>
                            <td>{{$event->date}}</td>
                            <td>{{$event->eventname}}</td>
                            <td>{{$event->description}}</td>
                            <td>{{$event->category}}</td>
                            <td>{{$event->level}}</td>
                            <td>{{$event->organizer}}</td>
                            <td>{{$event->location}}</td>
                            <td>{{$event->time}}</td>
                            <td>{{$event->link}}</td>
                            <td>{{$event->fundcash}}</td>
                            <td>{{$event->fundtransport}}</td>
                            <td>{{$event->note}}</td>
                            <td>{{$event->poster}}</td>
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

