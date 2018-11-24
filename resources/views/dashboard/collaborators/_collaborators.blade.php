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
                @if (auth()->user()->isAdmin() && ! $collaborator->isAdmin())
                    <td class="text-right">
                        <form method="POST" action="{{ route('dashboard.collaborators.promote', $collaborator) }}">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Promover</button>
                        </form>
                    </td>
                @elseif (auth()->user()->isRoot() && $collaborator->isAdmin() && !$collaborator->isRoot())
                    <td class="text-right">
                        <form method="POST" action="{{ route('dashboard.collaborators.depromote', $collaborator) }}">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Despromover</button>
                        </form>
                    </td>
                @else
                    <td></td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
