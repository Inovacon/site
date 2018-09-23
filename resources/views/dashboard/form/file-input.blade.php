@component('dashboard.form.group', [
    'id' => $id ?? $name,
    'label' => $label,
    'help' => $help ?? false,
    'helpColor' => $helpColor ?? 'muted'
])
    <div class="input-group">
        <div class="custom-file">
            <input type="file"
                   class="custom-file-input"
                   id="{{ $id ?? $name }}"
                   name="{{ $name }}"
                   {{ isset($accept) ? "accept={$accept}" : '' }}
                   {{ isset($required) && ! $required ? '' : 'required' }}
                   lang="pt" />

            <label class="custom-file-label"
                   for="{{ $id ?? $name }}">
                {{ isset($placeholder) ? $placeholder : '' }}
            </label>
        </div>
    </div>
@endcomponent
