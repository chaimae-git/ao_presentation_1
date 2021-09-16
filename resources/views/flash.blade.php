@if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@elseif (session()->has('erreur'))
    <div class="alert alert-danger" role="alert">
        {{ session('erreur') }}
    </div>
@endif
