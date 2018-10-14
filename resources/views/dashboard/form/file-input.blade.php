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
                   {{ isset($accept) ? "accept={$accept}" : '' }}
                   {{ isset($required) && ! $required ? '' : 'required' }}
                   lang="pt" />

            <label class="custom-file-label"
                   for="{{ $id ?? $name }}">
                {{ isset($placeholder) ? $placeholder : '' }}
            </label>

        </div>
    </div>
    
    @if($accept == 'image/*')
        <div class="image-preview mt-3 d-none">
            <div class="font-weight-bold py-2">Pré-visualização da imagem</div>

            <img class="img-fluid img-thumbnail" src="https://via.placeholder.com/350x200" alt="">
        </div>

        @push('scripts')
            <script>

                // Read a input file
                function readURL(input, imgSelector) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $(imgSelector).attr('src', e.target.result);
                        }
                        
                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $(".custom-file-input").change(function() {
                    $('.image-preview').removeClass('d-none');

                    readURL(this, $('.image-preview img'));
                });
            </script>
        @endpush
    @endif

    @if($errors->has($name))
      <div class="small text-danger">{{ $errors->first($name) }}</div>
    @endif
@endcomponent
