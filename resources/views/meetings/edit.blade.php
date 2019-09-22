@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Edit Meeting</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- You are logged in! --}}
                    <div class="container">
                        <div class="row justify-content-center">
                          <form action="{{ route('admin.meetings.update',[$meeting->id]) }}" method="post" enctype="multipart/form-data">
                            @include('success')
                              @csrf
                              @method('patch')

                              <div class="form-group">
                                <label for="meetingTitle">Meeting title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$meeting->title}}" id="meetingTitle" placeholder="Enter meeting title">
                                @error('title')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>

                              <div class="form-group">
                                <label for="meetingDescription">Meeting description</label>
                                <textarea name="description" class="form-control  @error('description') is-invalid @enderror" id="meetingDescription">{{$meeting->description}}</textarea>
                                @error('description')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="meetingPhoto">Meeting Photo</label>
                                <input type="file" name="photo" class="form-control  @error('photo') is-invalid @enderror" id="meetingPhoto" >
                                @error('photo')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="date">Meeting Date</label>
                                <input type="date" id="date" class="form-control" name="date" value="2018-07-22" min="2019-01-01" max="2019-12-31">
                                @error('date')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>

                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection