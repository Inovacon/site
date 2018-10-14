{{-- 
    ATTRIBUTES:
        $title
        $name
        $icon (optional)
        $radio['id'] 
        $radio['label']
        $radio['value']
 --}}

<div class="form-group {{ $errors->has($name) ? 'invalid-radio-box' : '' }}">
    <div class="pb-2">
        @if(isset($icon))
            <i class="{{ $icon }} mr-1"></i>
        @endif
        {{ $title }}
    </div>
    
    @foreach($radios as $radio) 
        <div class="custom-control custom-radio custom-control-inline">
            <input  class="custom-control-input" 
                    id="{{ $radio['id'] }}"
                    name="{{ $name }}" 
                    value="{{ $radio['value'] }}"
                    type="radio" 
                    {{ old($name) == $radio['value'] ? 'checked' : '' }}/>
            
            <label  class="custom-control-label" 
                    for="{{ $radio['id'] }}">
                {{ $radio['label'] }}
            </label>
        </div>
    @endforeach

    <div class="invalid-feedback">{{ $errors->first($name) }}</div>
</div>