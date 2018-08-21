<div class="card">
    <div class="overlay-container">
        <img class="card-img-top" src="{{ $course->publicImagePath }}" width="250" height="145">
        <a href="{{ route('courses.show', $course) }}"></a>
    </div>

    <div class="card-header">
        <div class="d-flex justify-content-between">
            <div class="mb-0 text-primary text-uppercase font-weight-bold">
                <a class="link" href="{{ route('courses.show', $course) }}">{{ $course->name }}</a>
            </div>

            <i class="text-primary {{ $course->occupationArea->icon }}"></i>
        </div>

        <div class="d-flex justify-content-between">
            <span class="small text-muted text-uppercase">{{ $course->modality->name }}</span>
        </div>
    </div>

    <div class="card-body">
        <p class="small text-justify text-secondary">{{ str_limit($course->description, 150) }}</p>
    </div>

    <div class="card-body info">
        <div class="d-flex justify-content-between text-dark ">
            <div class="font-weight-600">
                <strong>R$</strong> {{ $course->price }}
            </div>
        </div>
    </div>

    <div class="card-footer p-0">
        <a href="{{ route('courses.show', $course) }}" class="link p-2 text-center d-block text-uppercase">
            <i class="fas fa-plus-circle mr-2"></i><span class="font-weight-bold">Matricule-se</span>
        </a>
    </div>
</div>