<div>
    <label for="{{ $name }}">{{ $label ?? '' }}</label>
    <select name="{{ $name }}" {{ isset($id) ? "id=$id" : '' }}
        class="form-select form-control {{-- {{ isset($type) && $type === 'select2' ? 'app-select2' : 'form-select'}} --}}">
        @if (isset($empty))
            <option value="" disabled selected>{{ $empty }}</option>
        @endif
        @if (isset($options))
            @foreach ($options as $key => $option)
                <option value="{{ $render['value']($option, $key) }}"
                    {{ $render['selected']($option, $key) == true ? 'selected' : '' }}>
                    {{ $render['label']($option, $key) }}
                </option>
            @endforeach
        @endif
    </select>
    @error($name)
        <p class="input-error">{{ $message }}</p>
    @enderror
</div>
