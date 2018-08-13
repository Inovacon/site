<table class="table table-responsive-sm">
    <tr>
        <th class="border-top-0">Id</th>
        <td class="border-top-0">{{ $course->id }}</td>
    </tr>
    <tr>
        <th>Nome</th>
        <td>{{ $course->name }}</td>
    </tr>
    <tr>
        <th>Imagem</th>
        <td>
            <img src="{{ $course->publicImagePath }}" width="200" alt="imagem do curso">
        </td>
    </tr>
    <tr>
        <th>Descrição</th>
        <td>{{ $course->description }}</td>
    </tr>
    <tr>
        <th>Preço</th>
        <td>{{ "R$ {$course->price}" }}</td>
    </tr>
    <tr>
        <th>Ativo</th>
        <td v-if="activated">
            <i class="fas fa-circle fa-sm text-success"></i> Sim
        </td>
        <td v-else>
            <i class="fas fa-circle fa-sm text-danger"></i> Não
        </td>
    </tr>
    <tr>
        <th>Data de Início</th>
        <td>{{ $course->begin_date->format('d/m/Y') }}</td>
    </tr>
    <tr>
        <th>Date de Término</th>
        <td>{{ $course->end_date->format('d/m/Y') }}</td>
    </tr>
    <tr>
        <th>Mínimo de Alunos</th>
        <td>{{ $course->minimum_students }}</td>
    </tr>
    <tr>
        <th>Máximo de Alunos</th>
        <td>{{ $course->maximum_students }}</td>
    </tr>
    <tr>
        <th>Carga Horária</th>
        <td>{{ $course->hours.' h' }}</td>
    </tr>
    <tr>
        <th>Tipo</th>
        <td>{!! $course->type->nameWithIcon !!}</td>
    </tr>
    <tr>
        <th>Modalidade</th>
        <td>{!! $course->modality->nameWithIcon !!}</td>
    </tr>
    <tr>
        <th>Turno</th>
        <td>{!! $course->shift->nameWithIcon !!}</td>
    </tr>
    <tr>
        <th>Área de Atuação</th>
        <td>{!! $course->occupationArea->nameWithIcon !!}</td>
    </tr>
    <tr>
        <th>Público Alvo</th>
        <td>{!! $course->targetAudience->nameWithIcon !!}</td>
    </tr>
</table>
