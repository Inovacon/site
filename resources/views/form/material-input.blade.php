{{-- 
    ATTRIBUTES:
        $id (default: $name)
        $name
        $value (optional)
        $label
        $class (optional)
        $icon (optional)
        $type (default: text)
        $placeholder (optional)
 --}}


<div class="form-md-group {{ $errors->has($name) ? 'invalid-group' : '' }}">
    <input  class="form-control {{ old($name) ? 'active' : '' }} {{ $class ?? '' }}" 
            id="{{ $id ?? $name }}"
            name="{{ $name }}"
            value="{{ $value ?? '' }}"
            type="{{ $type ?? 'text' }}"
            @if(isset($placeholder))
                placeholder="{{ $placeholder }}" 
            @endif
            {{ isset($required) && $required ? 'required="required"' : '' }} />

    <label for="{{ $id ?? $name }}">
        @if(isset($icon))
            <i class="{{ $icon }} fa-lg mr-1"></i> 
        @endif

        {{ $label }}
    </label>

    <span class="invalid-md-feedback">
        {{ $errors->first($name) }}
    </span>
</div>