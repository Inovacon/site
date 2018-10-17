<div class="image-preview mb-3 d-none">
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
