@component('dashboard.form.group', [
    'id' => $id ?? $name,
    'label' => $label,
    'help' => $help ?? false,
    'helpColor' => $helpColor ?? 'muted'
])
    <input type="{{ $type ?? 'text' }}"
           class="form-control"
           id="{{ $id ?? $name }}"
           name="{{ $name }}"
           value="{{ $value ?? '' }}"
            {{ isset($placeholder) ? "placeholder=\"{$placeholder}\"" : '' }}
            {{ isset($required) && ! $required ? '' : 'required' }}
            {{ isset($step) ? "step=\"{$step}\"" : '' }}>
@endcomponent
