@extends('layouts.app')

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

                    {{-- You are logged in! --}}
                    <div class="container">
                        <div class="row">
                            @forelse ($meetings as $meeting)
                                <div class="col-sm">
                                    <div class="card" style="width: 18rem; margin: .5rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $meeting->title }}</h5>
                                            <p class="card-text">{{ Str::words($meeting->description,10) }}</p>
                                            {{-- <p class="card-text">{{ $meeting->description }}</p> --}}
                                            <a href="{{ route('admin.meetings.view', [$meeting->id]) }}" class="btn btn-primary">View</a>
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
@endsection
