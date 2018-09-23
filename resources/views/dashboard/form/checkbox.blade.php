<div class="form-check">
    <input class="form-check-input"
           type="checkbox"
           id="{{ $id ?? $name }}"
           name="{{ $name }}"
           {{ isset($checked) && $checked ? 'checked' : '' }} />
    <label class="font-weight-bold form-check-label" for="{{ $id ?? $name }}">
        {{ $label }}
    </label>
</div>
