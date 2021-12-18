@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
{{--        {{ Session::get('success') }}--}}
        <strong>{{ Session::get('success')['msg'] }}</strong>
        <p>
            {!! Session::get('success')['pref'] !!}
        </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (Session::has('info'))
    <div class="alert alert-info">
        {{ Session::get('info') }}
    </div>
@endif
@if (Session::has('warning'))
    <div class="alert alert-warning">
        {{ Session::get('warning') }}
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('erorr') }}
    </div>
@endif
