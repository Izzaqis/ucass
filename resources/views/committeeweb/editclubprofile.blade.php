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
                    <input type="text" class="form-control" id="name" placeholder="Name" value="{{ $club->name }}">
                </div>
                <div class="form-group">
                    <label for="Enter date">Club Description</label>
                    <input type="text" class="form-control" id="date" placeholder="Date" value="{{ $club->description }}">
                </div>
                <div class="form-group">
                    <div class="input-group col-xs-12"><label for="file-input" class=" form-control-label">Club Picture</label></div>
                    <input type="file" id="file-input" name="clubpic" class="form-control-file" required>
                </div>

                    <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>

            </form>
        </div>
        </div>
    </div>

  <!-- content-wrapper ends -->


</div>

@endsection

@section('script')

@endsection

