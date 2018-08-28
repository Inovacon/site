<div class="card">
    <div class="overlay-container">
        <img class="card-img-top" src="https://via.placeholder.com/250x145">
    </div>

    <a class="link-absolute" href="{{ route('events.show', 'show') }}"></a>

    <div class="card-header">
        <div class="d-flex justify-content-between">
            <div class="mb-0 text-primary text-uppercase font-weight-bold">
                <a class="link" href="{{ route('events.show', 'show') }}">{{ $faker->words(3, 8) }}</a>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <span class="small text-muted text-uppercase">De 20/02 até 02/08</span>
        </div>
    </div>

    <div class="card-body pb-0">
        <p class="small text-justify text-secondary">{{ str_limit($faker->sentence(100), 150) }}</p>
    </div>

    <div class="card-footer p-0"  style="z-index: 1";>
        <a href="{{ route('events.show', 'show') }}" class="link p-2 text-center d-block text-uppercase">
            <span class="font-weight-600"><i class="fas fa-plus-circle mr-1"></i>Inscreva-se</span>
        </a>
    </div>
</div>