@extends('layouts.parentAdmin')

@section('head')

@endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Add Club Information </h3>
      </div>

        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Club Information</h4>
              <p class="card-description"> </p>

                <div class="card-body">
                <form method="POST" action="{{ route('clubs.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="Enter Name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="Enter date">Date of Establishment</label>
                        <input type="text" class="form-control" id="date" placeholder="Date">
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-14"><label for="Enter Zone" class=" form-control-label">Zone</label>
                            <select name="select" id="zone" class="form-control" placeholder="Zone">
                                <option value="0">Please Select</option>
                                <option value="1">College</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-14"><label for="Enter category" class=" form-control-label">Category</label>
                            <select name="select" id="category" class="form-control" placeholder="Category">
                                <option value="0">Please Select</option>
                                <option value="1">Art & Cultural</option>
                                <option value="2">Communication & Entrepreneurship</option>
                                <option value="3">Leadership & Intellectual</option>
                                <option value="4">Spiritual Values & Civillizational</option>
                                <option value="5">Sport & Recreational</option>
                                <option value="6">Exempted</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Enter advisor">Advisor</label>
                        <input type="text" class="form-control" id="advisor" placeholder="Advisor">
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
