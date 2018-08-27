<div class="card">
    <div class="overlay-container">
        <img class="card-img-top" src="{{ $course->publicImagePath }}" width="250" height="145">
        <div class="ribbon ribbon-left font-weight-600">
            R$ {{ $course->price }}
            <span class="ribbon-hide"><i class="fas fa-user-clock"></i> {{ $course->hours }}h</span>
        </div>
    </div>

    <a class="link-absolute" href="{{ route('courses.show', $course) }}"></a>

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

    <div class="card-body pb-0">
        <p class="small text-justify text-secondary">{{ str_limit($course->description, 150) }}</p>
    </div>

    <div class="card-footer p-0"  style="z-index: 1";>
        <a href="{{ route('courses.show', $course) }}" class="link p-2 text-center d-block text-uppercase">
            <span class="font-weight-600"><i class="fas fa-plus-circle mr-1"></i>Matricule-se</span>
        </a>
    </div>
</div>