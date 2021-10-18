@extends('layouts.parentCommittee')

@section('head')

@endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Update Event Information </h3>
      </div>

        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Event Information</h4>
              <p class="card-description"> </p>

                    <form enctype="multipart/form-data"  method="post" action="{{ route('event.update', $event->id) }}">
                        @method('PATCH')
                        @csrf

                        <div class="row form-group">
                            <div class="col col-md-14"><label for="Enter category" class=" form-control-label">Type</label>
                                <select name="select" id="category" class="form-control" placeholder="Category">
                                    <option value="0">{{ $event->type }}</option>
                                    <option value="1">All Students</option>
                                    <option value="2">Club Members</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Enter Name">Name</label>
                            <input type="text" class="form-control" id="Enter name" placeholder="Name" value="{{ $event->name }}">
                        </div>
                        <div class="form-group">
                            <label for="Enter date">Date</label>
                            <input type="text" class="form-control" id="Enter date" placeholder="Date" value="{{ $event->date }}">
                        </div>
                        <div class="form-group">
                            <label for="Enter event name">Event Name</label>
                            <input type="text" class="form-control" id="Enter event name" placeholder="Event Name" value="{{ $event->eventname }}">
                        </div>
                        <div class="form-group">
                            <label for="Enter time">Time</label>
                            <input type="text" class="form-control" id="Enter time" placeholder="Event Time" value="{{ $event->eventime }}">
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-14"><label for="Enter category" class=" form-control-label">Category</label>
                                <select name="select" id="category" class="form-control" placeholder="Category">
                                    <option value="0">{{ $event->category }}</option>
                                    <option value="1">Art & Cultural</option>
                                    <option value="2">Communication & Entrepreneurship</option>
                                    <option value="3">Leadership & Intellectual</option>
                                    <option value="4">Spiritual Values & Civillizational</option>
                                    <option value="5">Sport & Recreational</option>
                                    <option value="6">Exempted</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-14"><label for="Enter Level" class=" form-control-label">Level</label>
                                <select name="select" id="level" class="form-control" placeholder="Level">
                                    <option value="0">{{ $event->level }}</option>
                                    <option value="1">College</option>
                                    <option value="2">District</option>
                                    <option value="3">State</option>
                                    <option value="4">International</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Enter organizer">Organizer</label>
                            <input type="text" class="form-control" id="Enter organizer" placeholder="Organizer" value="{{ $event->organizer }}">
                        </div>
                        <div class="form-group">
                            <label for="Enter location">Location</label>
                            <input type="text" class="form-control" id="Enter location" placeholder="Location" value="{{ $event->location }}">
                        </div>
                        <div class="form-group">
                            <label for="Enter link">Link</label>
                            <input type="text" class="form-control" id="Enter link" placeholder="Link" value="{{ $event->link }}">
                        </div>
                        <div class="form-group">
                            <label for="Enter funding (cash)">UNITEN Funding (Cash)</label>
                            <input type="text" class="form-control" id="Enter funding (cash)" placeholder="Funding (Cash)" value="{{ $event->fundcash }}">
                        </div>
                        <div class="form-group">
                            <label for="Enter funding (cash)">UNITEN Funding (Transport)</label>
                            <input type="text" class="form-control" id="Enter funding (transport)" placeholder="Funding (Transport)" value="{{ $event->fundtransport }}">
                        </div>
                        <div class="form-group">
                            <label for="Enter description">Description</label>
                            <input type="text" class="form-control" id="Enter description" placeholder="Description" value="{{ $event->description }}">
                        </div>
                        <div class="form-group">
                            <label>Poster </label>
                            <input type="file" name="img[]" class="file-upload-default">
                            <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Poster">
                              <span class="input-group-append">
                                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                              </span>
                            </div>
                          </div>
                        <div class="form-group">
                            <label for="Enter note">Note</label>
                            <input type="text" class="form-control" id="Enter note" placeholder="Note" value="{{ $event->note }}">
                        </div>

                        <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>

            </div>
        </div>
    </div>


</div>

@endsection

@section('script')

@endsection
