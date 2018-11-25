<div id="imagePreview_{{ $id }}" class="image-preview mb-3{{ isset($imageSrc) ? '' : ' d-none' }}">
    <div class="font-weight-bold py-2">Pré-visualização da imagem</div>
    <img class="img-fluid img-thumbnail" src="{{ isset($imageSrc) ? $imageSrc : '' }}" />
</div>

@push('scripts')
    <script>
        (function () {
            var _imagePreview = $(@json('#imagePreview_'.$id));
            var _imagePreviewImg = _imagePreview.find('img');

            // Read a input file
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        _imagePreviewImg.attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(@json('#'.$id)).change(function () {
                _imagePreview.removeClass('d-none');
                readURL(this);
            });
        })();
    </script>
@endpush
