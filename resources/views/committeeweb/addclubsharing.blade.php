@extends('layouts.parentCommittee')

@section('head')

@endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Add Club Sharing Information </h3>
      </div>

        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Club Sharing Information</h4>
              <p class="card-description"> </p>

              <form enctype="multipart/form-data" method="post" action="{{ route('sharing.store') }}">
                {{ csrf_field() }}

                        <div class="row form-group">
                            <div class="col col-md-14"><label for="Enter category" class=" form-control-label">Type</label>
                                <select name="select" id="type" class="form-control" placeholder="Type">
                                    <option value="0">Please Select</option>
                                    <option value="1">All Student</option>
                                    <option value="2">Club Members</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Enter title">Title</label>
                            <input type="text" class="form-control" id="Enter title" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="Enter description">Description</label>
                            <input type="text" class="form-control" id="Enter description" placeholder="Description">
                        </div>

                        {{-- <div class="form-group"> --}}
                            {{-- <label for="Enter description">Description</label> --}}
                            {{-- <textarea class="form-control" id="Enter description" rows="15" placeholder="Description" value="{{ $post->description }}" ></textarea> --}}
                          {{-- </div> --}}

                        <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>

            </div>
            </div>
        </div>
    </div>


</div>

@endsection

@section('script')

@endsection
