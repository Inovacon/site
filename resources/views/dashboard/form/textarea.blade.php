@component('dashboard.form.group', [
    'id' => $id ?? $name,
    'label' => $label,
    'help' => $help ?? false,
    'helpColor' => $helpColor ?? 'muted'
])


<text-editor  name="{{ $name }}"
              value="{{ $value }}"
              error="{{ $errors->first($name) }}"></text-editor>
@endcomponent
