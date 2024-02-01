<div class="row">
    <div class="col-12">
        @if(session()->has('successMsg'))
            <div class="alert alert-success">
                {{ session()->get('successMsg') }}
            </div>
        @endif
        @if(session()->has('errorMsg'))
            <div class="alert alert-danger">
                {{ session()->get('errorMsg') }}
            </div>
        @endif
    </div>
</div>
