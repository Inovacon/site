@component('dashboard.form.group', [
    'id' => $id ?? $name,
    'label' => $label,
    'help' => $help ?? false,
    'helpColor' => $helpColor ?? 'muted'
])
    <textarea
        name="{{ $name }}"
        class="form-control"
        id="{{ $id ?? $name }}"
        rows="{{ $rows ?? 3 }}"
        {{ isset($placeholder) ? "placeholder={$placeholder}" : '' }}
        {{ isset($required) && ! $required ? '' : 'required' }}>{{ $value ?? '' }}</textarea>
@endcomponent
