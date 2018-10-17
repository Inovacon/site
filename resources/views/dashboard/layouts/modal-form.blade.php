<div class="modal fade" id="{{ $id }}">
    <div class="modal-dialog{{ isset($size) && 'lg' === $size ? ' modal-lg' : '' }}{{ isset($size) && 'sm' === $size ? ' modal-sm' : '' }}{{ isset($centered) && $centered ? ' modal-dialog-centered' : '' }}">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ $action }}" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf

                    @if (isset($method))
                        @method($method)
                    @endif

                    {{ $slot }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
