<table class="table table-responsive-sm">
    <thead>
        <tr>
            <th class="text-center">Id</th>
            <th>Nome</th>
            <th>Área</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($courses as $course)
            <tr>
                <td class="text-center">{{ $course->id }}</td>
                <td>
                    <a href="{{ route('dashboard.courses.show', $course) }}" class="font-weight-bold">
                        {{ $course->name }}
                    </a>
                </td>
                <td>
                    <i class="{{ $course->occupationArea->icon }} fa-fw"></i> {{ $course->occupationArea->name }}
                </td>
                <td class="text-right">
                    <div class="pr-4">
                        <a href="{{ route('dashboard.courses.show', $course) }}" class="btn-icon">
                            <i class="fas fa-eye fa-lg"></i>
                        </a>

                        <a href="{{ route('dashboard.courses.edit', $course) }}" class="btn-icon ml-2">
                            <i class="fas fa-edit fa-lg"></i>
                        </a>

                        <activate-button
                                class="ml-1"
                                @changed="flash(`Curso ${$event ? 'ativado' : 'desativado'} com sucesso.`)"
                                endpoint="{{ route('dashboard.courses.activation', $course) }}"
                                :active="{{ json_encode($course->active) }}"></activate-button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
