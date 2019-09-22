@if ( session('success') )
  <div class="alert alert-dismissible alert-success fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
      {{ session('success') }}
  </div>
@endif

@if (session('status'))
  <div class="alert alert-success" role="alert">
      {{ session('status') }}
  </div>
@endif