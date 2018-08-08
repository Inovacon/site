<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>E-mail</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($collaborators as $collaborator)
            <tr>
                <td>{{ $collaborator->id }}</td>
                <td>{{ $collaborator->name }}</td>
                <td>{{ $collaborator->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
