<div class="custom-control custom-checkbox">
        <input class="custom-control-input"
                     type="checkbox"
                     id="{{ $id ?? $name }}"
                     name="{{ $name }}"
                     {{ isset($checked) && $checked ? 'checked' : '' }} />

        <label class="custom-control-label font-weight-bold text-dark" for="{{ $id ?? $name }}">
                {{ $label }}
        </label>
        
        @if (isset($helpMessage))
            <a  class="p-1 text-secondary" 
                data-tooltip="tooltip"  
                data-toggle="tooltip" 
                data-placement="right" 
                title="{{ $helpMessage }}">
            <i class="fas fa-question-circle fa-fw"></i> 
        @endif
    </a>
</div>
