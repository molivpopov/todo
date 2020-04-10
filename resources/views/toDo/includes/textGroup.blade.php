<div class="input-group mt-1">
    <input type="text" name="{{$name}}" class="form-control  @error($name) is-invalid @enderror"
           value="{{ old($name) }}"
           placeholder="{{$name}}">
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
