@if ( $errors->any() )
  <div class="alert alert-dismissible fade show bg-gradient-danger text-white" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <ul>
          @foreach ( $errors->all() as $error )
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
@if ( session('error') )
    <div class="alert alert-dismissible fade show bg-gradient-danger text-white" role="alert"">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session('error') }}
    </div>
@endif