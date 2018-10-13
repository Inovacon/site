<table class="table table-responsive-sm">
    <thead>
        <tr>
            <th class="text-center">Id</th>
            <th>Título</th>
            <th>Principal</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($news as $n)
            <tr>
                <td class="text-center">{{ $n->id }}</td>
                <td>
                    <a href="{{ route('dashboard.news.show', $n) }}" class="font-weight-bold">
                        {{ str_limit($n->title, 50) }}
                    </a>
                </td>
                <td>{{ $n->leading ? 'Sim' : 'Não' }}</td>
                <td class="text-right">
                    <div class="pr-4">
                        <a href="{{ route('dashboard.news.show', $n) }} }}" class="btn-icon">
                            <i class="fas fa-eye fa-lg"></i>
                        </a>

                        <a href="{{ route('dashboard.news.edit', $n) }}" class="btn-icon ml-2">
                            <i class="fas fa-edit fa-lg"></i>
                        </a>

                        <secure-delete-button
                                classes="btn-icon ml-2"
                                url="{{ route('dashboard.news.destroy', $n) }}"
                                alert="Isso irá remover a notícia, essa ação não pode ser desfeita.">
                            <i class="fas fa-trash-alt fa-lg"></i>
                        </secure-delete-button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
