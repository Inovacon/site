@foreach ($options as $option)
    <option value="{{ $option->id }}"
            {{ old($name, $course->{$name}) == $option->id ? 'selected' : '' }}>
        {{ $option->name }}
    </option>
@endforeach
