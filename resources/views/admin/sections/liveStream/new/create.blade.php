<form method="POST" action="{{ route('create_class') }}">
    @csrf
    <div class="form-group row">
        <label for="name" class="col-md-12 col-form-label">{{ __('Class Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text"
                   class="form-control @error('name') is-invalid @enderror" name="name"
                   value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">
                {{ __('Create Class') }}
            </button>
        </div>
    </div>
</form>
