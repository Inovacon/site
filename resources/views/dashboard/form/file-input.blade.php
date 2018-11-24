@component('dashboard.form.group', [
    'id' => $id ?? $name,
    'label' => $label,
    'help' => $help ?? false,
    'helpColor' => $helpColor ?? 'muted'
])

    <div class="input-group">
        <div class="custom-file">
            <input type="file"
                   class="custom-file-input {{ $errors->has($name) ? 'is-invalid' : '' }}"
                   id="{{ $id ?? $name }}"
                   name="{{ $name }}"
                   {{ isset($multiple) && $multiple ? 'multiple' : '' }}
                   {{ isset($accept) ? "accept={$accept}" : '' }}
                   {{ isset($required) && !$required ? '' : 'required' }}
                   lang="pt" />

            <label class="custom-file-label"
                   for="{{ $id ?? $name }}">
                {{ isset($placeholder) ? $placeholder : '' }}
            </label>

        </div>
    </div>

    @if (isset($preview) && $preview && $accept == 'image/*')
        <div class="mt-2">
            @include('dashboard.form.img-preview', ['id' => $id ?? $name])
        </div>
    @endif
{{--
    @if (isset($multiplePreview) && $multiplePreview && $accept == 'image/*')
        <div class="mt-2">
            @include('dashboard.form.multiple-img-preview', ['id' => $id ?? $name])
        </div>
    @endif --}}

    @if($errors->has($name))
      <div class="small text-danger">{{ $errors->first($name) }}</div>
    @endif
@endcomponent
