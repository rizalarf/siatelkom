@if (session('error'))
    <div class="alert alert-danger fade in">
        <button class="close" data-dismiss="alert"><span>&times;</span></button>
        @lang(session('error'))
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success fade in">
        <button class="close" data-dismiss="alert"><span>&times;</span></button>
        @lang(session('success'))
    </div>
@endif
