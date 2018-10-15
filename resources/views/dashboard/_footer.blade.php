@routes('dashboard')

<script>
    window.oldInput = @json(old())
</script>

<script src="{{ asset('js/admin.js') }}"></script>

@stack('scripts')
