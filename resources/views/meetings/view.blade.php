{{-- @extends('layouts.app')

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
                              @forelse ($meeting->agendas as $agenda)
                                    <form action="{{ $agenda->path() }}" method="post">
                                      @csrf
                                      @method('patch')
                                      <input type="text" class="form-control mb-2" name="name" id="" value="{{ $agenda->name }}">
                                    </form>
                              @empty
                                  <p>No agenda yet</p>
                              @endforelse
                              <form action="{{ $agenda->path() }}" method="post">
                                @csrf
                                <input type="text" class="form-control mb-2" name="name" id="" placeholder="Add item to agenda">
                              </form>
                          </div>
                          <div>
                            <a href="{{ route('admin.meetings.edit', [$meeting->id]) }}" class="btn btn-primary"> Edit</a>
                          </div>
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
      <h2 class="text-gray-350 no-underline font-normal text-sm">Meeting</h2>
      <a href="/projects/create" class="button">New Meeting</a>
    </div>
  </header>
  <main>
    <div class="lg:flex -mx-3">
      <div class="lg:w-3/4 px-3">
        <div class="mb-8">
          <h2 class="text-gray-350 text-lg font-normal mb-3">Agenda</h2>

          @foreach ($meeting->agendas as $agenda)
          <form action="{{ $agenda->path() }}" method="post">
            @method('PATCH')
            @csrf
              <div class="flex items-center card mb-3">
                <input type="text" name="body" value="{{ $agenda->name }}" class="w-full">
              </div>
          </form>
          @endforeach
          <div class="card mb-3">
            <form action="{{$meeting->path() . '/agendas' }}" method="post">
              @csrf
              <input type="text" placeholder="Add a new agenda item" name="body" class="w-full">
            </form>
          </div>
        </div>

        <div>
        <h2 class="text-gray-350 text-lg font-normal mb-3">General Notes</h2>
        <textarea class="card w-full" style="min-height: 200px">Lorem Ipsum</textarea>
        </div>
      </div>
      <div class="lg:w-1/4 px-3">
        <div class="card">
          <h1 class="-ml-5 border-l-4 border-blue-450 pl-4 mb-3">{{ $meeting->title}}</h1>
          <div>{{ $meeting->description}}</div>
          <a href="/admin/meetings">Go Back</a>
        </div>
      </div>
    </div>
  </main>
  
@endsection