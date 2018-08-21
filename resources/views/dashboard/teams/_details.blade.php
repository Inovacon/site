<table class="table table-responsive-sm">
    <tr>
        <th class="border-top-0">Id</th>
        <td class="border-top-0">{{ $team->id }}</td>
    </tr>
    <tr>
        <th>Mínimo de alunos</th>
        <td>{{ $team->minimum_students }}</td>
    </tr>
    <tr>
        <th>Máximo de alunos</th>
        <td>{{ $team->maximum_students }}</td>
    </tr>
    <tr>
        <th>Curso</th>
        <td>
            <a href="{{ route('dashboard.courses.show', $course) }}" class="font-weight-bold">
                {{ $course->name }}
            </a>
        </td>
    </tr>
</table>
