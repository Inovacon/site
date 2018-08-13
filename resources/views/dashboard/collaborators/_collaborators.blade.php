<table class="table table-responsive-sm">
    <thead>
        <tr>
            <th class="text-center">Id</th>
            <th>Nome</th>
            <th>E-mail</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($collaborators as $collaborator)
            <tr>
                <td class="text-center">{{ $collaborator->id }}</td>
                <td>{{ $collaborator->name }}</td>
                <td>{{ $collaborator->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
