@if($annoucement)
    <div class="alert alert-solid-dark alert-dismissible fade show text-white mt-4">
        {{ $annoucement }}
        <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>
    </div>
@endif