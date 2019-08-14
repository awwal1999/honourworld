@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Meetings</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- You are logged in! --}}
                    <div class="container">
                        <div class="row justify-content-center">
                          <form action="{{ route('admin.meetings.store') }}" method="post" enctype="multipart/form-data">
                            @include('success')
                              @csrf

                              <div class="form-group">
                                <label for="meetingTitle">Meeting title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="meetingTitle" placeholder="Enter meeting title">
                                @error('title')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>

                              <div class="form-group">
                                <label for="meetingDescription">Meeting description</label>
                                <input type="text" name="description" class="form-control  @error('description') is-invalid @enderror" id="meetingDescription" placeholder="Enter meeting description">
                                @error('description')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="meetingPhoto">Meeting Photo</label>
                                <input type="file" name="photo" class="form-control  @error('photo') is-invalid @enderror" id="meetingPhoto" placeholder="Enter meeting description">
                                @error('photo')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>

                                <button class="btn btn-primary" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection