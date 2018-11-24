<div id="multipleImgPreview_{{ $id }}" class="carousel slide d-none mb-3" data-ride="carousel">
    <div class="carousel-inner">
        {{-- <div class="carousel-item active">
            <img class="d-block w-100" src=".../800x400?auto=yes&bg=777&fg=555&text=First slide" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src=".../800x400?auto=yes&bg=666&fg=444&text=Second slide" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src=".../800x400?auto=yes&bg=555&fg=333&text=Third slide" alt="Third slide">
        </div> --}}
    </div>
    <a class="carousel-control-prev" href="#multipleImgPreview_{{ $id }}" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#multipleImgPreview_{{ $id }}" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
    </a>
</div>

@push('scripts')
    <script>
        (function () {
            var carousel = document.getElementById(@json('multipleImgPreview_'.$id));
            var inner = carousel.querySelector('.carousel-inner');
            var input = document.getElementById(@json($id));

            input.addEventListener('change', function () {
                if (!this.files || this.files.length === 0) {
                    return;
                }

                carousel.classList.remove('d-none');

                var reader = null;

                for (var i = 0; i < this.files.length; ++i) {
                    reader = new FileReader();
                    reader.onload = e => {
                        var item = document.createElement('div');
                        item.classList.add('carousel-item');

                        if (i === 0) {
                            item.classList.add('active');
                        }

                        var img = document.createElement('img');
                        img.classList.add('d-block');
                        img.classList.add('w-100');
                        img.src = e.target.result;

                        item.appendChild(img);
                        inner.appendChild(item);
                    };
                    reader.readAsDataURL(this.files[i]);
                }
            });
        })();
    </script>
@endpush
