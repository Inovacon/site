<table class="table table-responsive-sm">
    <tr>
        <th class="border-top-0">Id</th>
        <td class="border-top-0">{{ $lesson->id }}</td>
    </tr>
    <tr>
        <th>Data</th>
        <td>{{ $lesson->date->format('d/m/Y') }}</td>
    </tr>
    <tr>
        <th>Horário de Início</th>
        <td>{{ $lesson->start_time }}</td>
    </tr>
    <tr>
        <th>Horário de Término</th>
        <td>{{ $lesson->end_time }}</td>
    </tr>
    <tr>
        <th>Turma</th>
        <td>
            <a href="{{ route('dashboard.courses.teams.show', [$team->course, $team]) }}"
               class="font-weight-bold">
                Turma {{ $team->id }}
            </a>
        </td>
    </tr>
</table>
