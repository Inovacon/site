<table class="table table-responsive-sm">
    <thead>
    <tr>
        <th>Data</th>
        <th>Dia da semana</th>
        <th>Início</th>
        <th>Término</th>
        <th></th>
    </tr>
    </thead>

    <tbody>
    @foreach ($lessons as $lesson)
        <tr>
            <td>{{ $lesson->date->format('d/m/Y') }}</td>
            <td>{{ ucfirst(utf8_encode(strftime("%A", strtotime($lesson->date)))) }}</td>
            <td>{{ $lesson->start_time_formatted }}</td>
            <td>{{ $lesson->end_time_formatted }}</td>
            <td class="text-right">
                <div class="pr-4">
                    <a href="{{ route('dashboard.courses.lessons.show', [$team, $lesson]) }} }}" class="btn-icon">
                        <i class="fas fa-eye fa-lg"></i>
                    </a>

                    <a href="{{ route('dashboard.courses.lessons.edit', [$team, $lesson]) }}" class="btn-icon ml-2">
                        <i class="fas fa-edit fa-lg"></i>
                    </a>

                    <secure-delete-button
                            classes="btn-icon ml-2"
                            url="{{ route('dashboard.courses.lessons.destroy', [$team, $lesson]) }}"
                            alert="Isso irá apagar esta aula do cronograma.">
                        <i class="fas fa-trash-alt fa-lg"></i>
                    </secure-delete-button>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
