<div id="imagePreview_{{ $id }}" class="image-preview mb-3 d-none">
    <div class="font-weight-bold py-2">Pré-visualização da imagem</div>
    <img class="img-fluid img-thumbnail" />
</div>

@push('scripts')
    <script>
        (function () {
            var _imagePreview = $(@json('#imagePreview_'.$id));
            var _imagePreviewImg = _imagePreview.find('img');
            var _imageSrc = @json($imageSrc ?? null);

            if (_imageSrc) {
                _imagePreview.removeClass('d-none');
                _imagePreviewImg.attr('src', _imageSrc);
            }

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
