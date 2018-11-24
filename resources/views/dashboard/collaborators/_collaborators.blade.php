<table class="table table-responsive-sm">
    <thead>
        <tr>
            <th class="text-center">Id</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Administrador</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($collaborators as $collaborator)
            <tr>
                <td class="text-center">{{ $collaborator->id }}</td>
                <td>{{ $collaborator->name }}</td>
                <td>{{ $collaborator->email }}</td>
                <td>
                    {{ $collaborator->hasRole('admin') ? 'Sim' : 'Não' }}
                </td>

                <td class="text-right">
                    @if (auth()->user()->isAdmin() && !$collaborator->isAdmin())
                        <form class="d-inline-block" method="POST" action="{{ route('dashboard.collaborators.promote', $collaborator) }}">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Promover</button>
                        </form>
                    @elseif (auth()->user()->isRoot() && $collaborator->isAdmin() && !$collaborator->isRoot())
                        <form class="d-inline-block" method="POST" action="{{ route('dashboard.collaborators.depromote', $collaborator) }}">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Despromover</button>
                        </form>
                    @endif

                    @if (auth()->user()->isRoot() && !$collaborator->isRoot())
                        <secure-delete-button
                                classes="btn-icon ml-2"
                                url="{{ route('dashboard.collaborators.destroy', $collaborator) }}"
                                alert="Isso irá remover o colaborador, essa ação não pode ser desfeita.">
                            <i class="fas fa-trash-alt fa-lg"></i>
                        </secure-delete-button>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
