@extends('layouts.app')

{{-- @section('content')
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
@endsection --}}

@section('content')
    <div class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow">
        <h1 class="text-2xl font-normal mb-10 text-center">
            Let's start something new
        </h1>

        <form
            method="POST"
            action="/projects"
        >
            {{-- @include ('projects.form', [
                'project' => new App\Project,
                'buttonText' => 'Create Project'
            ]) --}}

            <div class="field mb-6">
                <label class="label text-sm mb-2 block" for="title">Title</label>

                <div class="control">
                    <input
                            type="text"
                            class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full"
                            name="title"
                            placeholder="My next awesome project"
                            required>
                </div>
            </div>

            <div class="field mb-6">
              <label class="label text-sm mb-2 block" for="description">Description</label>

              <div class="control">
                      <textarea
                          name="description"
                          rows="10"
                          class="textarea bg-transparent border border-grey-light rounded p-2 text-xs w-full"
                          placeholder="I should start learning piano."
                          required></textarea>
              </div>
          </div>
          <div class="field">
            <div class="control">
                <button type="submit" class="button is-link mr-2">Add meeting</button>

                <a href="/admin/meetings">Cancel</a>
            </div>
        </div>

        </form>
    </div>
@endsection