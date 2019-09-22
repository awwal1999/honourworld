{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Meetings
                    <span data-add-meeting class="float-right"> <a href="{{ route('admin.meetings.create') }}" class="btn btn-primary">Add new</a></span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        <div class="row">
                            @forelse ($meetings as $meeting)
                                <div class="col-sm">
                                    <div class="card" style="width: 18rem; margin: .5rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $meeting->title }}</h5>
                                            <p class="card-text">{{ Str::words($meeting->description,10) }}</p>
                                            <a href="{{ $meeting->path() }}" class="btn btn-primary">View</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                
                            @endforelse
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@extends('layouts.app')

@section('content')
  <header class="flex  mb-3 py-4">
    <div class="flex items-end justify-between w-full">
      <h2 class="text-gray-350 no-underline font-normal text-sm">Meetings</h2>
      <a href="/admin/meetings/create" class="button">New Meeting</a>
    </div>
  </header>
    <main class="lg:flex flex-wrap -mx-3">
      @forelse ($meetings as $meeting)
        <div class="lg:w-1/3 px-3 pb-6">
          <div class="card" style="height:200px;">
            <h3 class="font-normal text-xl py-4 -ml-5 border-l-4 border-blue-450 pl-4 mb-3">
              <a href="{{ $meeting->path() }}">{{ $meeting->title }}</a>
            </h3>
            <div class="text-gray-350"> {{ str_limit($meeting->description) }} </div>
          </div>
        </div>
      @empty
        <div>No meetings yet.</div>
      @endforelse
    </main>

@endsection