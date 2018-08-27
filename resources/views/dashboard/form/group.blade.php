<div class="form-group">
    <label class="font-weight-bold"
           for="{{ $id }}">{{ $label }}</label>

    <div>
        {{ $slot }}

        @if ($help)
            <small class="form-text text-{{ $helpColor }}">{{ $help }}</small>
        @endif
    </div>
</div>
