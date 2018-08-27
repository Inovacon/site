@component('dashboard.form.group', [
    'id' => $id ?? $name,
    'label' => $label,
    'help' => $help ?? false,
    'helpColor' => $helpColor ?? 'muted'
])
    <select class="form-control"
            id="{{ $id ?? $name }}"
            name="{{ $name }}"
            {{ isset($required) && ! $required ? '' : 'required' }}
            {{ isset($multiple) && $multiple ? 'multiple' : '' }}
            {{ isset($vModel) ? "v-model=\"{$vModel}\"" : '' }}>

        @if (isset($placeholder))
            <option value="" selected>{{ $placeholder }}</option>
        @endif

        @if (isset($options) && isset($model))
            @foreach ($options as $option)
                <option value="{{ $option->{$optionId ?? 'id'} }}"
                        {{ old($name, $model->{$name}) == $option->{$optionId ?? 'id'} ? 'selected' : '' }}>
                    {{ $option->{$optionName ?? 'name'} }}
                </option>
            @endforeach
        @else
            {{ $slot ?? '' }}
        @endif
    </select>
@endcomponent
