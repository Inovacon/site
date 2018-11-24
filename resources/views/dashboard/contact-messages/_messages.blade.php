@php
    function getName($message)
    {
        $names = explode(' ', $message->full_name);
        $fullName = $names[0];

        if (count($names) > 1) {
            $fullName .= ' ' . $names[count($names) - 1];
        }

        return $fullName;
    }
@endphp

<table class="table table-responsive-sm">
    <thead>
        <tr>
            <th>Conteúdo</th>
            <th>Enviado em</th>
            <th>Por</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($messages as $message)
            <tr>
                <td>
                    <a class="font-weight-bold" href="{{ route('dashboard.contact-messages.show', $message) }}">
                        {{ str_limit($message->body, 50) }}
                    </a>
                </td>

                <td>
                    {{ $message->created_at->format('d/m/Y H:i') }}
                </td>

                <td>
                    {{ getName($message) }}
                </td>

                <td class="text-right">
                    <div class="pr-4">
                        <a href="{{ route('dashboard.contact-messages.show', $message) }} }}" class="btn-icon">
                            <i class="fas fa-eye fa-lg"></i>
                        </a>

                        <secure-delete-button
                                classes="btn-icon ml-2"
                                url="{{ route('dashboard.contact-messages.destroy', $message) }}"
                                alert="Isso irá remover a mensagem, essa ação não pode ser desfeita.">
                            <i class="fas fa-trash-alt fa-lg"></i>
                        </secure-delete-button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
