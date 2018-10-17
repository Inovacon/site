<div class="card">
    <a class="card-header-link" data-toggle="modal" data-target="#courseFormModal">
        <img class="card-img-top" src="{{ $course->publicImagePath }}" />
        <span class="card-header-link-icon">
            <i class="fas fa-pencil-alt fa-2x"></i>
        </span>
    </a>

    <div class="card-body p-3">
        <div class="row">
            <div class="col-6 mb-3">
                <span class="small">ID</span>
                <span>{{ $course->id }}</span>
            </div>
            <div class="col-6 mb-3">
                <span class="small">Nome</span>
                <span>{{ $course->name }}</span>
            </div>
            <div class="col-6 mb-3">
                <span class="small">Descrição</span>
                <long-text content="{{ $course->description }}"></long-text>
            </div>
            <div class="col-6 mb-3">
                <span class="small">Preço</span>
                <span>R$ {{ $course->price }}</span>
            </div>
            <div class="col-6 mb-3">
                <span class="small">Carga Horária</span>
                <span>{{ $course->hours }} h</span>
            </div>
            <div class="col-6 mb-3">
                <span class="small">Tipo</span>
                <span>{{ $course->type->name }}</span>
            </div>
            <div class="col-6 mb-3">
                <span class="small">Modalidade</span>
                <span>{{ $course->modality->name }}</span>
            </div>
            <div class="col-6 mb-3">
                <span class="small">Área de Atuação</span>
                <span>{{ $course->occupationArea->name }}</span>
            </div>
            <div class="col-6">
                <span class="small">Público Alvo</span>
                <span>{{ $course->targetAudience->name }}</span>
            </div>
            <div class="col-6">
                <span class="small">Ativo</span>
                <activate-button
                    endpoint="{{ route('dashboard.courses.activation', $course) }}"
                    :style="{ 'margin-top': '-6px' }"
                    :height="15"
                    :disabled="@json(!count($teams))"
                    :active="@json($course->active)"
                    @changed="onChange"></activate-button>
            </div>
        </div>
    </div>
</div>


{{-- <table class="table table-responsive-sm">
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
            <img class="img-thumbnail" src="{{ $course->publicImagePath }}" width="200" alt="imagem do curso">
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
        <th>Área de Atuação</th>
        <td>{!! $course->occupationArea->nameWithIcon !!}</td>
    </tr>
    <tr>
        <th>Público Alvo</th>
        <td>{!! $course->targetAudience->nameWithIcon !!}</td>
    </tr>
</table> --}}
