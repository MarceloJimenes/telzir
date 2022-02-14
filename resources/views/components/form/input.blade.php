<div>
    <label for="{{ $name }}">{{ $label ?? '' }}</label>
    <input type="{{ $type ?? 'text' }}" name="{{ $name }}"
        {{ isset($min) ? "min=$min" : ''}}
        {{ isset($max) ? "max=$max" : ''}}
        {{ isset($id) ? "id=$id" : '' }}
        placeholder="{{$placeholder ?? ''}}"
        class="form-control"
    >
    @error($name)
        <p class="input-error">{{ $message }}</p>
    @enderror
</div>
