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
        Club Profile
      </h3>
    </div>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Club Profile Information</h4>
            <p class="card-description"> </p>

            <form method="post" action="{{ route('clubs.saveprofile', $club->id) }}">
                @method('PATCH')
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="Enter Name">Club Name</label>
                    <input type="text" class="form-control" id="Enter name" placeholder="Name" value="{{ $club->name }}">
                </div>
                <div class="form-group">
                    <label for="Enter date">Club Description</label>
                    <input type="text" class="form-control" id="Enter date" placeholder="Date" value="{{ $club->description }}">
                </div>

                    <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Update</h4>
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

@endsection

