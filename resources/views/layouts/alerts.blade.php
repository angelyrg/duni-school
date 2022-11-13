

@if ($message = Session::get('success'))

<div class="alert alert-success alert-dismissible" role="alert">
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


@elseif($message = Session::get('danger'))

<div class="alert alert-danger alert-dismissible" role="alert">
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif


