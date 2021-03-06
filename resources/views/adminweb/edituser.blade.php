@extends('layouts.parentAdmin')

@section('head')

@endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Update Student Information </h3>
      </div>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
              <h4 class="card-title">Student Information</h4>
              <p class="card-description"> </p>


              <div class="card-body">
                <form method="post" action="{{ route('users.update', $user->id) }}">
                @method('PATCH')
                    {{ csrf_field() }}

                        <div class="form-group">
                            <label for="Enter Name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="Enter phone number">Phone Number</label>
                            <input type="text" class="form-control" id="mobile" placeholder="Mobile" value="{{ $user->mobile }}">
                        </div>
                        <div class="form-group">
                            <label for="Enter address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="Address" value="{{ $user->address }}">
                        </div>
                        <div class="form-group">
                            <label for="Enter poscode">Poscode</label>
                            <input type="text" class="form-control" id="poscode" placeholder="Poscode" value="{{ $user->poscode }}">
                        </div>
                        <div class="form-group">
                            <label for="Enter city">City</label>
                            <input type="text" class="form-control" id="city" placeholder="City" value="{{ $user->city }}">
                        </div>
                        <div class="form-group">
                            <label for="Enter email">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Email" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="Enter role">Role</label>
                            <input type="text" class="form-control" id="role" placeholder="Role" value="{{ $user->role }}">
                        </div>
                        <div class="form-group">
                            <label for="Enter club">Club</label>
                            <input type="text" class="form-control" id="club" placeholder="Club" value="{{ $user->club }}">
                        </div>

                        <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                </form>
                </div>

            </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection
