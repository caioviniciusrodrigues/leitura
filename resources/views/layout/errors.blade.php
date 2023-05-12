@if ($errors->any())
    <div class="alert alert-danger animated fadeIn text-center mt-3">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>

        @foreach ($errors->all() as $error)
            <strong>{{ $error }}</strong><br>
        @endforeach

    </div>
@endif

