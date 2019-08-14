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

                    <div class="container">
                        <div class="row justify-content-center">
                          <h1 class="title">{{ $meeting->title }}</h1>
                          <div class="content">
                            {{ $meeting->description }}
                            <hr>
                          </div>
                          <div class="agenda" style="width:100%;">
                            <h2>Agenda</h2>
                            <ul>
                              @forelse ($meeting->agendas as $agenda)
                                  <li> {{ $agenda->name }} </li>
                              @empty
                                  
                              @endforelse
                            </ul>
                          </div>
                          <div>
                            <a href="{{ route('admin.meetings.edit', [$meeting->id]) }}" class="btn btn-primary">Edit</a>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection