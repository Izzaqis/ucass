@extends('layouts.parentAdmin')

@section('head')

@endsection

@section('content')

<div class="content-wrapper">

    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
          <i class="mdi mdi-home"></i>
        </span> Dashboard
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Student Information</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th> Name </th>
                    <th> Mobile </th>
                    <th> Address </th>
                    <th> City </th>
                    <th> Poscode </th>
                    <th> Email </th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->mobile}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->city}}</td>
                        <td>{{$user->poscode}}</td>
                        <td>{{$user->email}}</td>
                        <td>@if ($user->is_admin == 1)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a>
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

@endsection

