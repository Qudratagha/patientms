@if(session('message'))
    <div class="alert alert-success" role="alert">
        <i class="fa-solid fa-circle-check alert-link"></i> {{ session('message') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger" role="alert">
        <i class="fa-solid fa-circle-xmark alert-link"></i> {{ session('error') }}
    </div>
@endif
@if(session('warning'))
    <div class="alert alert-warning" role="alert">
        <i class="fa-solid fa-triangle-exclamation alert-link"></i> {{ session('warning') }}
    </div>
@endif
@yield('content')
